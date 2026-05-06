<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('student_id')->unique();   // school ID
        $table->string('full_name');              // student name
        $table->string('grade_level');            // grade/year level
        $table->string('section')->nullable();    // optional section
        $table->string('guardian_name')->nullable(); // parent/guardian
        $table->string('contact_number')->nullable();  // phone/email
        $table->timestamps();                     // created_at & updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
