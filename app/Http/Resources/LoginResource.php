<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Employee;
use Auth;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id'                  => $this->id,
            'name'                => $this->name,
            'job_num'             => $this->id,
            'image'               => asset(Employee::where('user_id',Auth::guard('api')->user()->id)->first()->image),
            'type'                => Employee::where('user_id',Auth::guard('api')->user()->id)->first()->type,
            'start_work_date'     => Employee::where('user_id',Auth::guard('api')->user()->id)->first()->start_work_date,
            'payroll'             => Employee::where('user_id',Auth::guard('api')->user()->id)->first()->payroll,

        ];

        return $data;


        $branches = [

        'branches'=> Branch::get(),
        'user'=> $user,__('messages.login Successfully'),

        ];

        
    }
}
