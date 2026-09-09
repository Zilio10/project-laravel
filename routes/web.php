<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']); // Select all (all)
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); // Retorna view "create"
Route::get('events/{id}', [EventController::class, 'show']); // Select one (findOrFail)
Route::post('/events', [EventController::class, 'store']); // Create (save)
Route::get('/', [EventController::class, 'index']); // Select all (all)
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::delete('/events/{id}',[EventController::class, 'destroy'] )->middleware('auth');
Route::get('/events/edit/{id}',[ EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');


