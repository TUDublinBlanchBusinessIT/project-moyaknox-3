<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FloristController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\OrderController;
use App\Models\Bouquet;

// 1) Show the Breeze login page at "/"
Route::get('/', function () {
    return view('auth.login');
})->name('root');

// 2) After login, show home page with bouquet listings
Route::get('/home', [BouquetController::class, 'showAll'])->middleware('auth')->name('home');

// makes shop public
Route::get('/shop', [BouquetController::class, 'shop'])->name('bouquets.shop');

// bouquet detail page
Route::get('/bouquets/{bouquet}', [BouquetController::class, 'show'])->name('bouquets.show');

// form submission page
Route::middleware(['auth'])->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});

// 3) Profile + resource routes, all behind auth
Route::middleware(['auth', 'admin_gate'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('customers', CustomerController::class);
    Route::resource('florists', FloristController::class);
    Route::resource('bouquets', BouquetController::class)->except(['show']);
    Route::resource('orders', OrderController::class);
});

// 4) Breeze's built-in auth routes (login, register, etc.)
require __DIR__.'/auth.php';
