<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9., ]+$/u',
                'keywords' => 'required',
                'logo' => 'required|image|mimes:png,jpg,jpeg,gif',
                'icon' => 'required|image|mimes:png,jpg,jpeg,gif',
                'description' => 'required|max:500'
            ];
        }else{
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9., ]+$/u',
                'keywords' => 'required',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                'icon' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                'description' => 'required|max:500'
            ];
        }
    }
}
