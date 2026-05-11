<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $students = Student::with(['fees', 'payments'])->get();

        return view('balance.index', compact('students'));
    }
}