<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Supplier;
use App\Models\Country;
use App\Models\PaymentMethod;
use App\Models\SupplierMethod;
use App\Models\Account;
use Alert;
use Excel;
use App\Imports\SupplierImport;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::get();
        $countries = Country::active()->get();
        $methods   = PaymentMethod::active()->get();
        return view('admin.suppliers.index',compact('suppliers','countries','methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $methods   = PaymentMethod::active()->get();
        return view('admin.suppliers.add',compact('methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        try {
            $image = '';
            if ($request->has('image')) {
                $image = uploadImage('suppliers', $request->image);
            }       
            $supplier = Supplier::create([
                'name'            => $request->name,
                'reference_no'    => $request->reference_no,
                'phone'           => $request->phone,
                'alternate_phone' => $request->alternate_phone,
                'address'         => $request->address,
                'desc'            => $request->desc,
                'image'           => $image,
                'start_deal'      => $request->start_deal,
                'due_amount'      => $request->due_amount ?? 0,
                'standard'        => $request->standard ?? 0,
                'is_active'       => 1,
            ]);

            $payment_methods = $request->payment_method_id;
            if($request->has('payment_method_id'))
            {
                for ($i=0; $i<count($payment_methods); $i++)
                {
                    SupplierMethod::create([
                        'supplier_id'       =>  $supplier->id,
                        'payment_method_id' =>  $request->payment_method_id[$i],
                        'account_num'       =>  $request->account_num[$i],
                        'is_active'         =>  1,
                    ]);
                }
            }

            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('suppliers.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('suppliers.index');
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
        $supplier           = Supplier::where('id',$id)->first();
        $supplier_methods   = SupplierMethod::active()->where('supplier_id',$id)->get();
        $methods            = PaymentMethod::active()->get();
        return view('admin.suppliers.edit',compact('supplier', 'supplier_methods', 'methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        try {
            $supplier = Supplier::find($id);
            if ($request->has('image')) {
                $image = uploadImage('suppliers', $request->image);
                $supplier->update([
                    'image' => $image,
                ]);
            }       
            $supplier->update([
                'name'            => $request->name,
                'reference_no'    => $request->reference_no,
                'phone'           => $request->phone,
                'alternate_phone' => $request->alternate_phone,
                'address'         => $request->address,
                'start_deal'      => $request->start_deal,
                'due_amount'      => $request->due_amount,
                'standard'        => $request->standard,
                'is_active'       => 1,
            ]);
            
            // $accounts = $request->group_aaa_edit;
            // return $accounts;
            // $accounts = SupplierAccount::where('supplier_id',$id)->get();
            // $accounts->update([
            //     'supplier_id'       =>  $supplier->id,
            //     'payment_method_id' =>  $account['payment_method_id'],
            //     'account_num'       =>  $account['account_num'],
            //     'is_active'         =>  1,
            // ]);

            Alert::success(' تم التعديل بنجاح ');
            return redirect()->route('suppliers.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('suppliers.index');
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
        $supplier = Supplier::findOrFail($id);
        if($supplier)
        {
            $supplier->is_active = false;
            $supplier->save();
            Alert::success('تم حذف المورد بنجاح');
        }
        else
        Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
        return redirect()->route('suppliers.index');
    }

    public function stop($id, $status)
    {
            $supplier = Supplier::where('id' , $id)->first();
            if($supplier)
            {
                $supplier->update([
                    'is_active'    => $status,
                ]);
                if($status == 0)
                    Alert::success('تم ايقاف المورد بنجاح');
                else
                    Alert::success('تم تفعيل المورد بنجاح');
            }
            else
            Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
            return redirect()->route('suppliers.index');
    }

    public function import(Request $request){
        try 
        {
            $data = Excel::import(new SupplierImport ,$request->file);
            Alert::success(' تم رفع الملف بنجاح ');
            return redirect()->route('suppliers.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('suppliers.index');
        }
        
    }
}
