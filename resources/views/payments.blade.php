@extends('layouts.app')

@section('content')
    <h1>Payment Processing</h1>

    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/reports') }}">Reports</a>
        <a href="{{ url('/payments') }}">Payments</a>
        <a href="{{ url('/balance') }}">Balance</a>
    </nav>

    <!-- Success message -->
    @if(session('success'))
        <div class="summary-box" style="background-color:#d4edda; border:1px solid #c3e6cb; color:#155724; padding:10px; margin:10px 0;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Payment form -->
    <form action="{{ route('payments.store') }}" method="POST" style="margin-bottom:20px;">
        @csrf
        <label for="student_id">Student ID:</label>
        <input type="number" name="student_id" required>

        <label for="fee_id">Fee ID:</label>
        <input type="number" name="fee_id" required>

        <label for="amount_paid">Amount Paid:</label>
        <input type="number" step="0.01" name="amount_paid" required>

        <label for="payment_date">Payment Date:</label>
        <input type="date" name="payment_date" required>

        <label for="payment_method">Payment Method:</label>
        <select name="payment_method" required>
            <option value="Cash">Cash</option>
            <option value="Check">Check</option>
            <option value="Online">Online</option>
        </select>

        <button type="submit">Submit Payment</button>
    </form>


    </div>
@endsection
