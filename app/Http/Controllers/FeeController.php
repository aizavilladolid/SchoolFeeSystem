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

    public function store(StoreFeeRequest $request)
{
    Fee::create($request->validated());

    return redirect()->route('fees.index')
        ->with('success', 'Fee created successfully!');
}
    public function edit(Fee $fee)
    {
        return view('fees.edit', compact('fee'));
    }

    public function update(StoreFeeRequest $request, Fee $fee)
{
    $fee->update($request->validated());

    return redirect()->route('fees.index')
        ->with('success', 'Fee updated successfully!');
}

    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()->route('fees.index')
            ->with('success', 'Fee deleted successfully!');
    }
}



