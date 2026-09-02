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

        $eventOwner = User::where('id', $event->user_id)->first()->toArray(); // Retorna tudo do usuário que o id = $event->user_id

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {
        $user = Auth::user();

        $events = $user->events; // Pela foreign key

        return view('events.dashboard', ['events' => $events]);
    }
}
