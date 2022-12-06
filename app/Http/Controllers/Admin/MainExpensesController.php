<?php

namespace App\Http\Controllers\Admin;

use App\Models\Main_Expenses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;


class MainExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainexpenses = Main_Expenses::all();
        return view('admin.settings.main_expenses.index',compact('mainexpenses'));
    }

    public function store(Request $request)
    {
        
        Main_Expenses::create([
            'name'=>$request->name,
            
        ]);
        Alert::success(' تم الاضافة بنجاح ');
        return redirect()->route('main_expenses.index');


    }

    public function update(Request $request,$id)
    {
        $mainexpenses = Main_Expenses::find($id);
        $mainexpenses->update([
            'name'=>$request->name,
        
        ]);
        Alert::success(' تم التحديث بنجاح ');
        return redirect()->route('main_expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main_Expenses  $main_Expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainexpenses = Main_Expenses::find($id);
        $mainexpenses->delete();

        Alert::success(' تم الحذف بنجاح ');
        return redirect()->route('main_expenses.index');
    }
}
