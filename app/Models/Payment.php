<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payments";
    protected $fillable =[

        'supplier_id',
        'user_id',
        'payment_method_id',
        'supplier_account_id',
        'amount',
        'commission',
        'image',
        'date',
        'notes',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id');
    }

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
    
}
