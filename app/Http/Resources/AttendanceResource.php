<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'id'                => $this->id,
            'employee_id'       => $this->employee_id,
            'branch_id'         => $this->branch_id,
            'lat'               => $this->lat,
            'lang'              => $this->lang,
            'date'              => $this->date,
            'checkin'           => $this->checkin,
            'status'            => $this->status,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,

        ];

        return $data;
    }
}
