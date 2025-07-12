<?php

namespace App\Http\Requests\Followup;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:customers,email,' . $this->route('customer'),
            'age' => 'required|integer|min:1|max:120',
            'dob' => 'required|date',
        ];
    }
    public function messages(): array
    {
        return [
            'dob.required' => 'A date of birth is required.',
            'dob.date' => 'The date of birth must be a valid date.',
        ];
    }
}
