<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\NotificationItem;

class NotificationCategory extends Model
{
    use HasFactory;
    protected $table = "notification_categories";
    protected $fillable =[

        'name',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function NotificationItem()
    {
        return $this->hasMany('App\Models\NotificationItem', 'category_id');
    }
    
}
