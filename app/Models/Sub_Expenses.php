<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Expenses extends Model
{
    use HasFactory;

    protected $table = "sub_expenses";
    protected $fillable =[

        'name',
        'main_id',
        'created_at', 
        'updated_at',
    ];

    public function main(){
        return $this->belongsTo(Main_Expenses::class);
    }
}
