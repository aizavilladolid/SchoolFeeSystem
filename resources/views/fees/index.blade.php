<!DOCTYPE html>
<html>
<head>
    <title>Fee Structure</title>
</head>
<body>

<h2>💰 Fee Structure</h2>

<!-- Success Message -->
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<!-- Filter -->
<form method="GET" action="{{ route('fees.index') }}">
    <input type="text" name="grade_level" placeholder="Grade Level">
    <input type="text" name="academic_year" placeholder="Academic Year">
    <button type="submit">Filter</button>
</form>

<br>

<a href="{{ route('fees.create') }}">➕ Add Fee</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Fee Name</th>
        <th>Amount</th>
        <th>Grade Level</th>
        <th>Year</th>
        <th>Semester</th>
        <th>Type</th>
        <th>Actions</th>
    </tr>

    @foreach($fees as $fee)
    <tr>
        <td>{{ $fee->fee_name }}</td>
        <td>₱{{ $fee->amount }}</td>
        <td>{{ $fee->grade_level }}</td>
        <td>{{ $fee->academic_year }}</td>
        <td>{{ $fee->semester }}</td>
        <td>{{ $fee->type }}</td>
        <td>
            <a href="{{ route('fees.edit', $fee->id) }}">Edit</a>

            <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>