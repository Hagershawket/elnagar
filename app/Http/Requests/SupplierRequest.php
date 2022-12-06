<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name'             => 'required|unique:suppliers,name,'. $this->id,
            'phone'            => 'required|unique:suppliers,phone,'. $this->id,
            'image'            => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'account_num.*'    => 'required_with:payment_method_id.*',
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => trans('validation.supplier_name.required'),
            'name.unique'             => trans('validation.supplier_name.unique'),
            'phone.required'          => trans('validation.supplier_phone.required'),
            'phone.unique'            => trans('validation.supplier_phone.unique'),
            'image.image'             => trans('validation.supplier_image.image'),
            'image.mimes'             => trans('validation.supplier_image.mimes'),
            'image.max'               => trans('validation.supplier_image.max'), 
            'account_num.*.required_with'  => trans('validation.supplier_wallet.required_with'),        
        ];
    }
}
