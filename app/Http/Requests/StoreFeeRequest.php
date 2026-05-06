<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'fee_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'grade_level' => 'required|string',
        'academic_year' => 'required|string',
        'semester' => 'required|string',
        'type' => 'required|in:required,optional',
    ];
}
}


