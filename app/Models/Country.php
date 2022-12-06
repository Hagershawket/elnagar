<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = "countries";
    protected $fillable =[

        'name',
        'image',
        'currency_id',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }
    
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function branches(){

        return $this->hasMany('App\Models\Branch');
    }
}
