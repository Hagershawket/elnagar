<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $table = "transports";
    protected $fillable =[

        'type',
        'num',
        'chassis_num',
        'description',
        'organization_name',
        'image',
        'start_date',
        'exp_date',
        'created_at', 
        'updated_at',
    ];
}
