<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // ✅ Reports page
    public function reports()
    {
        $payments = Payment::with(['student', 'fee'])->get();
        return view('reports', compact('payments'));
    }

    // ✅ Payments page (form + table)
    public function index()
    {
        $payments = Payment::all();
        return view('payments', compact('payments'));
    }

    // ✅ Store new payment
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'fee_id' => 'required|integer',
            'amount_paid' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully!');
    }

    // ✅ Show receipt for one payment
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return view('receipt', compact('payment'));
    }
}
