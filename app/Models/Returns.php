<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    use HasFactory;
    protected $table = "returns";
    protected $fillable =[

        'purchase_id',
        'supplier_id',
        'user_id',
        'qty',
        'grand_total',
        'date',
        'notes',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }
    
    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
