<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'main_id'               => 'required',
            'sub_id'                => 'required',
            'date'                  => 'required',
            'grand_total'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'main_id.required'            => trans('validation.expense_main_id.required'),
            'sub_id.required'             => trans('validation.expense_sub_id.required'),
            'date.required'               => trans('validation.expense_date.required'),
            'grand_total.required'        => trans('validation.expense_grand_total.required'),
        ];
    }
}
