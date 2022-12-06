<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayRequest extends FormRequest
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
            'from_date'             => 'required',
            'to_date'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required'             => trans('validation.employee_id.required'),
            'job_num.required'                 => trans('validation.job_num.required'),
            'from_date.required'               => trans('validation.from_date.required'),
            'to_date.required'                 => trans('validation.to_date.required'),
        ];
    }
}
