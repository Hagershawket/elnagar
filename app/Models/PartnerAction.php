<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerAction extends Model
{
    use HasFactory;
    protected $table = "partner_actions";
    protected $fillable =[

        'partner_id',
        'date',
        'amount_plus',
        'amount_minus',
        'image',
        'created_at', 
        'updated_at',
    ];

}
