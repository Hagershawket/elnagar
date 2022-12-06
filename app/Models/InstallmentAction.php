<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentAction extends Model
{
    use HasFactory;
    protected $table = "installment_actions";
    protected $fillable =[

        'installment_id',
        'date',
        'amount_plus',
        'image',
        'created_at', 
        'updated_at',
    ];
}
