<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\ProductPurchase;
use App\Models\ProductWarehouse;
use App\Models\WarehouseAction;
use App\Models\Unit;
use Alert;
use Auth;
use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::active()->get();
        return view('admin.purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers   = Supplier::active()->get();
        $products    = Product::active()->where('warehouse_id', 4)->orWhere('warehouse_id', 5)->get();
        $units       = Unit::active()->get();
        $warehouses  = Warehouse::active()->where('id', 4)->orWhere('id', 5)->get();
        return view('admin.purchases.add',compact('suppliers','products','units', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequest $request)
    {
        try
        {
            $products = $request->product_id;
            $image='';
            if ($request->has('image')) {
                $image = uploadImage('purchases', $request->image);
            } 
            $purchase = Purchase::create([
                'warehouse_id'          => $request->warehouse_id,
                'supplier_invoice_no'   => $request->supplier_invoice_no,
                'total_cash'            => $request->total_cash,
                'total_delay'           => $request->total_delay,
                'supplier_id'           => $request->supplier_id,
                'qty'                   => count($products),
                'grand_total'           => $request->grand_total,
                'date'                  => $request->date,
                'image'                 => $image,
                'notes'                 => $request->notes,
                'user_id'               => Auth::user()->id,
                'is_active'             => 1,
            ]);
            for ($i=0; $i<count($products); $i++)
            {
                $items = ProductPurchase::create([
                    'purchase_id'           => $purchase->id,
                    'product_id'            => $request->product_id[$i],
                    'unit_id'               => $request->unit_id[$i],
                    'qty'                   => $request->qty[$i],
                    'free_qty'              => $request->free_qty[$i],
                    'weight'                => $request->weight[$i],
                    'unit_cost'             => $request->unit_cost[$i],
                    'total'                 => $request->total[$i],
                    'is_active'             => 1,
                ]);

                //store Warehouse Actions
                WarehouseAction::create([
                    'type'                  => 'شراء',
                    'product_id'            => $request->product_id[$i],
                    'qty'                   => $request->qty[$i],
                    'weight'                => $request->weight[$i],
                    'unit_cost'             => $request->unit_cost[$i],
                    'total'                 => $request->total[$i],
                ]);

                //store in Warhouse
                $products_warehouse = ProductWarehouse::where([
                    ['warehouse_id', $request->warehouse_id],
                    ['product_id', $request->product_id[$i]]
                ])->first();

                if($products_warehouse)
                {
                    $products_warehouse->qty = $products_warehouse->qty + $request->qty[$i];
                    $products_warehouse->weight = $products_warehouse->weight + $request->weight[$i];
                    $products_warehouse->unit_cost = $request->unit_cost[$i];
                    $products_warehouse->total = $products_warehouse->total + $request->total[$i];
                    $products_warehouse->save();
                } 
                else 
                {
                    ProductWarehouse::create([
                        'warehouse_id'          => $request->warehouse_id,
                        'product_id'            => $request->product_id[$i],
                        'qty'                   => $request->qty[$i],
                        'weight'                => $request->weight[$i],
                        'unit_cost'             => $request->unit_cost[$i],
                        'total'                 => $request->total[$i],
                    ]);
                }
            }

            
            $supplier = Supplier::where('id', $request->supplier_id)->first();
            $supplier->update([
                'due_amount'    => $supplier->due_amount + $request->grand_total,
            ]);

            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('purchases.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('purchases.index');
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

    public function purchaseData(Request $request)
    {
        $purchase = Purchase::where('id',$request->purchase_id)->first();
        $data['id']                       = $purchase->id;
        $data['date']                     = $purchase->date;
        $data['total_cash']               = $purchase->total_cash;
        $data['total_delay']              = $purchase->total_delay;
        $data['supplier_invoice_no']      = $purchase->supplier_invoice_no ?? '';
        $data['supplier']  = $purchase->supplier->name;
        $phone = explode(',',$purchase->supplier->phone);
        $data['phone']  = $phone[0];
        $data['address']       = $purchase->supplier->address ?? '';
        $data['reference_no']  = $purchase->supplier->reference_no ?? '';
        $data['notes']         = $purchase->notes ?? '';
        $data['user']          = $purchase->user->name;
        $data['grand_total']   = $purchase->grand_total;
        return $data;
    }

    public function productPurchaseData($id)
    {
        
        $purchase_data = Purchase::where('id', $id)->first();
        $lims_product_purchase_data = ProductPurchase::where('purchase_id', $id)->get();
        foreach ($lims_product_purchase_data as $key => $product_purchase_data) {
            $product = Product::find($product_purchase_data->product_id);
            $unit = Unit::find($product_purchase_data->unit_id);

            $product_purchase[0][$key] = $product->name;
            $product_purchase[1][$key] = $unit->unit_name;
            $product_purchase[2][$key] = $product_purchase_data->qty;
            $product_purchase[3][$key] = $product_purchase_data->free_qty ?? 'لا يوجد';
            $product_purchase[4][$key] = $product_purchase_data->weight;
            $product_purchase[5][$key] = $product_purchase_data->unit_cost;
            $product_purchase[6][$key] = $product_purchase_data->total;
            $product_purchase[7][$key] = $purchase_data->grand_total;
        }
        return $product_purchase;
    }
}