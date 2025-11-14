<?php

use App\Livewire\GuestShell;
use App\Livewire\HomeShell;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', GuestShell::class)
    ->name('welcome');

// Define the `login` route to avoid the error
Route::get('/login', [UserController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.post');

// Route::middleware('auth')->group(function () {
//     Route::get('/home', HomeShell::class)
//         ->name('home');
// });

Route::get('/home', HomeShell::class)
    ->name('home');
