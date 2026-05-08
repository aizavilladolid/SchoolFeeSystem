<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Fee;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
{
    $students = \App\Models\Student::all();
    $fees = \App\Models\Fee::all();

    return view('payments.create', compact('students', 'fees'));
}

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_id' => 'required|exists:fees,id',
            'amount_paid' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
        ]);

        Payment::create([
        'student_id' => $request->student_id,
        'fee_id' => $request->fee_id,
        'amount_paid' => $request->amount_paid,
        'payment_date' => now(), // Set to today automatically
        'payment_method' => $request->payment_method,
    ]);

        return redirect()->route('reports.index')->with('success', 'Payment recorded successfully!');
    }
}
