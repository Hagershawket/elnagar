<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Warehouse;
use App\Http\Requests\ProductRequest;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::active()->get();
        $units = Unit::active()->get();
        $Products   = Product::active()->get();
        return view('admin.settings.products.index',compact('Products','warehouses','units'));
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
    public function store(ProductRequest $request)
    {
    
         try {
            Product::create([
                'name'           => $request->name,
                'code'           => $request->code,
                'unit_id'        => $request->unit_id,
                'warehouse_id'   => $request->warehouse_id,
                'alert_quantity' => $request->alert_quantity,
                'is_active'      => 1,
    
             ]);
    
             Alert::success(' تم الاضافة بنجاح ');
             return redirect()->route('products.index');
            } catch(\Exception $ex){
                Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
                return redirect()->route('products.index');
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
    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::where('id',$id)->first();
            $product->update([
                'name'         => $request->name,
                'code'         => $request->code,
                'unit_id'      => $request->unit_id,
                'warehouse_id' => $request->warehouse_id, 
                'alert_quantity' => $request->alert_quantity,

            ]);

            Alert::success(' تم التعديل بنجاح ');
            return redirect()->route('products.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('products.index');
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
        try {
            $product = Product::find($id);
            $product->update([
                'is_active'  => false,
            ]);
            Alert::success(' تم الحذف بنجاح ');
            return redirect()->route('products.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('products.index');
        }
    }

    public function getProductUnit(Request $request)
    {
        $product = Product::where('id',$request->id)->first();
        return response()->json([
            'status'       => true,
            'msg'          => 'Successfully Added',
            'unit'         => $product->unit->unit_name,
        ]);

    }
}
