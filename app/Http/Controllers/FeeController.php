<?php

namespace App\Http\Controllers;


use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index(Request $request)
{
    $query = Fee::query();

    if ($request->grade_level) {
        $query->where('grade_level', $request->grade_level);
    }

    if ($request->academic_year) {
        $query->where('academic_year', $request->academic_year);
    }

    $fees = $query->get();

    return view('fees.index', compact('fees'));
}

    public function create()
    {
        return view('fees.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'fee_name' => 'required',
        'amount' => 'required|numeric',
        'grade_level' => 'required',
        'school_year' => 'required',
        'semester' => 'required',
        'is_required' => 'required',
    ]);

    Fee::create([
        'fee_name' => $request->fee_name,
        'amount' => $request->amount,
        'grade_level' => $request->grade_level,
        'school_year' => $request->school_year,
        'semester' => $request->semester,
        'is_required' => $request->is_required,
    ]);

    return redirect()
        ->route('fees.index')
        ->with('success', 'Fee added successfully!');
}

    public function edit(Fee $fee)
    {
        return view('fees.edit', compact('fee'));
    }

    public function update(Request $request, Fee $fee)
{
    $request->validate([
        'fee_name' => 'required',
        'amount' => 'required|numeric',
        'grade_level' => 'required',
        'school_year' => 'required',
        'semester' => 'required',
        'is_required' => 'required',
    ]);

    $fee->update([
        'fee_name' => $request->fee_name,
        'amount' => $request->amount,
        'grade_level' => $request->grade_level,
        'school_year' => $request->school_year,
        'semester' => $request->semester,
        'is_required' => $request->is_required,
    ]);

    return redirect()
        ->route('fees.index')
        ->with('success', 'Fee updated successfully!');
}

    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()->route('fees.index')
            ->with('success', 'Fee deleted successfully!');
    }
}



