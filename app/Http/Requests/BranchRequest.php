<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'name'                      => 'required|unique:branches,name,'.$this->id,
            'country'                   => 'required',
            'phone'                     => 'required|unique:branches,phone,'.$this->id,
            'address'                   => 'required',
            'cost'                      => 'required',
            'end_date'                  => $this->start_date ? 'after:start_date' : '',
            'image'                     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                       => trans('validation.branchName.required'),
            'name.unique'                         => trans('validation.branchName.unique'),
            'country.required'                    => trans('validation.country.required'),
            'phone.required'                      => trans('validation.phone.required'),
            'phone.unique'                        => trans('validation.phone.unique'),
            'address.required'                    => trans('validation.address.required'),
            'cost.required'                       => trans('validation.cost.required'),
            'end_date.after'                      => trans('validation.end_date.after'),
            'image.image'                         => trans('validation.document_image.image'),
            'image.mimes'                         => trans('validation.document_image.mimes'),
            'image.max'                           => trans('validation.document_image.max'),        
        ];
    }
}
