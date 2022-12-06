<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Export;
use App\Models\Product;
use App\Models\Employee;
use App\Models\ExportBoxes;
use Alert;

class ReceiptController extends Controller
{
    public function create()
    {
        $employees = Employee::active()->get();
        return view('resturant.receipt.create', compact('employees'));
    }

    public function store(Request $request)
    {
        try
        {
            $export = Export::where('id',$request->export_id)->first();
            $export->update([
                'received_employee'     => $request->received_employee,
                'received_date'         => $request->received_date,
                'receipt_notes'         => $request->receipt_notes,
            ]);
            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('receipt.create');
        }
        catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->back();
        }
    }

    public function deliveryEmployee(request $request)
    {
        $export = Export::where('id',$request->export_id)->first();
        return response()->json(['data' => $export->d_employee->name]);
    }

    public function confirm(Request $request)
    {
            $box = ExportBoxes::where('barcode',$request->barcode)->first();
            if($box->status)
                $box->update(['status'  =>  0]);
            else
                $box->update(['status'  =>  1]);
            return response()->json(['status' => $box->status, 'id' => $box->id]);
    }

    public function boxData($id)
    {                       
        $barcode = explode("(", $id);
        $barcode[0] = rtrim($barcode[0], " ");
        $lims_box_data = ExportBoxes::where('barcode', $barcode[0])->get();
        foreach ($lims_box_data as $key => $box_data) {
            $product = Product::find($box_data->product_id);

            $product_purchase[0][$key] = $box_data->id;
            $product_purchase[1][$key] = $box_data->box_id;
            $product_purchase[2][$key] = $product->name;
            $product_purchase[3][$key] = $box_data->barcode;
            $product_purchase[4][$key] = $box_data->weight;
            $product_purchase[5][$key] = $box_data->qty;
            $product_purchase[6][$key] = $box_data->status ? '<label class="switch"><input type="checkbox" data-attr="'.$box_data->barcode.'" class="confirm" checked><span class="slider round"></span></label><div><strong id="confirm_msg'.$box_data->id.'" style="color: green; display: none;"> تم التأكـــيد </strong></div><div><strong id="unconfirm_msg'.$box_data->id.'" style="color: red; display: none;"> تم الغاء التأكـــيد </strong></div>' :
                                                             '<label class="switch"><input type="checkbox" data-attr="'.$box_data->barcode.'" class="confirm"><span class="slider round"></span></label><div><strong id="confirm_msg'.$box_data->id.'" style="color: green; display: none;"> تم التأكـــيد </strong></div><div><strong id="unconfirm_msg'.$box_data->id.'" style="color: red; display: none;"> تم الغاء التأكـــيد </strong></div>';

        }
        return $product_purchase;
    }

    public function barcodeSearch(Request $request)
    {
        $data = '<ul class="list-unstyled" style="margin-top: 10px; margin-right: 50px;">';
        $boxes = ExportBoxes::where('barcode','LIKE', "%$request->barcode%")->get();
        if($boxes->isEmpty())
        {
            $data .= '<li style="color:red; cursor:pointer;">باركود غير موجود</li>';
        }
        else
        {
            foreach($boxes as $box)
            {
                $data .= '<li style="cursor:pointer;">'.$box->barcode.'  ' .'('.$box->product->name.')'.'</li>';

            }
        }
        $data .= '</ul>';
        return response()->json($data);
    }
}
