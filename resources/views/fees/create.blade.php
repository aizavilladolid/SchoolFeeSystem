<h2>Add Fee</h2>

<form method="POST" action="{{ route('fees.store') }}">
    @csrf

    <input name="fee_name" placeholder="Fee Name"><br><br>
    <input name="amount" placeholder="Amount"><br><br>
    <input name="grade_level" placeholder="Grade Level"><br><br>
    <input name="academic_year" placeholder="Academic Year"><br><br>
    <input name="semester" placeholder="Semester"><br><br>

    <select name="type">
        <option value="required">Required</option>
        <option value="optional">Optional</option>
    </select><br><br>

    <button type="submit">Save</button>
</form>

<br>
<a href="{{ route('fees.index') }}">Back</a>