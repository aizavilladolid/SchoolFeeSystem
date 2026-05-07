<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creates a Test Student
        $student = \App\Models\User::create([
            'name' => 'Cleofe Mae Villegas',
            'student_id' => '2026-0001',
            'email' => 'student@test.com',
            'password' => bcrypt('password'),
        ]);

        //Creates standard fees
        $tuition = \App\Models\Fee::create([
            'fee_type' => 'Tuition Fee',
            'amount' => 15000,
            'grade_level' => '2nd Year',
            'semester' => '2nd'
        ]);

        $lab = \App\Models\Fee::create([
            'fee_type' => 'Computer Lab Fee',
            'amount' => 2500,
            'grade_level' => '2nd Year',
            'semester' => '2nd',
        ]);

        //Link them
        \App\Models\StudentFee::create([
        'user_id' => $student->id,
        'fee_id' => $tuition->id,
        'balance' => 15000,
        'status' => 'unpaid',
        ]);

        \App\Models\StudentFee::create([
        'user_id' => $student->id,
        'fee_id' => $lab->id,
        'balance' => 2500,
        'status' => 'paid',
    ]);
    
    }
}
