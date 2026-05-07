{{-- resources/views/students/index.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="page-title">
        Student Management
    </h2>

    <a href="{{ route('students.create') }}"
       class="btn btn-primary">
        Add Student
    </a>

</div>

<form action="{{ route('students.index') }}"
      method="GET"
      class="mb-4">

    <div class="row">

        <div class="col-md-4">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search student">

        </div>

        <div class="col-md-2">

            <button class="btn btn-dark w-100">
                Search
            </button>

        </div>

    </div>

</form>

<div class="card custom-card">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Grade Level</th>
                    <th>Section</th>
                    <th>Guardian</th>
                    <th>Contact</th>
                    <th width="180">Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($students as $student)

                    <tr>

                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->grade_level }}</td>
                        <td>{{ $student->section }}</td>
                        <td>{{ $student->guardian_name }}</td>
                        <td>{{ $student->contact_number }}</td>

                        <td>

                            <a href="{{ route('students.edit', $student->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('students.destroy', $student->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this student?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-4">
                            No students found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $students->links() }}
        </div>

    </div>

</div>

@endsection