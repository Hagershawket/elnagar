<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_Expenses extends Model
{
    use HasFactory;

    protected $table = "main_expenses";
    protected $fillable =[

        'name',
        'created_at', 
        'updated_at',
    ];

    public function sub(){
        return $this->hasMany(Sub_Expenses::class,'main_id');
    }

    
  
}
