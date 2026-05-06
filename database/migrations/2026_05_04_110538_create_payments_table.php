<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');   // link to students
        $table->unsignedBigInteger('fee_id');       // link to fees
        $table->decimal('amount_paid', 10, 2);      // payment amount
        $table->date('payment_date');               // when paid
        $table->string('payment_method');           // cash/check/online
        $table->timestamps();

        // Foreign keys
        //$table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        //$table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
