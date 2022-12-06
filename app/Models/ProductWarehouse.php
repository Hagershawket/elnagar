<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWarehouse extends Model
{
    use HasFactory;
    protected $table = "product_warehouse";
    protected $fillable =[

        'warehouse_id',
        'product_id',
        'qty',
        'weight',
        'unit_cost',
        'total',
        'created_at', 
        'updated_at',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function production()
    {
        return $this->belongsTo(Production::class, 'production_id');
    }
}
