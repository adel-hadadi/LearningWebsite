<?php

namespace App\Http\Requests\Admin\Educational;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'title' => 'required|max:120|min:2|regex:/^[آا-یa-zA-Z0-9., ]+$/u',
                'description' => 'required|max:500|min:5',
                'video' => 'required|mimes:mp4,env',
                'files' => 'required|mimes:zip,rar',
            ];
        } else {
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9., ]+$/u',
                'description' => 'required|max:500|min:5',
                'video' => 'mimes:mp4,env',
                'files' => 'mimes:zip,rar',
            ];
        }
    }
}
