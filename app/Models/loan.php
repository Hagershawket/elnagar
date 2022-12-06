<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    use HasFactory;

    protected $table  ='loans';

    protected $fillable = [

        'amount',
        'bank',
        'rate',
        'from_date',
        'created_at', 
        'updated_at',
    ];

    public function installment(){

        return $this->hasMany(loan_installment::class,'loan_id');
    }
}
