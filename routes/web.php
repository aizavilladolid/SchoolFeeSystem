<?php

use Illuminate\Support\Facades\Route;
Route::resource('students', StudentController::class);
Route::get('/', function () {
    return view('welcome');
});
