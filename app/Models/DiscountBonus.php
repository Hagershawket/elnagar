<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountBonus extends Model
{
    use HasFactory;
    protected $table = "discount_bonuses";
    protected $fillable =[

        'employee_id',
        'date',
        'amount',
        'notes',
        'type',
        'is_active',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
}
