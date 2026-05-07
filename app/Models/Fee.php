<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'fee_type', 
        'amount', 
        'grade_level', 
        'semester'
    ];
}
