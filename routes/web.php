<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']); 
Route::get('/events/create', [EventController::class, 'create']);

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/produtos', function() {

    $busca = request('search');

    return view('products', ['busca' => $busca]);
});

Route::get('/produtos/{id}', function( $id ) {
    return view('product', ['id' =>$id]);
});


