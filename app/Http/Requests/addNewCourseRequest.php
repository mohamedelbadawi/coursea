<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addNewCourseRequest extends FormRequest
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
            'title' => 'required|string',
            'category_id' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'header_image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:2000'
        ];
    }
}
