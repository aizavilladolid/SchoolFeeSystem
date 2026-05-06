<h2>Add Student</h2>

<form method="POST" action="{{ route('students.store') }}">
@csrf

<input type="text" name="full_name" placeholder="Full Name"><br>
<input type="text" name="grade_level" placeholder="Grade Level"><br>
<input type="text" name="section" placeholder="Section"><br>
<input type="text" name="guardian_name" placeholder="Guardian"><br>
<input type="text" name="contact_number" placeholder="Contact"><br>

<button type="submit">Save</button>
</form>