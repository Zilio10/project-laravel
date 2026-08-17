@extends('layouts.main')

@section('title', 'HDC Events')
@section('content')

    @if ($nome == "Henrique")
        <h1>Olá, Henrique!</h1>
    @else
        <h1>Olá, visitante!</h1>
    @endif

    @foreach($nomes as $nome)
        <p>{{ $loop->index+1 }} - {{$nome}}</p>
    @endforeach

    <img src="/img/banner.jpg" alt="Banner">

@endsection
