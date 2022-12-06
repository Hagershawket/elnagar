<?php

namespace App\Models;
use App\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable =[

        'code',
        'employee_id',
        'supplier_id',
        'customer_id',
        'offer_id',
        'delivery_agent',
        'delivery_cost',
        'type',
        'status',
        'date',
        'table_num',
        'address',
        'phone',
        'service',
        'sub_total',
        'discount',
        'total_price',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
}
