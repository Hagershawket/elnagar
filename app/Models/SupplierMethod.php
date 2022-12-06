<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierMethod extends Model
{
    use HasFactory;
    protected $table = "supplier_accounts";
    protected $fillable =[

        'supplier_id',
        'payment_method_id',
        'account_num',
        'ibn',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
