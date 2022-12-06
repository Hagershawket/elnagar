<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $table = "installments";
    protected $fillable =[

        'link_id',
        'reason',
        'months_num',
        'monthly_amount',
        'start_date',
        'end_date',
        'total_amount',
        'total_paid',
        'notes',
        'created_at', 
        'updated_at',
    ];

    public function link()
    {
        return $this->belongsTo(Link::class, 'link_id');
    }
}
