<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportRequest extends FormRequest
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
            'type'               => 'required',
            'num'                => 'required|unique:transports,num,'. $this->id,
            'chassis_num'        => 'required|unique:transports,chassis_num,'. $this->id,
            'organization_name'  => 'required',
            'image.*'            => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date'         => 'required',
            'exp_date'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required'                 => trans('validation.transport_type.required'),
            'num.required'                  => trans('validation.transport_num.required'),
            'num.unique'                    => trans('validation.transport_num.unique'),
            'chassis_num.required'          => trans('validation.transport_chassis_num.required'),
            'chassis_num.unique'            => trans('validation.transport_chassis_num.unique'),
            'organization_name.required'    => trans('validation.transport_organization_name.required'),
            'start_date.required'           => trans('validation.transport_start_date.required'),
            'exp_date.required'             => trans('validation.transport_exp_date.required'),
            // 'image.required'                => trans('validation.transport_image.required'),
            'image.*.image'                 => trans('validation.transport_image.image'),
            'image.*.mimes'                 => trans('validation.transport_image.mimes'),
            'image.*.max'                   => trans('validation.transport_image.max'), 

        ];
    }
}
