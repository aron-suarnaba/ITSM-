<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
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

    Route::post('/tickets', [RequestController::class, 'store'])
        ->name('request.submit');

    // Route::get('/review', [ReviewController::class, 'usersRequestedTable'])
    //     ->name('review');

    // Route::post('/review', [TicketsController::class, 'reviewApproved'])
    //     ->name('review.approved');

    // Route::get('/approval', function(){
    //     return view('approval');
    // })->name('approval');


    Route::get('/approval', [ApprovalController::class, 'index'])
        ->name('approval.index');

    Route::post('/approval', [ApprovalController::class, 'approve'])
        ->name('approval.approve');

    Route::get('/guides', function(){
        return view('guides');
    })->name('guides');
});

