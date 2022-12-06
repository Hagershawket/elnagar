<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'checkin_time'           => 'required',
            'checkout_time'          => 'required',
            'articles'               => 'required',
            'whatsApp'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'checkin_time.required'           => trans('validation.checkin_time.required'),
            'checkout_time.required'          => trans('validation.checkout_time.required'),
            'articles.required'               => trans('validation.articles.required'),
            'whatsApp.required'               => trans('validation.whatsApp.required'),
        ];
    }
}
