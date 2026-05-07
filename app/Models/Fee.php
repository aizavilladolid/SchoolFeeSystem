<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fee extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'fee_type',
        'amount',
        'grade_level',
        'semester',
        'is_mandatory',
    ];

    //Get the specific student records associated w/ this fee type
    public function studentFees(): HasMany
    {
        return $this->hasMany(StudentFee::class, 'fee_id');
    }
}
