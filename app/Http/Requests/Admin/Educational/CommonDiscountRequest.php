<?php

namespace App\Http\Requests\Admin\Educational;

use Illuminate\Foundation\Http\FormRequest;

class CommonDiscountRequest extends FormRequest
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
            'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9., ]+$/u',
            'percentage' => 'required|numeric|min:1|max:100',
            'discount_ceiling' => 'required|min:10|numeric',
            'minimal_order_amount' => 'required|min:1|numeric',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric',
            'status' => 'in:0,1',
        ];
    }
}
