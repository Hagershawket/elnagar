<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationItemRequest extends FormRequest
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
            'category_id'             => 'required',
            'date'                    => 'required',
            'time'                    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'   => trans('validation.notification_category_id.required'),
            'date.required'          => trans('validation.notification_date.required'),
            'time.required'          => trans('validation.notification_time.required'),
        ];
    }
}
