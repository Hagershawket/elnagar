<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchaseWarehouse;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\Unit;
use App\Models\ReturnWarehouse;
use App\Models\ProductReturn;
use App\Models\ProductWarehouse;
use App\Models\ProductPurchaseWarehouse;
use Alert;
use Auth;

class ReturnWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = ReturnWarehouse::active()->get();
        $purchases = PurchaseWarehouse::active()->get();
        return view('admin.return_warehouse.index',compact('returns','purchases'));
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
    public function store(Request $request)
    {
        $products = $request->product_id;
        $return = ReturnWarehouse::create([
            'purchase_id'           => $request->purchase_id,
            'supplier_id'           => $request->supplier_id,
            'qty'                   => count($products),
            'grand_total'           => $request->grand_total,
            'date'                  => $request->date,
            'notes'                 => $request->notes,
            'user_id'               => 1,
            'is_active'             => 1,
        ]);
        for ($i=0; $i<count($products); $i++)
        {
            $items = ProductReturn::create([
                'return_id'             => $return->id,
                'product_id'            => $request->product_id[$i],
                'unit_id'               => $request->unit_id[$i],
                'weight'                => $request->weight[$i],
                'qty'                   => $request->qty[$i],
                'unit_cost'             => $request->unit_cost[$i],
                'total'                 => $request->total[$i],
                'is_active'             => 1,
            ]);

            $products_warehouse = ProductWarehouse::where([
                ['product_id', $request->product_id[$i] ]
            ])->first();

            if($products_warehouse)
            {
                $products_warehouse->qty = $products_warehouse->qty - $request->qty[$i];
                $products_warehouse->weight = $products_warehouse->weight - $request->weight[$i];
                $products_warehouse->save();
            } 
        }
        $supplier = Supplier::where('id', $request->supplier_id)->first();
        $supplier->update([
            'due_amount'    => $supplier->due_amount - $request->grand_total,
        ]);

        Alert::success(' تم اضافة مرتجع بنجاح ');
        return redirect()->route('return-warehouse.index');
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

    public function selectPurchaseWarehouse(Request $request)
    {
        $purchase_id = $request->invoice_no;
        $purchase = PurchaseWarehouse::find($request->invoice_no);
        $items    = ProductPurchaseWarehouse::where('purchase_id',$request->invoice_no)->get();
        $products = Product::active()->get();
        return view('admin.return_warehouse.add',compact('purchase', 'items','products','purchase_id'));
    }

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
    public function update(Request $request, $id)
    {
        //
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
}
