<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramInformationRequest extends FormRequest
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
            'title' => 'required|max:255',
            'duration' => 'required|min:1|max:15|numeric',
            'eligibility' => 'required|string|max:5000|min:50',
            'objective' => 'required|string|max:5000|min:50',
            'training_resources' => 'required|string|max:5000|min:50',
            'job_opportunities' => 'required|string|max:5000|min:50',
            'cost' => 'required|numeric|min:1000',
            'available_seats' => 'required|numeric|min:1|max:60',
            'trainer_name'  => 'required|string|max:50|min:5'
        ];
    }
}
