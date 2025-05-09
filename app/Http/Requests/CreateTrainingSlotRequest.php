<?php

namespace App\Http\Requests;

use App\Constant\ProgramEnrollmentStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTrainingSlotRequest extends FormRequest
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
            'name'              =>  'required|string|max:255',
            'start_time'        =>  'required|date_format:H:i',
            'end_time'          =>  'required|date_format:H:i|after:start_time',
            'available_seat'    =>  'required|numeric|min:1',
        ];
    }
}
