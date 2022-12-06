<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallmentRequest extends FormRequest
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
            'reason'               => 'required',
            'months_num'           => 'required',
            'monthly_amount'       => 'required',
            'start_date'           => 'required',
            'end_date'             => 'required',
            'total_amount'         => 'required',
            'link_id'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'reason.required'                  => trans('validation.installment_reason.required'),
            'months_num.required'              => trans('validation.installment_months_num.required'),
            'monthly_amount.required'          => trans('validation.installment_monthly_amount.required'),
            'start_date.required'              => trans('validation.installment_start_date.required'),
            'end_date.required'                => trans('validation.installment_end_date.required'),
            'total_amount.required'            => trans('validation.installment_total_amount.required'),
            'link_id.required'                 => trans('validation.installment_link_id.required'),
        ];
    }
}
