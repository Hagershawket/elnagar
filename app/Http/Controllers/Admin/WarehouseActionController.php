<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WarehouseAction;

class WarehouseActionController extends Controller
{
    public function card($id)
    {
        $actions = WarehouseAction::where('product_id',$id)->get();
        return view('admin.warehouses.card',compact('actions'));
    }
}
