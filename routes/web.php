<?php

use App\Http\Controllers\TicketsController;
use App\Livewire\GuestShell;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Livewire\HomeShell;





Route::get('/', GuestShell::class)
    ->name('welcome');

Route::get('/login', [UserController::class, 'showLoginForm'])
    ->name('login.show');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.submit');
<<<<<<< Updated upstream
=======

Route::get('/logout', [UserController::class, 'logout'])
    ->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('/home', HomeShell::class)
//         ->name('home');
// });

Route::get('/home', HomeShell::class)
    ->name('home');

Route::post('/tickets', [TicketsController::class, 'submit'])
    ->name('tickets.submit');
>>>>>>> Stashed changes
