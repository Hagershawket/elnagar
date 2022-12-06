<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportBoxes extends Model
{
    use HasFactory;
    protected $table = "export_boxes";
    protected $fillable =[

        'export_id',
        'warehouse_id',
        'box_id',
        'product_id',
        'barcode',
        'qty',
        'weight',
        'count',
        'status',
        'created_at', 
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
