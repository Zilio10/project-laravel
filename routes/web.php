<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $nome = "Henrique";

    $nomes = ["Henrique", "João", "Pedro"];

    return view('welcome', ['nome' => $nome, 'nomes' => $nomes]);
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/produtos', function() {
    return view('products');
});

