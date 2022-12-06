<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\Unit;
use App\Models\Returns;
use App\Models\ProductReturn;
use App\Models\ProductWarehouse;
use Alert;
use Auth;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = Returns::active()->get();
        $purchases = Purchase::active()->get();
        return view('admin.returns.index',compact('returns','purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $return = Returns::create([
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
        return redirect()->route('returns.index');
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

    public function selectInvoice(Request $request)
    {
        $purchase_id = $request->invoice_no;
        $purchase = Purchase::find($request->invoice_no);
        $items    = ProductPurchase::where('purchase_id',$request->invoice_no)->get();
        $products = Product::active()->get();
        return view('admin.returns.add',compact('purchase', 'items','products','purchase_id'));
    }

    public function edit($id)
    {
        $purchase_id = $id;
        $purchase = Purchase::find($id);
        $items = ProductPurchase::where('purchase_id',$id)->get();
        $products = Product::active()->get();
        return view('admin.returns.add',compact('purchase', 'items','products','purchase_id'));
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
