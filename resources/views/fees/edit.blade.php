{{-- resources/views/fees/edit.blade.php --}}

@extends('layouts.app')

@section('content')

<h2 class="fw-bold mb-3">Edit Fee Structure</h2>

<div class="card shadow-sm">

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">
                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>

        @endif

        <form action="{{ route('fees.update', $fee->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">Fee Type</label>

                <select name="fee_name" class="form-control">

                    <option value="Tuition"
                        {{ $fee->fee_name == 'Tuition' ? 'selected' : '' }}>
                        Tuition
                    </option>

                    <option value="Miscellaneous"
                        {{ $fee->fee_name == 'Miscellaneous' ? 'selected' : '' }}>
                        Miscellaneous
                    </option>

                    <option value="Laboratory"
                        {{ $fee->fee_name == 'Laboratory' ? 'selected' : '' }}>
                        Laboratory
                    </option>

                    <option value="Uniform"
                        {{ $fee->fee_name == 'Uniform' ? 'selected' : '' }}>
                        Uniform
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">Amount</label>

                <input type="number"
                       step="0.01"
                       name="amount"
                       value="{{ $fee->amount }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">Grade Level</label>

                <input type="text"
                       name="grade_level"
                       value="{{ $fee->grade_level }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">School Year</label>

                <input type="text"
                       name="school_year"
                       value="{{ $fee->school_year }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">Semester</label>

                <select name="semester" class="form-control">

                    <option value="1st Semester"
                        {{ $fee->semester == '1st Semester' ? 'selected' : '' }}>
                        1st Semester
                    </option>

                    <option value="2nd Semester"
                        {{ $fee->semester == '2nd Semester' ? 'selected' : '' }}>
                        2nd Semester
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Fee Category
                </label>

                <div class="form-check">

                    <input class="form-check-input"
                           type="radio"
                           name="is_required"
                           value="1"
                           {{ $fee->is_required ? 'checked' : '' }}>

                    <label class="form-check-label">
                        Required
                    </label>

                </div>

                <div class="form-check">

                    <input class="form-check-input"
                           type="radio"
                           name="is_required"
                           value="0"
                           {{ !$fee->is_required ? 'checked' : '' }}>

                    <label class="form-check-label">
                        Optional
                    </label>

                </div>

            </div>

            <button class="btn btn-primary">
                Update Fee
            </button>

            <a href="{{ route('fees.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection