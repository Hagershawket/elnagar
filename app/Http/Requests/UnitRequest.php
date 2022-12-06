<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'unit_name'          => 'required|unique:units,unit_name,'. $this->id,
            'unit_code'          => 'required|unique:units,unit_code,'. $this->id,
        ];
    }

    public function messages()
    {
        return [
            'unit_name.required'           => trans('validation.unit_name.required'),
            'unit_name.unique'             => trans('validation.unit_name.unique'),
            'unit_code.required'           => trans('validation.unit_code.required'),
            'unit_code.unique'             => trans('validation.unit_code.unique'),
        ];
    }
}
