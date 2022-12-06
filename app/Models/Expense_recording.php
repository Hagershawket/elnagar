<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense_recording extends Model
{
    use HasFactory;

    protected $table = "expense_record";
    protected $fillable =[
        'main_id',
        'sub_id',
        'date',
        'grand_total',
        'image',
        'notes',
    ];
}
