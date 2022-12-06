<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseAction extends Model
{
    use HasFactory;
    protected $table = "warehouse_actions";
    protected $fillable =[

        'type',
        'date',
        'product_id',
        'unit_id',
        'qty',
        'weight',
        'unit_cost',
        'user_id',
        'image',
        'created_at', 
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
