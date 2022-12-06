<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\NotificationCategory;
use  App\Models\Employee;
use  App\Models\Supplier;
use  App\Models\Branch;

class NotificationItem extends Model
{
    use HasFactory;
    protected $table = "notification_items";
    protected $fillable =[

        'category_id',
        'employee_id',
        'supplier_id',
        'branch_id',
        'date',
        'time',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
    
    public function NotificationCategory()
    {
        return $this->belongsTo('App\Models\NotificationCategory','category_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'supplier_id');
    }
}
