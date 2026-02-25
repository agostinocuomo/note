<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotepadController;
use App\Http\Livewire\Dashboard;

Route::get('/', [NotepadController::class, 'index'])->name("welcome");
Route::post('/welcome', [NotepadController::class, 'store']);


Route::middleware(['auth'])->group(function () {
Route::get('/user', [NotepadController::class, 'userAuth'])->name("UserAuth");
 Route::get('/userdashboard', function () {
        return view('UserDashboard'); // view che include il componente
    })->name('UserDashboard');
});


Route::get('/force-logout', function () {
    Auth::logout(); // disconnette l’utente corrente
    return redirect('/login'); // o dove vuoi
});




/* Route::get('/', function () {
    return view('welcome');
}); */
