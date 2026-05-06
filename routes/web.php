<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
Route::resource('fees', FeeController::class);



use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);


