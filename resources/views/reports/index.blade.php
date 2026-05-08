<style>
    body { 
        background-color: #F5F5DC; 
        color: #2E1A05; 
        font-family: sans-serif; 
        padding: 40px; 
    }

    /* Style for the Export Button */
    .btn-export {
        background-color: #5C4033; /* Darker brown for contrast */
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        float: right;
    }

    .btn-export:hover {
        background-color: #3e2b22;
    }

    .summary-box {
        background: #B2AC88; 
        color: white; 
        padding: 15px; 
        margin-bottom: 20px; 
        display: inline-block;
        font-weight: bold;
        border-radius: 4px;
    }

    table { 
        width: 100%; 
        border-collapse: collapse; 
        background: white; 
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    th { 
        background-color: #B2AC88; 
        color: white; 
        padding: 12px; 
        text-align: left;
    }

    td { 
        padding: 12px; 
        border-bottom: 1px solid #eee; 
    }
</style>

<div style="overflow: hidden; margin-bottom: 20px;">
    <h1 style="display: inline-block; margin: 0;">Fee Collection Report</h1>
    
    <a href="{{ route('reports.export') }}" class="btn-export">
        📥 Export CSV
    </a>

    <a href="{{ route('payments.create') }}" style="background-color: #B2AC88; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; float: right; margin-right: 10px;">
    ➕ Add Payment
</a>

</div>

<form action="{{ route('reports.index') }}" method="GET" style="margin-bottom: 20px; background: white; padding: 15px; border-radius: 5px; border: 1px solid #ddd;">
    <label for="filter" style="font-weight: bold; color: #5C4033;">View Report For:</label>
    <select name="filter" id="filter" style="padding: 8px; border: 1px solid #B2AC88; border-radius: 4px;">
        <option value="">All Time</option>
        <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Today</option>
        <option value="this_month" {{ request('filter') == 'this_month' ? 'selected' : '' }}>This Month</option>
        <option value="this_year" {{ request('filter') == 'this_year' ? 'selected' : '' }}>This Year</option>
    </select>
    <button type="submit" style="background: #B2AC88; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">
        Filter
    </button>
    <a href="{{ route('reports.index') }}" style="text-decoration: none; font-size: 12px; color: #71797E; margin-left: 10px;">Reset</a>
</form>

<div class="summary-box">
    {{ request('filter') ? str_replace('_', ' ', strtoupper(request('filter'))) : 'ALL TIME' }} 
    | Total Collected: ₱{{ number_format($totalCollected, 2) }}
</div>

    @if(session('success'))
    <div style="background: #D4EDDA; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 4px; border: 1px solid #C3E6CB;">
        ✅ {{ session('success') }}
    </div>
@endif

<table>
    <tr>
        <th>Date</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Method</th>
        <th>Amount</th>
    </tr>
    @forelse($payments as $payment)
    <tr>
        <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}</td>
        <td>{{ $payment->student->student_id ?? $payment->student_id }}</td>
        <td>{{ $payment->student->full_name ?? 'Student' }}</td>
        <td><span style="font-size: 10px; background: #eee; padding: 2px 5px; border-radius: 3px;">{{ $payment->payment_method }}</span></td>
        <td style="font-weight: bold;">₱{{ number_format($payment->amount_paid, 2) }}</td>
    </tr>
@empty
    <tr>
        <td colspan="5" style="text-align: center; color: #71797E; padding: 20px;">
            No records found for this period.
        </td>
    </tr>
@endforelse
</table>