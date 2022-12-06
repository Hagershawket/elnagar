<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = "purchases";
    protected $fillable =[

        'warehouse_id',
        'supplier_invoice_no',
        'user_id',
        'supplier_id',
        'qty',
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
