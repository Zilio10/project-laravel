<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']); // Select all (all)
Route::get('/events/create', [EventController::class, 'create']); // Retorna view "create"
Route::get('events/{id}', [EventController::class, 'show']); // Select one (findOrFail)
Route::post('/events', [EventController::class, 'store']); // Create (save)

Route::get('/contact', function() {
    return view('contact');
});

