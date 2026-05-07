<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    //Relationship: A Payment belongs to a Student(User)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    //Relationship: A payment belongs to a specific fee definition
    public function feeDefinition(): BelongsTo
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }
}
