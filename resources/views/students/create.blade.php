{{-- resources/views/students/create.blade.php --}}

@extends('layouts.app')

@section('content')

<h2 class="page-title mb-4">
    Add Student
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

        <form action="{{ route('students.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Full Name</label>

                <input type="text"
                       name="full_name"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Grade Level</label>

                <input type="text"
                       name="grade_level"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Section</label>

                <input type="text"
                       name="section"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Guardian Name</label>

                <input type="text"
                       name="guardian_name"
                       class="form-control">

            </div>

            <div class="mb-4">

                <label>Contact Number</label>

                <input type="text"
                       name="contact_number"
                       class="form-control">

            </div>

            <button class="btn btn-success">
                Save Student
            </button>

            <a href="{{ route('students.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection