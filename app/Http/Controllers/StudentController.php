<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::when($search, function ($query) use ($search) {
            return $query->where('full_name', 'like', "%$search%")
                         ->orWhere('student_id', 'like', "%$search%")
                         ->orWhere('grade_level', 'like', "%$search%");
        })->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create([
            'student_id' => 'STU-' . time(),
            'full_name' => $request->full_name,
            'grade_level' => $request->grade_level,
            'section' => $request->section,
            'guardian_name' => $request->guardian_name,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully!');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(StoreStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return back()->with('success', 'Student deleted!');
    }
}