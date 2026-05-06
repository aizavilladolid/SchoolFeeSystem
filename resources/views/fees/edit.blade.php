<h2>Edit Fee</h2>

<form method="POST" action="{{ route('fees.update', $fee->id) }}">
    @csrf
    @method('PUT')

    <input name="fee_name" value="{{ $fee->fee_name }}"><br><br>
    <input name="amount" value="{{ $fee->amount }}"><br><br>
    <input name="grade_level" value="{{ $fee->grade_level }}"><br><br>
    <input name="academic_year" value="{{ $fee->academic_year }}"><br><br>
    <input name="semester" value="{{ $fee->semester }}"><br><br>

    <select name="type">
        <option value="required" {{ $fee->type == 'required' ? 'selected' : '' }}>Required</option>
        <option value="optional" {{ $fee->type == 'optional' ? 'selected' : '' }}>Optional</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('fees.index') }}">Back</a>