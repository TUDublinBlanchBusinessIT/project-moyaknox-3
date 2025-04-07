<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FloristController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes for your CRUD
Route::resource('customers', CustomerController::class);
Route::resource('florists', FloristController::class);
Route::resource('bouquets', BouquetController::class);
Route::resource('orders', OrderController::class);
