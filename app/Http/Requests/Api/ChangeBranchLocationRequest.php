<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\GeneralTrait;
use Illuminate\Validation\ValidationException;

class ChangeBranchLocationRequest extends FormRequest
{
    
    use GeneralTrait;
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
           'branch_id'                 =>'required',
           'longitude'                 => 'required|unique:branches,longitude,'.$this->id,
           'latitude'                  => 'required|unique:branches,latitude,'.$this->id,
        ];
    }
      public function failedValidation( $validator)
    {
        $response= $this->returnData('validation error',$validator->errors());
       
        throw (new ValidationException($validator, $response))->status(400);
    }
    public function messages(){
        
        return[
            'branch_id.required'                  => trans('validation.branch_id.required'),
             'longitude.required'                  => trans('validation.longitude.required'),
            'longitude.unique'                    => trans('validation.longitude.unique'),
            'latitude.required'                   => trans('validation.latitude.required'),
            'latitude.unique'                     => trans('validation.latitude.unique'),
            
            ];
    }

}
