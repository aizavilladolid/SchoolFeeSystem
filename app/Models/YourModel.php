<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YourModel extends Model
{
    protected $fillable = [
        'student_number',
        'amount',
        'payment_method',
        'payment_date',
        'remarks',
    ];
    //
}
