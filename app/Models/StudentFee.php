<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentFee extends Model
{
    //These are the columns we can fill with data
    protected $fillable = [
        'user_id',
        'fee_id',
        'balance',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function feeDefinition(): BelongsTo
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }
}
