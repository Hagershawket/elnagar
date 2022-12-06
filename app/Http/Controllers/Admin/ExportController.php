<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Export;
use App\Models\ExportBoxes;
use App\Models\Warehouse;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\ProductWarehouse;
use Alert;
use Auth;

class ExportController extends Controller
{
    public function index()
    {
        $exports = Export::get();
        return view('admin.exports.index',compact('exports'));
    }

    public function create()
    {
        $warehouses = Warehouse::active()->get();
        $branches = Branch::active()->get();
        $employees = Employee::active()->get();
        return view('admin.exports.add',compact('warehouses','branches','employees'));
    }

    public function show($id)
    {
        $export = Export::where('id',$id)->first();
        $boxes = ExportBoxes::where('export_id',$id)->get();
        return view('admin.exports.show',compact('export', 'boxes'));
    }

    public function store(Request $request)
    {
        try
        {
            // if($flag = 0)
             //{
                $barcode = rand(106890122 , 100000000);
                // $barcode = DNS1D::getBarcodeHTML($code, 'C128', 2.5, 50);
                $products = $request->product_id;
                $export = Export::create([
                    'branch_id'             => $request->branch_id,
                    'total_boxes'           => count($products),
                    'delivery_employee'     => $request->delivery_employee,
                    'export_date'           => $request->export_date,
                    'export_notes'          => $request->export_notes,
                    'user_id'               => Auth::user()->id,
                ]);
                for ($i=0; $i<count($products); $i++)
                {
                    $items = ExportBoxes::create([
                        'export_id'             => $export->id,
                        'warehouse_id'          => $request->warehouse_id[$i],
                        'product_id'            => $request->product_id[$i],
                        'barcode'               => $barcode,
                        'box_id'                => $request->box_id[$i],
                        'qty'                   => $request->qty[$i],
                        'weight'                => $request->weight[$i],
                        'count'                 => $request->qty[$i],
                        'status'                => 0,
                    ]);
                }

                Alert::success(' تم الاضافة بنجاح ');
                return redirect()->route('exports.index');
            //}
        }
        catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('exports.index');
        }
    }

    public function warehouse_products(Request $request)
    {
        $data   = [];
        $warehouse_products = ProductWarehouse::where(['warehouse_id'=> $request->warehouse_id])->get();

        if( $warehouse_products->isEmpty())
        {
                $data[] = '<option >لا توجد بيانات</option>';
                return response()->json([
                    'status'       => true,
                    'msg'          => 'Successfully Added',
                    'data'         => $data,
                ]);
        }
        foreach($warehouse_products as $warehouse_product)
        {
            $data[] = '<option  value="'.$warehouse_product->product->id.'">' . $warehouse_product->product->name . '</option>';
        }
        return response()->json([
            'status'       => true,
            'msg'          => 'Successfully Added',
            'data'         => $data,
        ]);
    }
}
