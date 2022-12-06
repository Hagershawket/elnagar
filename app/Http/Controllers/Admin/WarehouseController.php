<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Warehouse;
use App\Models\ProductWarehouse;
use App\Http\Requests\WarehouseRequest;
use Alert;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::active()->get();
        return view('admin.warehouses.index',compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseRequest $request)
    {
        try {
            Warehouse::create([
                'name'      => $request->name,
                'is_active' => 1,
            ]);
    
            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('warehouses.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('warehouses.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseRequest $request, $id)
    {
        $warehouse = Warehouse::find($id);
        try {
            $warehouse->update([
                'name'      => $request->name,
            ]);
    
            Alert::success(' تم التحديث بنجاح ');
            return redirect()->route('warehouses.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('warehouses.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function selectwarehouse(Request $request)
    {
        $productsWarehouse = ProductWarehouse::where('warehouse_id',$request->warehouse_id)->get();
        $warehouse = Warehouse::where('id',$request->warehouse_id)->first();
        return view('admin.warehouses.reports.summary',compact('productsWarehouse','warehouse'));
    }

    public function warehouseData(Request $request)
    {
        $products = ProductWarehouse::where('warehouse_id',$request->warehouse_id)->get();
        $warehouse = Warehouse::where('id',$request->warehouse_id)->first();
        return view('admin.warehouses.data',compact('products','warehouse'));
    }
}
