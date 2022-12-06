<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Alert;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods  = PaymentMethod::active()->get();
        return view('admin.settings.payment_methods.index',compact('methods'));
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
        $methods  = PaymentMethod::create([
            'name'           => $request->name,
            'is_active'      => 1,
        ]);
        Alert::success(' تم اضافة طريقه دفع  بنجاح ');
        return redirect()->route('payment_methods.index');
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
        $method =PaymentMethod::where('id',$id)->first();
        $method->update([
            'name' =>$request->name,
        ]);

        Alert::success(' تم التحديث  بنجاح ');
        return redirect()->route('payment_methods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method = PaymentMethod::findOrFail($id);
        if($method)
        {
            $method->is_active = false;
            $method->save();
            Alert::success('تم حذف طريقة الدفع بنجاح');
        }
        else
        Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
        return redirect()->route('payment_methods.index');
    }
}
