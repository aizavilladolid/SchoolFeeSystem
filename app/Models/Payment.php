<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'student_id',
        'fee_id',
        'amount_paid',
        'payment_date',
        'payment_method'
    ];
    //
}
