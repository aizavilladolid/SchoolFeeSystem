<h2>Edit Student</h2>

<form method="POST" action="{{ route('students.update', $student->id) }}">
@csrf
@method('PUT')

<input type="text" name="full_name" value="{{ $student->full_name }}"><br>
<input type="text" name="grade_level" value="{{ $student->grade_level }}"><br>
<input type="text" name="section" value="{{ $student->section }}"><br>
<input type="text" name="guardian_name" value="{{ $student->guardian_name }}"><br>
<input type="text" name="contact_number" value="{{ $student->contact_number }}"><br>

<button type="submit">Update</button>
</form>