<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Link to student record
            $table->unsignedBigInteger('student_id');

            // Link to fee record
            $table->unsignedBigInteger('fee_id');

            // Payment details
            $table->decimal('amount_paid', 10, 2);
            $table->date('payment_date');             // when payment was made
            $table->string('payment_method');         // Cash, Check, Online, etc.

            $table->timestamps();

            // Optional foreign key constraints (if you have students and fees tables)
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
