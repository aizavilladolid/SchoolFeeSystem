{{-- resources/views/fees/create.blade.php --}}

@extends('layouts.app')

@section('content')

<h2 class="page-title mb-4">
    Add Fee Structure
</h2>

<div class="card custom-card">

    <div class="card-body p-4">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('fees.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Fee Type</label>

                <select name="fee_name"
                        class="form-control">

                    <option value="">Select Fee Type</option>
                    <option value="Tuition">Tuition</option>
                    <option value="Miscellaneous">Miscellaneous</option>
                    <option value="Laboratory">Laboratory</option>
                    <option value="Uniform">Uniform</option>
                    <option value="Library">Library</option>

                </select>

            </div>

            <div class="mb-3">

                <label>Amount</label>

                <input type="number"
                       step="0.01"
                       name="amount"
                       class="form-control"
                       placeholder="Enter amount">

            </div>

            <div class="mb-3">

                <label>Grade Level</label>

                <input type="text"
                       name="grade_level"
                       class="form-control"
                       placeholder="Example: Grade 10">

            </div>

            <div class="mb-3">

                <label>School Year</label>

                <input type="text"
                       name="school_year"
                       class="form-control"
                       placeholder="2025-2026">

            </div>

            <div class="mb-3">

                <label>Semester</label>

                <select name="semester"
                        class="form-control">

                    <option value="">Select Semester</option>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>

                </select>

            </div>

            <div class="mb-4">

                <label>Fee Category</label>

                <div class="form-check">

                    <input class="form-check-input"
                           type="radio"
                           name="is_required"
                           value="1">

                    <label class="form-check-label">
                        Required
                    </label>

                </div>

                <div class="form-check">

                    <input class="form-check-input"
                           type="radio"
                           name="is_required"
                           value="0">

                    <label class="form-check-label">
                        Optional
                    </label>

                </div>

            </div>

            <button class="btn btn-success">
                Save Fee
            </button>

            <a href="{{ route('fees.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection