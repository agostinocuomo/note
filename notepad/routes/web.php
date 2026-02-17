<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotepadController;

Route::get('/', [NotepadController::class, 'index'])->name("welcome");
Route::post('/welcome', [NotepadController::class, 'store']);


Route::middleware(['auth'])->group(function () {
Route::get('/user', [NotepadController::class, 'userAuth'])->name("UserAuth");
});




/* Route::get('/', function () {
    return view('welcome');
}); */
