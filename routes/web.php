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

// Makes shop public
Route::get('/shop', [BouquetController::class, 'shop'])->name('bouquets.shop');

// Bouquet detail page
//Route::get('/bouquets/{bouquet}', [BouquetController::class, 'show'])->name('bouquets.show');

// Order routes
Route::post('/orders', [OrderController::class, 'store'])->middleware('auth')->name('orders.store');

// 3) Profile + resource routes, all behind auth + admin check
Route::middleware(['auth', 'admin_gate'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Full Order CRUD
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');

    // Other resource routes
    Route::resource('customers', CustomerController::class);
    Route::resource('florists', FloristController::class);
    Route::resource('bouquets', BouquetController::class)->except(['show']);
});


Route::get('/bouquets/{bouquet}', [BouquetController::class, 'show'])->name('bouquets.show');
// 4) Breeze's built-in auth routes
require __DIR__.'/auth.php';
