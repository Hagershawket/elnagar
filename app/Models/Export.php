<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;
    protected $table = "exports";
    protected $fillable =[

        'branch_id',
        'total_boxes',
        'delivery_employee',
        'export_date',
        'received_employee',
        'received_date',
        'user_id',
        'export_notes',
        'receipt_notes',
        'created_at', 
        'updated_at',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function d_employee()
    {
        return $this->belongsTo(Employee::class, 'delivery_employee');
    }

    public function r_employee()
    {
        return $this->belongsTo(Employee::class, 'received_employee');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
