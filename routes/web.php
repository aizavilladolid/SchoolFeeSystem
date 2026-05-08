<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController; 


Route::get('/', function () {
    return view('welcome');
});


Route::group([], function () {
// The main Reports page
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

// The CSV Export route (This was the missing piece!)
Route::get('/reports/export', [ReportController::class, 'exportCsv'])->name('reports.export');

//Payment Form and Saving
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

});
