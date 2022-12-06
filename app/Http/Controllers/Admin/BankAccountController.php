<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use App\Models\Account_action;

use Alert;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $accounts  = Account::active()->where('type',1)->get();
        return view('admin.settings.accounts.index',compact('accounts'));
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
        // $rules = [
        //     'image'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ];
        // $validator = Validator::make($request->all(), $rules , [
        //     'image.image'   => 'يجب ان يكون المدخل صورة',
        //     'image.mimes'   => ' png or jpg or jpeg or gif or svg يجب ان تكون صيغة الصورة',
        //     'image.max'     => 'اقصى حجم للصورة هو 2048',
        // ]);

        // if ($validator->fails()) {
        //     toastr()->error('حدث خطا ما برجاء المحاوله مرة اخري', $validator->errors()->all());
        //     return redirect( route('countries.index'))
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
           
        Account::create([
            'type'        =>1,
            'name'        =>$request->name,
            'bank_name'   =>$request->bank_name,
            'account_num' =>$request->account_num,
            'ibn'         =>$request->ibn,
            'total'=>$request->account_balance,
            'is_active'   => 1
        ]);

        Alert::success(' تم اضافة الحساب بنجاح ');
        return redirect()->route('bank_accounts.index');
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
        $accounts = Account::where('id', $id)->first();
        $accounts->update([
           
            'name'        =>$request->name,
            'bank_name'   =>$request->bank_name,
            'account_num' =>$request->account_num,
            'ibn'         =>$request->ibn,  
            'total'=>$request->account_balance,       
        ]);

        Alert::success(' تم تحديث الحساب بنجاح ');
        return redirect()->route('bank_accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        if($account)
        {
            $account->is_active = false;
            $account->save();
            Alert::success('تم حذف الحساب بنجاح');
        }
        else
        Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
        return redirect()->route('bank_accounts.index');
    }

    public function plus(Request $request, $id)
    {
        $image='';
        if ($request->has('image')) {
            $image = uploadImage('account', $request->image);
        }   
        $accounts = Account::find($id);
        Account_action::create([
            'date'             => $request->date,
            'account_id'       => $id,
            'amount_plus'      => $request->amount_plus,
            'commission'       => $request->commission,
            'image'            => $image,
           $accounts->update([
            'total'=> $accounts->total + $request->amount_plus,
           ])
          
        ]);

        Alert::success(' تم  ايداع المبلغ  بنجاح ');
        return redirect()->route('bank_accounts.index');
    }

    public function minus(Request $request, $id)
    {


         $image='';
        if ($request->has('image')) {
            $image = uploadImage('account', $request->image);
        }   
        $accounts = Account::find($id);
        Account_action::create([
            'date'=>$request->date,
            'account_id' =>$id,
            'amount_minus'=>$request->amount_minus,
            'image'=>$image,
           $accounts->update([
            'total'=>$accounts->total - $request->amount_minus,
           ])
          
        ]);

        Alert::success(' تم  سحب المبلغ  بنجاح ');
        return redirect()->route('bank_accounts.index');
    }

    public function all($id)
    {
        $accounts =  Account_action::where('account_id',$id)->get();
        
       return view('admin.settings.accounts.show',compact('accounts'));
    }

  

}
