<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate']);

    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('update-password');
});
  

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');