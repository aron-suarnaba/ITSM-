<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.submit');

Route::get('/logout', [UserController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/request', [RequestController::class, 'index'])
        ->name('request');

    Route::post('/tickets', [TicketsController::class, 'submit'])
        ->name('tickets.submit');

});

