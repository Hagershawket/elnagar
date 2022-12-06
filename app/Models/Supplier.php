<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\NotificationItem;

class Supplier extends Model
{
    use HasFactory;
    protected $table = "suppliers";
    protected $fillable =[

        'reference_no',
        'name',
        'phone',
        'alternate_phone',
        'address',
        'desc',
        'image',
        'start_deal',
        'due_amount',
        'standard',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function NotificationItem()
    {
        return $this->hasMany(NotificationItem::class);
    }

    public function accounts()
    {
        return $this->hasMany(SupplierAccount::class, 'supplier_id','id');
    }
    
}
