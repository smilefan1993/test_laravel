<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        return ['name' => 'required|unique:Tests',
            'category' => 'required',
            'sub_category' => 'required',
            'success_weight' => 'required|digits_between:0,100',
            'max_test_time' => 'required|numeric',
        ];
    }
}
