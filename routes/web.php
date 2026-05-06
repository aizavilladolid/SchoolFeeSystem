<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});
Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index']);
