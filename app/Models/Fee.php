<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'fee_name',
        'amount',
        'grade_level',
        'academic_year',
        'semester',
        'type'
    ];
}