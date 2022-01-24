<?php

namespace App\Http\Requests\Admin\Educational;

use Illuminate\Foundation\Http\FormRequest;

class CopanRequest extends FormRequest
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
            'code' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9., ]+$/u',
            'type' => 'required|in:0,1',
            'amount' => 'required|numeric',
            'discount_ceiling' => 'required|numeric',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric',
            'user_id' => 'nullable|exists:users,id',
            'amount_type' => 'required|numeric|in:0,1',
            'status' => 'required|in:0,1'
        ];
    }
}
