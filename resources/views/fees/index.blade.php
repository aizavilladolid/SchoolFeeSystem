{{-- resources/views/fees/index.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="page-title">
        Fee Structure
    </h2>

    <a href="{{ route('fees.create') }}"
       class="btn btn-primary">
        Add Fee
    </a>

</div>

<div class="card custom-card">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th>Fee Type</th>
                    <th>Amount</th>
                    <th>Grade Level</th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th width="180">Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($fees as $fee)

                    <tr>

                        <td>{{ $fee->fee_name }}</td>

                        <td>
                            ₱{{ number_format($fee->amount, 2) }}
                        </td>

                        <td>{{ $fee->grade_level }}</td>

                        <td>{{ $fee->school_year }}</td>

                        <td>{{ $fee->semester }}</td>

                        <td>

                            @if($fee->is_required)

                                <span class="badge badge-success">
                                    Required
                                </span>

                            @else

                                <span class="badge badge-optional">
                                    Optional
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('fees.edit', $fee->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('fees.destroy', $fee->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete fee?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-4">
                            No fee records found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection