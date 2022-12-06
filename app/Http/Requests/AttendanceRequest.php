<?php

namespace App\Http\Requests;
use App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'employee_id'               => 'required',
            'job_num'                   => 'required',
            'date'                      => 'required|date',
            'checkin'                   => 'required|date_format:H:i',
            'checkout'                  => 'required|date_format:H:i|after:checkin',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required'                => trans('validation.employee_id.required'),
            'job_num.required'                    => trans('validation.job_num.required'),
            'date.required'                       => trans('validation.date.required'),
            'date.date'                           => trans('validation.date.date'),
            'checkin.required'                    => trans('validation.checkin.required'),
            'checkout.required'                   => trans('validation.checkout.required'),
            'checkout.after'                      => trans('validation.checkout.after'),
        ];
    }
}
