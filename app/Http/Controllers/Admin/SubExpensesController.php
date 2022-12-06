<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sub_Expenses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Main_Expenses;



class SubExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainexpenses = Main_Expenses::get();
        $subexpenses  = Sub_Expenses::get();
        return view('admin.settings.main_expenses.sub_expenses.index',compact('subexpenses','mainexpenses'));
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
        Sub_Expenses::create([
            'name'=>$request->name,
            'main_id'=>$request->main_id,
        ]);
        Alert::success(' تم الاضافة بنجاح ');
        return redirect()->route('sub_expenses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Sub_Expenses  $sub_Expenses
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_Expenses $sub_Expenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Sub_Expenses  $sub_Expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_Expenses $sub_Expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Sub_Expenses  $sub_Expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $subexpenses  = Sub_Expenses::where('id',$id)->first();
        $subexpenses->update([
            'name'=>$request->name,
            'main_id'=>$request->main_id,
        ]);

        Alert::success(' تم التحديث بنجاح ');
        return redirect()->route('sub_expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Sub_Expenses  $sub_Expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subexpenses  = Sub_Expenses::find($id);
        $subexpenses->delete();

        Alert::success(' تم الحذف بنجاح ');
        return redirect()->route('sub_expenses.index');
    }
}
