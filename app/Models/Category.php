<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable =[

        'name',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function Product(){

        return $this->hasMany('App\Models\Product','category_id');
    }


}
