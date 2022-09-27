<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class viewCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (in_array($this->course->id, auth()->user()->courses->pluck('id')->toArray())) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
