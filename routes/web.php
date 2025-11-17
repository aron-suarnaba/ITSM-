<?php

use App\Livewire\GuestShell;
use App\Livewire\HomeShell;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', GuestShell::class)
    ->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.post');

Route::get('/logout', [UserController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', HomeShell::class)
        ->name('home');
});

// Route::get('/home', HomeShell::class)
//     ->name('home');

Route::get('/check-session', function() {
    if (Auth::check()) {
        return 'You are logged in as ' . Auth::user()->email;
    }
    return 'Not logged in.';
})->name('check.session');
