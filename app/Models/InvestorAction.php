<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorAction extends Model
{
    use HasFactory;
    protected $table = "investor_actions";
    protected $fillable =[

        'investor_id',
        'date',
        'amount_plus',
        // 'amount_minus',
        'image',
        'created_at', 
        'updated_at',
    ];

    public function account_action(){

        return $this->belongsTo('App\Models\Account_action');
    }
}
