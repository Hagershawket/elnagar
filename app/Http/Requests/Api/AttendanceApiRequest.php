<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\GeneralTrait;
use Illuminate\Validation\ValidationException;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class AttendanceApiRequest extends FormRequest
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
         $empolyee=Employee::where('user_id', auth()->guard('api')->user()->id)->first();
        if(!($empolyee->type == 2 || $empolyee->type == 4 ))
        
        {
            return [
            'branch_id'                 => 'required',
        ];
        }
         return [
           
        ];
    }
      public function failedValidation( $validator)
    {
        $response= $this->returnData('validation error',$validator->errors());
       
        throw (new ValidationException($validator, $response))->status(400);
    }

    public function messages()
    {
        return [
            
            'branch_id.required'                  => trans('validation.branch_id.required'),
        ];
    }
}
