<?php

namespace App\Http\Requests;

use App\Constant\BlogState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'category_id' => 'required|string',
            'tag_id'      => 'required|array',
            'blog_state'   => ['required', Rule::in([BlogState::APPROVED, BlogState::REJECTED, BlogState::PENDING]) ]
        ];
    }
}
