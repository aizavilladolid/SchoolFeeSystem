@extends('layouts.app')

@section('content')
    <h1>Fee Collection Report</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Fee Type</th>
                <th>Amount Paid</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->student->student_id }}</td>
                    <td>{{ $payment->student->full_name }}</td>
                    <td>{{ $payment->fee->fee_type }}</td>
                    <td>P{{ number_format($payment->amount_paid, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align:right;"><strong>Total Collected:</strong></td>
                <td><strong>P{{ number_format($payments->sum('amount_paid'), 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>
@endsection
