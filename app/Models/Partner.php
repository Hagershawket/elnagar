<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table = "partners";
    protected $fillable =[
        'name',
        'national_num',
        'address',
        'phone',
        'date',
        'rate',
        'amount',
        'created_at', 
        'updated_at',
    ];
        

    
}
