<style>
    body { 
        background-color: #F5F5DC; /* Cream background */
        color: #2E1A05; 
        font-family: sans-serif; 
        padding: 40px; 
    }

    .form-card {
        background: white;
        max-width: 500px;
        margin: 0 auto;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-top: 5px solid #B2AC88; /* Sage green accent */
    }

    h2 { color: #5C4033; margin-bottom: 20px; }

    label { 
        display: block; 
        margin-bottom: 8px; 
        font-weight: bold; 
        color: #5C4033;
    }

    select, input {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #B2AC88;
        border-radius: 4px;
        box-sizing: border-box; /* Ensures padding doesn't break width */
    }

    .btn-submit {
        background-color: #B2AC88;
        color: white;
        border: none;
        padding: 15px;
        width: 100%;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-submit:hover {
        background-color: #9A9473;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #71797E;
        text-decoration: none;
        font-size: 14px;
    }
</style>

<div class="form-card">
    <h2>Record New Payment</h2>

    <form action="{{ route('payments.store') }}" method="POST">
        @csrf

        <label for="student_id">Student Name</label>
        <select name="student_id" id="student_id" required>
            <option value="">-- Select Student --</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->full_name }} ({{ $student->student_id }})</option>
            @endforeach
        </select>

        <label for="fee_id">Fee Type</label>
        <select name="fee_id" id="fee_id" required>
            <option value="">-- Select Fee --</option>
            @foreach($fees as $fee)
                <option value="{{ $fee->id }}">{{ $fee->fee_type }} - ₱{{ number_format($fee->amount, 2) }}</option>
            @endforeach
        </select>

        <label for="amount_paid">Amount Paid (₱)</label>
        <input type="number" name="amount_paid" id="amount_paid" step="0.01" required placeholder="0.00">

        <label for="payment_method">Payment Method</label>
        <select name="payment_method" id="payment_method" required>
            <option value="Cash">Cash</option>
            <option value="GCash">GCash</option>
            <option value="Bank Transfer">Bank Transfer</option>
        </select>

        <button type="submit" class="btn-submit">Save Payment Record</button>
        
        <a href="{{ route('reports.index') }}" class="back-link">Cancel and Go Back</a>
    </form>
</div>