<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // A student only needs these
    protected $fillable = [
    'id', 
    'student_id', 
    'full_name', 
    'grade_level', 
    'section', 
    'guardian_name', 
    'contact_info'
];
    public function payments() {
    return $this->hasMany(Payment::class);
}

}