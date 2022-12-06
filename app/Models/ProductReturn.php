<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturn extends Model
{
    use HasFactory;
    protected $table = "product_returns";
    protected $fillable =[

        'return_id',
        'product_id',
        'qty',
        'weight',
        'unit_id',
        'unit_cost',
        'total',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
