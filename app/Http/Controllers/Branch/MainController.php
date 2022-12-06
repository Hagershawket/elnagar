<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Main_Expenses;
use App\Models\Sub_Expenses;
use App\Models\Expense_recording;
use App\Traits\GeneralTrait;
use Auth ;
use DB;
use  App\Models\Employee;
use  App\Models\Supplier;
use  App\Models\Product;


class MainController extends Controller
{
    use GeneralTrait;

//************************************** Start selling function *******************************************
    public function selling()
    {
        return view('resturant.selling.index');
    }

    public function delivery()
    {
        $suppliers = Supplier::Active()->get();
        $employees = Employee::Active()->get();
        $products  = Product::Active()->get();
        return view('resturant.selling.delivery',compact('suppliers','employees','products'));
       
    }

    public function takeAway()
    {
        $suppliers = Supplier::Active()->get();
        $employees = Employee::Active()->get();
        $products  = Product::Active()->get();
        return view('resturant.selling.takeAway',compact('suppliers','employees','products'));
       
    }

    public function hall()
    {
        $suppliers = Supplier::Active()->get();
        $employees = Employee::Active()->get();
        $products  = Product::Active()->get();
        return view('resturant.selling.hall',compact('suppliers','employees','products'));
       
    }

    //************************************** End selling function *******************************************

    //************************************** start Order function *******************************************
    public function makeOrdertakaway(Request $request){
        // ordre in takaway
        $order = Order::create([
            'code'                   => $this->generateOrderNumber(),
            'status'                 => 1,
            'type'                   => 0,
            'date'                   => date('Y-m-d'),
            'discount'               => $request->discount,
            'sub_total'              => $request->sub_total,
            'total_price'            => $request->total_price,
            'employee_id'            => $request->employee_id,
            'supplier_id'            => $request->supplier_id,
            'customer_id'            => $request->customer_id,
            'phone'                  => $request->phone,
        ]);
        $product = $request->product_id;
        $quantity = $request->quantity;

        for ($i=0; $i<count($product); $i++){
            $OrderItem =  OrderItem::create([
                'order_id'              => $order->id,
                'product_id'            => $product[$i],
                'quantity'              => $quantity[$i],
                'wieght'                =>$request->wieght[$i],
                'netQty'                =>$request->netQty[$i],
                'price'                 =>$request->price[$i],
                'total'                 =>$request->total[$i],
            ]);   
        }
        $items = OrderItem::where('order_id',$order->id)->get();
        return view('resturant.selling.print',compact('order','OrderItem','items')); 
    }

    public function makeOrderhall(Request $request)
    {
             //order in hall
            $order = Order::create([
                'code'                      => $this->generateOrderNumber(),
                'status'                    => 'pending',
                'type'                      => 1,
                'date'                      => date('Y-m-d'),
                'employee_id'               => $request->employee_id,
                'supplier_id'               => $request->supplier_id,
                'customer_id'               => $request->customer_id,
                'phone'                     => $request->phone,
                'service'                   => $request->service,
                'table_num'                 => $request->table_num,
                'discount'                  => $request->discount,
                'sub_total'                 => $request->sub_total,
                'total_price'               => $request->total_price,
            ]);
            $products = $request->product_id;
            for ($i=0; $i<count($products); $i++)
            {
                $OrderItem =  OrderItem::create([
                    'order_id'              =>$order->id,
                    'product_id'            =>$request->product_id[$i],
                    'quantity'              =>$request->quantity[$i],
                    'wieght'                =>$request->wieght[$i],
                    'netQty'                =>$request->netQty[$i],
                    'price'                 =>$request->price[$i],
                    'total'                 =>$request->total[$i],
                ]); 
            }  
 
            $items = OrderItem::where('order_id',$order->id)->get();
            return view('resturant.selling.print',compact('order','OrderItem','items')); 
     }

    public function makeOrderdelivary(Request $request)
    {
             //order in delivery
            $order = Order::create([
                'code'                      => $this->generateOrderNumber(),
                'status'                    => 'pending',
                'type'                      => 2,
                'date'                      => date('Y-m-d'),
                'employee_id'               => $request->employee_id,
                'supplier_id'               => $request->supplier_id,
                'customer_id'               => $request->customer_id,
                'phone'                     => $request->phone,
                'delivery_agent'            =>$request->delivery_agent,
                'delivery_cost'             =>$request->delivery_cost,
                'discount'                  => $request->discount,
                'sub_total'                 => $request->sub_total,
                'total_price'               => $request->total_price,
            ]);
            $product = $request->product_id;
            $quantity = $request->quantity;
            for ($i=0; $i<count($product); $i++){
                $OrderItem =  OrderItem::create([
                    'order_id'              => $order->id,
                    'product_id'            => $product[$i],
                    'quantity'              => $quantity[$i],
                    'wieght'                =>$request->wieght[$i],
                    'netQty'                =>$request->netQty[$i],
                    'price'                 =>$request->price[$i],
                    'total'                 =>$request->total[$i],
                ]); 
            }  

          
            $items = OrderItem::where('order_id',$order->id)->get();
            return view('resturant.selling.print',compact('order','OrderItem','items')); 
     }

       
     //************************************** End order function *******************************************
    
    public function subcats(Request $request)
    {
        $data   = [];
        $subcats = Sub_Expenses::where([
            ['main_id',$request->cat]
        ])->get();
        
        foreach( $subcats as  $stat){
            if( $stat->main_id != $request->cat){
                return response()->json('<option >لاتوجد بيانات</option>') ;
            }
            $data[] = '<option  value="'.$stat->id.'">'. $stat->name .'</option>';
        }
        return response()->json(["data" => $data]) ;
    }

    public function printInvoice($id){
        $orders = Order::find($id);
        return view('resturant.selling.print',compact('orders'));
    }

    public function getprice($id){
        $orders = DB::table('products')->where('id',$id)->pluck("price","id");
      return $orders;
    }

    

} 

