<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $events = Event::where([
                ['title', 'like', '%'.$search.'%'] // Obtém todos os eventos com a escrita parecida ("like") com a de $search
            ])->get();
        } else {
            $events = Event::all(); // Método para pegar todos os dados da tabela no banco
        }

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).'.'.$extension;

            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }

        $user = Auth::user(); // Retorna um obj com os dados do usuário logado
        $event->user_id = $user->id;

        $event->save(); // Método para salvar informações no banco

        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id); // Método obter 1 registro do banco por PK

        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray(); // Retorna tudo do usuário que o id = $event->user_id

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined ]);
    }

    public function dashboard()
    {
        $user = Auth::user();

        $events = $user->events; // Pela foreign key

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id)
    {

        $user = auth()->user();

        $event = Event::findOrFail($id);

        if($user->id != $event->user->id) {
            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request)
    {

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).'.'.$extension;

            $request->image->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;

        }


        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento: ' .  $event->title);
    }

    public function leaveEvent($id)
    {

        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' .  $event->title);

    }
}
