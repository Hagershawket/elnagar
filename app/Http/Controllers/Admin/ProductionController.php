<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Production;
use App\Models\ProductPurchase;
use App\Models\PurchaseWarehouse;
use App\Models\ProductWarehouse;
use App\Models\ProductPurchaseWarehouse;
use App\Http\Requests\WarehouseRequest;
use Alert;
use Auth;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouse_items = ProductWarehouse::where('warehouse_id',4)->whereNotIn('qty',[0])->get();
        $products = Product::active()->get();
        $warehouses = Warehouse::where('id', 4)->orWhere('id', 5)->active()->get();
        $productions = Production::latest()->get();
        return view('admin.productions.add',compact('warehouse_items', 'products', 'warehouses', 'productions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $production = Production::create([
                'warehouse_product_id'     => $request->warehouse_product_id,
                'warehouse_product_qty'    => $request->warehouse_product_qty,
                'warehouse_product_weight' => $request->warehouse_product_weight,
                'product_id'               => $request->product_id,
                'qty'                      => $request->qty,
                'qty_damaged'              => $request->qty_damaged ?? 0,
                'weight'                   => $request->weight,
                'weight_damaged'           => $request->weight_damaged ?? 0,
                'date'                     => $request->date,
            ]);

            // Decrease the quantity and weight from the origin product in warehouse with damage
            $product_before_Production = ProductWarehouse::where([
                ['warehouse_id', 4 ],
                ['product_id', $request->warehouse_product_id]
            ])->first();

            if($product_before_Production)
            {
                $product_before_Production->qty    = $product_before_Production->qty - ($request->qty + $request->qty_damaged);
                $product_before_Production->weight = $product_before_Production->weight - ($request->weight + $request->weight_damaged);
                $product_before_Production->save();
            } 

            // Increase the quantity and weight on the extract product in warehouse without damage
            $product_after_Production = ProductWarehouse::where([
                ['warehouse_id', $request->warehouse_id ],
                ['product_id', $request->product_id]
            ])->first();

            if($product_after_Production)
            {
                $product_after_Production->qty    = $product_after_Production->qty + $request->qty;
                $product_after_Production->weight = $product_after_Production->weight + $request->weight;
                $product_after_Production->save();
            } 
            else 
            {
                ProductWarehouse::create([
                    'warehouse_id'          => $request->warehouse_id,
                    'product_id'            => $request->product_id,
                    'qty'                   => $request->qty,
                    'weight'                => $request->weight,
                ]);
            }
            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->back();
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->back();
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
        $purchase = Purchase::find($id);
        $products = ProductPurchase::where('purchase_id',$id)->get();
        $productions = Production::where('purchase_id', $id)->get();
        return view('admin.productions.show', compact('purchase', 'products','productions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function selectPurchase(Request $request)
    {
        $purchase = Purchase::find($request->purchase_id);
        $items    = ProductPurchase::where('purchase_id',$request->purchase_id)->get();
        $products = Product::active()->get();
        $productions = Production::where('purchase_id',$request->purchase_id)->get();
        return view('admin.productions.add',compact('purchase', 'items', 'products', 'productions'));
    }


    public function edit()
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
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $production = Production::where('id' , $id)->first();
            if($production){
                $production->delete();
            }
        return redirect()->back();
    }

    public function purchase_products(Request $request)
    {
       // $item = ProductPurchase::where(['purchase_id' => $request->purchase_id, 'product_id' => $request->item])->first();
        //$production = Production::where(['purchase_id'=> $request->purchase_id, 'purchase_product_id' => $request->item])->orderby('created_at', 'desc')->first();
         $item = ProductWarehouse::where(['product_id' => $request->item])->first();
        // if($production)
        // {
        //     return response()->json([
        //         'status'       => true,
        //         'msg'          => 'Successfully Added',
        //         'weight'       => $production->remain,
        //     ]);
        // }
        // else
        // {
            return response()->json([
                'status'       => true,
                'msg'          => 'Successfully Added',
                'weight'       => $item->weight,
                'qty'          => $item->qty,
            ]);
        //}
    }
}
