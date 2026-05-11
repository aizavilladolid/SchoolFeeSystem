<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_type',
        'amount',
        'grade_level',
        'semester',
        'is_mandatory',
    ];
}
