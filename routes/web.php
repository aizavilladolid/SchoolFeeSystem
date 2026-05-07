<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController; 

Route::get('/', function () {
    return view('welcome');
});

// The main Reports page
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

// The CSV Export route (This was the missing piece!)
Route::get('/reports/export', [ReportController::class, 'exportCsv'])->name('reports.export');