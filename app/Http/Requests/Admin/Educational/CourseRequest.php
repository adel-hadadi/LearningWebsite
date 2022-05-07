<?php

namespace App\Http\Requests\Admin\Educational;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9.,آ ]+$/u',
                'description' => 'required|max:2000|min:5',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9.,آ ]+$/u',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:categories,id',
                'collection_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:collections,id',
                'price' => 'numeric|regex:/^[0-9]+$/u',
                'video' => 'required|mimes:mp4',
                'headline' => 'required|max:1000|min:5',
                'summary' => 'required|max:1000|min:5',
            ];
        } else {
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9.,آ ]+$/u',
                'description' => 'required|max:2000|min:5',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9.,آ ]+$/u',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:categories,id',
                'collection_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:collections,id',
                'price' => 'numeric|regex:/^[0-9]+$/u',
                'video' => 'mimes:mp4',
                'headline' => 'required|max:1000|min:5',
                'summary' => 'required|max:1000|min:5',
            ];
        }
    }
}
