<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;


Route::get('/balance', [BalanceController::class, 'index'])->name('balance.index');
Route::get('/', function () {
    return view('welcome');
});
