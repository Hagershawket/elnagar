<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestorRequest extends FormRequest
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
            'name'                     => 'required|unique:investors,name,'. $this->id,
            'main_amount'              => 'required',
            'investment_amount'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => trans('validation.investor_name.required'),
            'name.unique'                   => trans('validation.investor_name.unique'),
            'main_amount.required'          => trans('validation.investor_main_amount.required'),
            'investment_amount.required'    => trans('validation.investor_investment_amount.required'),
        ];
    }
}
