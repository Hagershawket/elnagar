<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = "warehouses";
    protected $fillable =[

        'name',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productsWarehouse()
    {
        return $this->hasMany(ProductWarehouse::class);
    }
}
