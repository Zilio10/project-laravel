@extends('layouts.main')

@section('title', $event->title)
@section('content')

    <div class="col-md offset-md-1">
        <div class="row">
            <div class="col-md-6" id="image-container">
                <img src="{{ asset('img/events/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid">
            </div>

            <div class="col-md-6" id="info-container">
                <h1>{{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
                <p class="events-participants"><ion-icon name="people-outline"></ion-icon>X participantes</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}</p>
                <a href="#" class="btn btn-primary" id="event-submit">Confirmar presença</a>
                <h3>O evento conta com:</h3>
                <ul id="items-list">
                    @php
                        $itemsList = $event->items;
                        if (is_string($itemsList)) {
                            $itemsList = explode(',', $itemsList);
                        }
                        $itemsList = $itemsList ?? [];
                    @endphp

                    @foreach ($itemsList as $item)
                        <li><ion-icon name="play-outline"></ion-icon>{{ trim($item) }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento</h3>
                <p class="event-description">{{ $event->description }}</p>
            </div>
        </div>
    </div>

@endsection
