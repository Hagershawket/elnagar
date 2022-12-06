<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $table = "productions";
    protected $fillable =[

        'warehouse_product_id',
        'warehouse_product_qty',
        'warehouse_product_weight',
        'product_id',
        'qty',
        'qty_damaged',
        'weight',
        'weight_damaged',
        'date',
        'created_at', 
        'updated_at',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function warehouse_product()
    {
        return $this->belongsTo(Product::class, 'warehouse_product_id');
    }

}
