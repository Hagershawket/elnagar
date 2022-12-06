<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan_installment extends Model
{
    use HasFactory;

    protected $table  ='loan_installments';

    protected $fillable = [

        'amount',
        'date',
        'loan_id',
        'image',
        'created_at', 
        'updated_at',
    ];

    public function loan(){

        return $this->belongsTo(loan::class,'loan_id');
    }
}
