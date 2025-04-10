<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FloristController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\OrderController;

// 1) Show the Breeze login page at "/"
Route::get('/', function () {
    return view('auth.login');
})->name('root');

// 2) After login, show a simple home page
Route::get('/home', function () {
    return view('home');  // 'home.blade.php' with "Welcome to Floral Meath"
})->middleware('auth')->name('home');

// 3) Profile + resource routes, all behind auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('customers', CustomerController::class);
    Route::resource('florists', FloristController::class);
    Route::resource('bouquets', BouquetController::class);
    Route::resource('orders', OrderController::class);
});

// 4) Breeze's built-in auth routes (login, register, etc.)
require __DIR__.'/auth.php';
