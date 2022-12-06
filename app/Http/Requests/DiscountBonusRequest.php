<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountBonusRequest extends FormRequest
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
            'employee_id'           => 'required',
            'job_num'               => 'required',
            'type'                  => 'required',
            'date'                  => 'required',
            'amount'                => 'required',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required'             => trans('validation.employee_id.required'),
            'job_num.required'                 => trans('validation.job_num.required'),
            'type.required'                    => trans('validation.type.required'),
            'date.required'                    => trans('validation.date.required'),
            'amount.required'                  => trans('validation.amount.required'),
        ];
    }
}
