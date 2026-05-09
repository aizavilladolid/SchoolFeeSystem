@extends('layouts.app')

@section('content')
<!-- Title and Action Buttons -->
<div style="display: flex; justify-content: space-between; align-items: flex-end; width: 100%; margin-bottom: 10px;">
    <h1 style="margin: 0; font-size: 32px; color: #1a1a1a; font-weight: 700;">Fee Collection Report</h1>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('payments.create') }}" style="background: #004d26; color: white; padding: 12px 20px; border-radius: 6px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            + Add Payment
        </a>
        <a href="{{ route('reports.export') }}" style="background: #5C4033; color: white; padding: 12px 20px; border-radius: 6px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            💾 Export CSV
        </a>
    </div>
</div>

<!-- Horizontal Line for Clean Separation -->
<hr style="border: 0; border-top: 1px solid #ddd; margin-bottom: 20px;">

<!-- Filter Bar -->
<div style="background: white; padding: 20px; border-radius: 8px; border: 1px solid #e0e0e0; display: flex; align-items: center; gap: 15px;">
    <span style="font-weight: bold; color: #555;">Filter:</span>
    <form action="{{ route('reports.index') }}" method="GET" style="display: flex; gap: 10px; flex-grow: 1;">
        <select name="filter" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; width: 250px;">
            <option value="">All Time</option>
            <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Today</option>
            <option value="this_month" {{ request('filter') == 'this_month' ? 'selected' : '' }}>This Month</option>
        </select>
        <button type="submit" style="background: #004d26; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold;">Apply</button>
    </form>
</div>

<!-- Breakdown Cards -->
<div style="display: flex; gap: 20px; flex-wrap: wrap;">
    @foreach($breakdown as $item)
    <div style="background: white; padding: 20px; border-radius: 10px; border-top: 5px solid #004d26; box-shadow: 0 4px 6px rgba(0,0,0,0.05); min-width: 200px;">
        <div style="color: #888; font-size: 12px; font-weight: 800; text-transform: uppercase;">{{ $item->feeDefinition->fee_type ?? 'Fees' }}</div>
        <div style="font-size: 24px; font-weight: bold; color: #004d26; margin-top: 5px;">₱{{ number_format($item->total, 2) }}</div>
    </div>
    @endforeach
</div>

<!-- Table Container -->
<div style="background: white; border-radius: 10px; overflow: hidden; border: 1px solid #ddd; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #76d783; color: #004d26;">
                <th style="padding: 15px; text-align: left;">Date</th>
                <th style="padding: 15px; text-align: left;">Student ID</th>
                <th style="padding: 15px; text-align: left;">Name</th>
                <th style="padding: 15px; text-align: left;">Method</th>
                <th style="padding: 15px; text-align: right;">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 15px;">{{ $payment->payment_date }}</td>
                <td style="padding: 15px;">{{ $payment->student->student_id }}</td>
                <td style="padding: 15px;">{{ $payment->student->full_name }}</td>
                <td style="padding: 15px;"><span style="background: #f0f0f0; padding: 4px 8px; border-radius: 4px; font-size: 12px;">{{ $payment->payment_method }}</span></td>
                <td style="padding: 15px; text-align: right; font-weight: bold;">₱{{ number_format($payment->amount_paid, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination Links (Requirement #11) -->
<div style="margin-top: 20px;">
    {{ $payments->links() }}
</div>
@endsection