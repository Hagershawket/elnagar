<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'name'               => 'required|unique:countries,name,'. $this->id,
            'currency_id'        => 'required',
            'image'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => trans('validation.country_name.required'),
            'name.unique'             => trans('validation.country_name.unique'),
            'currency_id.required'    => trans('validation.currency_id.required'),
            'image.image'             => trans('validation.country_image.image'),
            'image.mimes'             => trans('validation.country_image.mimes'),
            'image.max'               => trans('validation.country_image.max'),
        ];
    }
}
