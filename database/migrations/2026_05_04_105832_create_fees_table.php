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
        $table->string('fee_type');       
        $table->decimal('amount', 10, 2); 
        $table->string('grade_level');    
        $table->string('semester')->nullable(); 
        $table->boolean('is_mandatory')->default(true); 
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
