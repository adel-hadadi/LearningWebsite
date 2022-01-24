<?php

namespace App\Http\Requests\Admin\Educational;

use Illuminate\Foundation\Http\FormRequest;

class AmazingSaleRequest extends FormRequest
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
            'course_id' => 'required|numeric|exists:courses,id',
            'percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric',
            'status' => 'in:0,1',
        ];
    }
}
