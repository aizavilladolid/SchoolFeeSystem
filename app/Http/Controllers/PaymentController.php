<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class PaymentController extends Controller
{
   public function index()
{
    $payments = Payment::with(['student', 'fee'])->get();
    return view('reports', compact('payments'));
}

}
