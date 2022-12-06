<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseItem extends Model
{
    use HasFactory;

    protected $table = "expense_items";
    protected $fillable =[
        'expense_id',
        'name',
        'unit_id',
        'qty',
        'unit_cost',
        'total',
        'is_active',
    ];
}
