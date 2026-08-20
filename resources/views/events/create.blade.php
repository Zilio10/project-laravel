@extends('layouts.main')

@section('title', 'Criar evento')
@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do evento</label>
                <input type="file" class="form-control" id="image" name="image">

                <label for="title">Evento</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">

                <label for="city">Cidade:</label>
                <input type="city" class="form-control" id="city" name="city" placeholder="Nome da cidade">

                <label for="private">O evento é privado?</label>
                <select name="private" id="provate" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>

                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que acontecerá neste evento?"></textarea>

                <input type="submit" class="btn btn-primary" value="Criar evento">
            </div>
        </form>
    </div>

@endsection
