<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/reports', [PaymentController::class, 'index']);

Route::get('/', function () {
    return view('welcome');

});
Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index']);
