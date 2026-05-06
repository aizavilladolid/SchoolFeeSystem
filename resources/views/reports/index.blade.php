<style>
    body { background-color: #F5F5DC; color: #2E1A05; font-family: sans-serif; padding: 20px; }
    th { background-color: #B2AC88; color: white; padding: 10px; }
    table { width: 100%; border-collapse: collapse; background: white; }
    td { padding: 10px; border: 1px solid #ddd; }
</style>
<h1>Fee Collection Report</h1>
<div style="background: #B2AC88; color: white; padding: 15px; margin-bottom: 20px; display: inline-block;">
    Total: ₱{{ number_format($totalCollected, 2) }}
</div>
<table>
    <tr><th>Student ID</th><th>Name</th><th>Amount</th></tr>
    @foreach($payments as $payment)
    <tr>
        <td>{{ $payment->student_id }}</td>
        <td>{{ $payment->name }}</td>
        <td>₱{{ number_format($payment->amount, 2) }}</td>
    </tr>
    @endforeach
</table>