<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseWarehouse extends Model
{
    use HasFactory;
    protected $table = "purchase_warehouse";
    protected $fillable =[

        'warehouse_id',
        'supplier_invoice_no',
        'user_id',
        'supplier_id',
        'qty',
        'sub_total',
        'shipping_cost',
        'export_value',
        'grand_total',
        'total_cash',
        'total_delay',
        'date',
        'image',
        'notes',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
