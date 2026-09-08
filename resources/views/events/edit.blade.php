@extends('layouts.main')

@section('title', 'Editar evento: ' .  $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->title }}</h1>

    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do evento</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
        </div>

        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
        </div>

        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date"  value="{{date('Y-m-d', strtotime($event->date));}}">
        </div>

        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Nome da cidade" value="{{ $event->city }}">
        </div>

        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que acontecerá neste evento?">{{ $event->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="items">Adicione itens da infraestrutura:</label>
            <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            <input type="checkbox" name="items[]" value="Palco"> Palco
            <input type="checkbox" name="items[]" value="Open bar"> Open bar
            <input type="checkbox" name="items[]" value="Open food"> Open food
            <input type="checkbox" name="items[]" value="Brindes"> Brindes
        </div>

        <input type="submit" class="btn btn-primary" value="Editar evento">
    </form>
</div>

@endsection
