<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable =[

        'name',
        'code',
        'unit_id',
        'warehouse_id',
        'alert_quantity',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function unit(){

        return $this->belongsTo('App\Models\Unit');
    }
    
    public function warehouse(){

        return $this->belongsTo('App\Models\Warehouse');
    }
}
