<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_action extends Model
{
    use HasFactory;
    protected $table = "account_action";
    protected $fillable =[

        'date',
        'account_id',
        'amount_plus',
        'amount_minus',
        'commission',
        'image',
        'created_at', 
        'updated_at',
    ];

    public function account_action(){

        return $this->belongsTo('App\Models\Account_action');
    }
  
}
