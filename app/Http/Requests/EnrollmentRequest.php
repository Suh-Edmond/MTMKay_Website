<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
            'name'  => 'required|min:5',
            'email' => 'required|email|string|lowercase',
//            'telephone' => 'required|string|min:9|max:18|regex:/(0)[0-9]/|not_regex:/[a-z]/',
            'telephone' => 'required|string|min:9|max:18',
            'address'   => 'required|string|max:50'
        ];
    }
}
