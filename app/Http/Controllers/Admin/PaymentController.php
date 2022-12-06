<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Supplier;
use App\Models\PaymentMethod;
use App\Models\SupplierAccount;
use App\Http\Requests\PaymentRequest;
use Alert;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentsSuppliers = Payment::active()->get();
        return view('admin.payments.index',compact('paymentsSuppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::active()->get();
        $paymentMethods = PaymentMethod::active()->get();
        return view('admin.payments.add',compact(['suppliers','paymentMethods']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        if ($request->hasFile('image')){
            $fileNameToStore = uploadImage('payments',$request->image);
        }else {
            $fileNameToStore = 'images/zummXD2dvAtI.png';
        }
        $payment = new Payment;
        $payment->supplier_id                   = $request->supplier_id;
        $payment->user_id                       = 1;
        $payment->payment_method_id             = $request->paymentMethod;
        $payment->supplier_account_id           = $request->supplierAccount;
        $payment->amount                        = $request->amount;
        $payment->commission                    = $request->commission;
        $payment->image                         = $fileNameToStore;
        $payment->date                          = $request->date;
        $payment->notes                         = $request->notes;
        $payment->save();

        $supplier = Supplier::where('id', $request->supplier_id)->first();
        $supplier->update([
            'due_amount'    => $supplier->due_amount - $request->amount,
        ]);
        Alert::success(' تم السداد بنجاح ');
        return redirect()->route('payment_suppliers.index');

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

    public function dueAmount(Request $request)
    {
                 
        $supplier = Supplier::where('id',$request->id)->first();
        return response()->json([
            'status'       => true,
            'msg'          => 'Successfully Added',
            'amount'       => $supplier->due_amount,
        ]);
        
    }

    public function supplierAccount(Request $request)
    {
        $data   = [];
        $supplierAccounts = SupplierAccount::where(['supplier_id'=>$request->id,'payment_method_id'=>$request->paymentMethod])->get();

        foreach($supplierAccounts as $supplierAccount)
        {
            // if( $supplierAccount->supplier_id != $request->id){
            //     return response()->json('<option >لاتوجد بيانات</option>') ;
            // }
            if($supplierAccount->type ==0)
                $data[] = '<option  value="'.$supplierAccount->id.'">' . $supplierAccount->wallet_name . ' ' .'('.$supplierAccount->wallet_num.')' .'</option>';
            else
            $data[] = '<option  value="'.$supplierAccount->id.'">' . $supplierAccount->bank_name . ' ' . '('.$supplierAccount->ibn.')' . '</option>';
        }
        return response()->json([
            'status'       => true,
            'msg'          => 'Successfully Added',
            'data'         => $data,
        ]);
    }
}
