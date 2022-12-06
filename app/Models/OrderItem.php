<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = "order_items";
    protected $fillable =[

        'order_id',
        'product_id',
        'quantity',
        'wieght',
        'netQty',
        'price',
        'total',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
}
