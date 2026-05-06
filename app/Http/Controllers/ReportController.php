<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        
        if (\App\Models\Payment::count() === 0) {
        \App\Models\Payment::create([
            'student_id' => 1, 
            'fee_id' => 1, 
            'amount_paid' => 1000.00,
            'payment_date' => now(),
            'payment_method' => 'Cash'
        ]);
    }

        // Get all payments
        $payments = Payment::all();

        //Calculate the total (Logic for the report)
        $totalCollected = Payment::sum('amount_paid');

        return view('reports.index', compact('payments', 'totalCollected'));
    }
}

