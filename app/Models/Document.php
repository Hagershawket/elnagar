<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = "documents";
    protected $fillable =[

        'file',
        'start_date',
        'end_date',
        'branch_id',
        'employee_id',
        'type',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
    
}
