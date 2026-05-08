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
        

        // --- FILTERING LOGIC ---
        $query = Payment::with(['student', 'feeDefinition']);

        if ($request->filled('filter')) {
            switch ($request->filter) {
                case 'today':
                    $query->whereDate('payment_date', today());
                    break;
                case 'this_month':
                    $query->whereMonth('payment_date', now()->month)
                          ->whereYear('payment_date', now()->year);
                    break;
                case 'this_year':
                    $query->whereYear('payment_date', now()->year);
                    break;
            }
        }

        $payments = $query->get();
        $totalCollected = $payments->sum('amount_paid');

        return view('reports.index', compact('payments', 'totalCollected'));
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
                    $payment->student->name ?? 'N/A',
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