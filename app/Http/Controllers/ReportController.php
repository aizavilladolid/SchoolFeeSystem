<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\Fee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // --- TEST DATA LOGIC (Satisfies Foreign Key Constraints) ---
        // 1. Ensure a User exists
        $user = User::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Nilda Villegas',
                'email' => 'nilda@test.com',
                'password' => bcrypt('password'),
                'student_id' => '2026-0001'
            ]
        );

        // 2. Ensure a Fee exists
        $fee = Fee::firstOrCreate(
            ['id' => 1],
            [
                'fee_type' => 'Tuition Fee',
                'amount' => 5000.00,
                'grade_level' => '1st Year',
                'semester' => '1st'
            ]
        );

        // 3. Create a Payment if table is empty
        if (Payment::count() === 0) {
            Payment::create([
                'student_id' => $user->id,
                'fee_id' => $fee->id,
                'amount_paid' => 2500.00,
                'payment_date' => now(),
                'payment_method' => 'Cash'
            ]);
        }

        // --- FILTERING LOGIC ---
        $query = Payment::with(['user', 'feeDefinition']);

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
        $payments = Payment::with(['user', 'feeDefinition'])->get();

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
                    $payment->user->name ?? 'N/A',
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