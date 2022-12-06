<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'               => 'required|unique:products,name,'. $this->id,
            'unit_id'            => 'required',
            'warehouse_id'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => trans('validation.product_name.required'),
            'name.unique'             => trans('validation.product_name.unique'),
            'unit_id.required'        => trans('validation.unit_id.required'),
            'warehouse_id.required'   => trans('validation.warehouse_id.required'),
        ];
    }
}
