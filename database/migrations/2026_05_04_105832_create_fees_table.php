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
    Schema::create('fees', function (Blueprint $table) {
    $table->id();
    $table->string('fee_name'); // Tuition, Lab, Misc
    $table->decimal('amount', 10, 2);
    $table->string('grade_level'); // Grade 7, Grade 10, etc.
    $table->string('academic_year'); // 2025-2026
    $table->string('semester'); // 1st / 2nd
    $table->enum('type', ['required', 'optional']);
    $table->timestamps();
});
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
