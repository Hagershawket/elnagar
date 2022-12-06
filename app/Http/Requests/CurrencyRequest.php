<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
            'name'               => 'required|unique:currencies,name,'. $this->id,
            'value'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => trans('validation.currency_name.required'),
            'name.unique'             => trans('validation.currency_name.unique'),
            'value.required'          => trans('validation.currency_value.required'),
        ];
    }
}
