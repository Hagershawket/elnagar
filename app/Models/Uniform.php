<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\NotificationItem;

class Uniform extends Model
{
    use HasFactory;
    protected $table = "uniforms";
    protected $fillable =[

        'name',
        'quantity',
        'type',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
}
