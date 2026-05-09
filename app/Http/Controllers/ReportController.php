<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use App\Models\Fee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function index(Request $request)
{
    // 1. Load payments with relationships
    $query = Payment::with(['student', 'feeDefinition']);

    // 2. Apply Filters
    if ($request->filled('filter')) {
        $filter = $request->filter;
        $query->when($filter == 'today', function($q) {
            return $q->whereDate('payment_date', today());
        })->when($filter == 'this_month', function($q) {
            return $q->whereMonth('payment_date', now()->month);
        });
    }

    // 3. FIX: Simplified Breakdown 
    // This avoids the "no such table" error by not using a manual join
    $breakdown = Payment::with('feeDefinition')
        ->selectRaw('fee_id, SUM(amount_paid) as total')
        ->groupBy('fee_id')
        ->get();

    $totalCollected = $query->sum('amount_paid');
    $payments = $query->latest()->paginate(10);

    return view('reports.index', compact('payments', 'totalCollected', 'breakdown'));
}
    /**
     * Requirement: Export CSV files
     */
    public function exportCsv()
    {
        $fileName = 'collection_report_' . now()->format('Y-m-d') . '.csv';
        $payments = Payment::with(['student', 'feeDefinition'])->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use ($payments) {
            $file = fopen('php://output', 'w');
            
            // CSV Headers
            fputcsv($file, ['Date', 'Student Name', 'Fee Type', 'Method', 'Amount']);

            foreach ($payments as $payment) {
                fputcsv($file, [
                    $payment->payment_date,
                    $payment->student->full_name ?? 'N/A', // Changed to full_name based on previous chat
                    $payment->feeDefinition->fee_type ?? 'General',
                    $payment->payment_method,
                    $payment->amount_paid
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}