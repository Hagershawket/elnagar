<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\NotificationItem;

class Attendance extends Model
{
    use HasFactory;
    protected $table = "attendances";
    protected $fillable =[
        'employee_id',
        'branch_id',
        'date',
        'checkin',
        'late_time',
        'checkout',
        'over_time',
        'status',
        'note',
        'lat'   ,
        'lang' ,
        'created_at', 
        'updated_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
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
