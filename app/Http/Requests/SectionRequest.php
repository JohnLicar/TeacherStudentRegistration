<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'section_description' => ['required', 'min:4', 'max:100', Rule::unique('section')->ignore($this->id)],
            'year_level_id' => 'required|integer|max:100',
            'course_id' => 'required|integer|max:100',
        ];
    }
}
