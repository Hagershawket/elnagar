<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    protected $table = "investors";
    protected $fillable = [

        'name',
        'national_num',
        'address',
        'phone',
        'main_amount',
        'investment_amount',
        'rate',
        'date',
        'profit_amount',
        'created_at', 
        'updated_at',

    ];
}
