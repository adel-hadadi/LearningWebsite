<?php

namespace App\Http\Requests\Admin\Educational;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9.,آ ]+$/u',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'summary' => 'required'
            ];
        } else{
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9.,آ ]+$/u',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'summary' => 'required'
            ];
        }
    }
}
