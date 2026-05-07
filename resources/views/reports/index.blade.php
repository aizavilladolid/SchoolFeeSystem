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
</div>

<div class="summary-box">
    Total Collected: ₱{{ number_format($totalCollected, 2) }}
</div>

<table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Method</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->student_id }}</td>
            
            <td>{{ $payment->user->name ?? 'Unknown Student' }}</td>
            
            <td>{{ $payment->payment_method }}</td>
            
            <td>₱{{ number_format($payment->amount_paid, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>