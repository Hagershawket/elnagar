<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\NotificationItem;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    protected $fillable =[

        'branch_id',
        'name',
        'type',
        'job_num',
        'job_title',
        'user_id',
        'insurance_num',
        'password',
        'phone',
        'address',
        'image',
        'payroll',
        'hiring_date',
        'start_work_date',
        'national_num',
        'country_id',
        'off_day',
        'working_days',
        'work_hours',
        'attendance_status',
        'status',
        'is_active',
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function NotificationItem()
    {
        return $this->hasMany(NotificationItem::class,);
    }
}
