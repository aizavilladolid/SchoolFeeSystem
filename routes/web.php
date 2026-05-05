<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YourController; 

Route::get('/', function () {
    return view('welcome');
});

// This creates 7 routes for your School Fee System (index, create, store, etc.)
Route::resource('payments', YourController::class);