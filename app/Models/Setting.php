<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\NotificationItem;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    protected $fillable =[

        'system_logo',
        'checkin_time',
        'checkout_time',
        'discount_value',
        'articles',
        'whatsApp',
        'created_at', 
        'updated_at',
    ];

    public function NotificationItem()
    {
        return $this->hasMany(NotificationItem::class,);
    }
}
