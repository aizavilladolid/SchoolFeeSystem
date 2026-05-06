<h2>Student List</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="GET">
    <input type="text" name="search" placeholder="Search student">
    <button type="submit">Search</button>
</form>

<a href="{{ route('students.create') }}">Add Student</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Grade</th>
    <th>Section</th>
    <th>Guardian</th>
    <th>Contact</th>
    <th>Action</th>
</tr>

@foreach($students as $student)
<tr>
    <td>{{ $student->student_id }}</td>
    <td>{{ $student->full_name }}</td>
    <td>{{ $student->grade_level }}</td>
    <td>{{ $student->section }}</td>
    <td>{{ $student->guardian_name }}</td>
    <td>{{ $student->contact_number }}</td>
    <td>
        <a href="{{ route('students.edit', $student->id) }}">Edit</a>

        <form method="POST" action="{{ route('students.destroy', $student->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $students->links() }}