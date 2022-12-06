<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name'                         => 'required',
            'job_num'                      => 'required|unique:employees,job_num,'. $this->id,
            'type'                         => 'required',
            'working_days'                 => 'required',
            'work_hours'                   => 'required',
            'password'                     =>  !$this->id ? 'required' : '',
            'image'                        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date'                   => !$this->id ?'required_with:file,end_date' : '',
            'end_date'                     => !$this->id ?'required_with:file,start_date' : '',
            'file'                         => !$this->id ?'required_with:start_date,end_date' : '',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                             => trans('validation.employee_name.required'),
            'job_num.required'                          => trans('validation.employee_job_num.required'),
            'job_num.unique'                            => trans('validation.employee_job_num.unique'),
            'type.required'                             => trans('validation.employee_type.required'),
            'working_days.required'                     => trans('validation.employee_working_days.required'),
            'work_hours.required'                       => trans('validation.employee_work_hours.required'),
            'password.required'                         => trans('validation.employee_password.required'),
            'password.unique'                           => trans('validation.employee_password.unique'),
            'image.image'                               => trans('validation.employee_image.image'),
            'image.mimes'                               => trans('validation.employee_image.mimes'),
            'image.max'                                 => trans('validation.employee_image.max'), 
            'start_date.required_with'                  => trans('validation.employee_start_date.required_with'), 
            'end_date.required_with'                    => trans('validation.employee_end_date.required_with'), 
            'file.required_with'                        => trans('validation.employee_file.required_with'), 
        ];
    }
}
