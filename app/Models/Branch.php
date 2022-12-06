<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\NotificationItem;

class Branch extends Model
{
    use HasFactory;
    protected $table = "branches";
    protected $fillable =[

        'country_id',
        'asset_id',
        'name',
        'phone',
        'address',
        'longitude',
        'latitude',
        'cost',
        'rent',
        'is_active',
        'created_at', 
        'updated_at',
    ];
    

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public function document(){

        return $this->hasOne(Document::class,'branch_id');
    }

    public function NotificationItem()
    {
        return $this->hasMany(NotificationItem::class,);
    }

    public function partner()
    {
        return $this->hasOne(Partner::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    
}
