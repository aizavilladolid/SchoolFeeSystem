{{-- resources/views/students/edit.blade.php --}}

@extends('layouts.app')

@section('content')

<h2 class="fw-bold mb-3">Edit Student</h2>

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

        <form action="{{ route('students.update', $student->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Full Name</label>
                <input type="text"
                       name="full_name"
                       value="{{ $student->full_name }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Grade Level</label>
                <input type="text"
                       name="grade_level"
                       value="{{ $student->grade_level }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Section</label>
                <input type="text"
                       name="section"
                       value="{{ $student->section }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Guardian Name</label>
                <input type="text"
                       name="guardian_name"
                       value="{{ $student->guardian_name }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Contact Number</label>
                <input type="text"
                       name="contact_number"
                       value="{{ $student->contact_number }}"
                       class="form-control">
            </div>

            <button class="btn btn-primary">
                Update Student
            </button>

            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection