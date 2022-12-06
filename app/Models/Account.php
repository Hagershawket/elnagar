<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = "accounts";
    protected $fillable =[

        'type',
        'wallet_name',
        'wallet_num',
        'name',
        'bank_name',
        'account_num',
        'ibn',
        'total',
        'is_active',
        'created_at', 
        'updated_at',
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public function Account(){

        return $this->hasMany('App\Models\Account','account_id');
    }
}
