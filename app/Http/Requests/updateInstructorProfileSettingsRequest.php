<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateInstructorProfileSettingsRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email',
            'address' => 'nullable|string',
            'bio' => 'nullable',
            'linkedin' => 'nullable|string',
            'facebook' => 'nullable|string',
            'github' => 'nullable|string',
            'twitter' => 'nullable|string',
            'skills' => 'nullable',
            'birth_date' => 'nullable',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
}
