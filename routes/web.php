<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

// Reports page
Route::get('/reports', [PaymentController::class, 'reports'])->name('reports.index');

// Payments page (form + table + receipt links)
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{id}/receipt', [PaymentController::class, 'show'])->name('payments.receipt');
