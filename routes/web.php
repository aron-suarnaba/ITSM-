<?php

use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;





Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.submit');

Route::get('/logout', [UserController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', function(){
        return view('home');
    })->name('home');

    Route::post('/tickets', [TicketsController::class, 'submit'])
        ->name('tickets.submit');
});

// Route::get('/home', HomeShell::class)
//     ->name('home');
