<?php

use App\Livewire\GuestShell;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::get('/', GuestShell::class)
    ->name('welcome');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.submit');
