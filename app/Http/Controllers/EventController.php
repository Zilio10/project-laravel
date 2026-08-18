<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    public function index()
    {
        $nome = 'Henrique';

        $nomes = ['Henrique', 'João', 'Pedro'];

        return view('welcome', ['nome' => $nome, 'nomes' => $nomes]);
    }

    public function create() {
        return view('events.create');
    }
}
