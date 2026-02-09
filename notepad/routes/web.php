<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotepadController;

Route::get('/', [NotepadController::class, 'index']);
Route::post('/welcome', [NotepadController::class, 'store']);


/* Route::get('/', function () {
    return view('welcome');
}); */
