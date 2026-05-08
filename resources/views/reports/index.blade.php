@extends('layouts.app')

@section('content')
<div style="width: 100%;"> 
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1 style="color: #000; margin: 0; font-size: 28px;">Fee Collection Report</h1>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('payments.create') }}" style="background-color: #004d26; color: white; padding: 12px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
                ➕ Add Payment
            </a>
            <a href="{{ route('reports.export') }}" style="background-color: #5C4033; color: white; padding: 12px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">
                📥 Export CSV
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background: #D4EDDA; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #C3E6CB;">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; gap: 20px; margin-bottom: 30px;">
        <div style="background: white; padding: 20px; border-radius: 8px; border-left: 5px solid #004d26; box-shadow: 0 2px 4px rgba(0,0,0,0.05); flex: 1;">
            <span style="color: #666; font-size: 12px; font-weight: bold; text-transform: uppercase;">Total Collected</span>
            <h2 style="margin: 5px 0 0 0; color: #004d26;">₱{{ number_format($totalCollected, 2) }}</h2>
        </div>

        <div style="background: white; padding: 20px; border-radius: 8px; border: 1px solid #ddd; flex: 2; display: flex; align-items: center;">
            <form action="{{ route('reports.index') }}" method="GET" style="display: flex; align-items: center; gap: 10px; width: 100%;">
                <label style="font-weight: bold; font-size: 14px; white-space: nowrap;">Filter By:</label>
                <select name="filter" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; flex-grow: 1;">
                    <option value="">All Time</option>
                    <option value="today">Today</option>
                    <option value="this_month">This Month</option>
                </select>
                <button type="submit" style="background: #004d26; color: white; border: none; padding: 8px 20px; border-radius: 4px; cursor: pointer; font-weight: bold;">Apply</button>
            </form>
        </div>
    </div>

    <div style="background: white; border-radius: 4px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border: 1px solid #ddd;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #76d783; color: #004d26;"> 
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #5cb85c;">Date</th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #5cb85c;">Student ID</th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #5cb85c;">Name</th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #5cb85c;">Method</th>
                    <th style="padding: 15px; text-align: right; border-bottom: 2px solid #5cb85c;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td style="padding: 12px; border: 1px solid #eee;">{{ $payment->payment_date }}</td>
                    <td style="padding: 12px; border: 1px solid #eee;">{{ $payment->student->student_id }}</td>
                    <td style="padding: 12px; border: 1px solid #eee;">{{ $payment->student->full_name }}</td>
                    <td style="padding: 12px; border: 1px solid #eee;">{{ $payment->payment_method }}</td>
                    <td style="padding: 12px; border: 1px solid #eee; font-weight: bold; text-align: right;">₱{{ number_format($payment->amount_paid, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection