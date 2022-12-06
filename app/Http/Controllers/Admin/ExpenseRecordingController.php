<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expense_recording;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Main_Expenses;
use App\Models\Sub_Expenses;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ExpenseRequest;

class ExpenseRecordingController extends Controller
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
        $units  = Unit::active()->get();
        return view('admin.settings.main_expenses.expense_recording.index',compact('mainexpenses','subexpenses', 'units'));
    }

  
    public function store(ExpenseRequest $request)
    {
        // try
        // {

            $image='';
            if ($request->has('image')) {
                $image = uploadImage('expenses', $request->image);
            }
            $expense = Expense_recording::create([
                'main_id'       => $request->main_id,
                'sub_id'        => $request->sub_id,
                'date'          => $request->date,
                'grand_total'   => $request->grand_total,
                'image'         => $image,
                'notes'         => $request->notes,
            ]);

            $products = $request->name;
            if($products != [null])
            {
                for ($i=0; $i<count($products); $i++)
                {
                    ExpenseItem::create([
                        'expense_id'     => $expense->id,
                        'name'           => $request->name[$i],
                        'unit_id'        => $request->unit_id[$i],
                        'qty'            => $request->qty[$i],
                        'unit_cost'      => $request->unit_cost[$i],
                        'total'          => $request->total[$i],
                        'is_active'      => 1,
                    ]);
                }
            }

            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('report');
        // } catch(\Exception $ex){
        //     Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
        //     return redirect()->route('report');
        // }

    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense_recording  $expense_recording
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense_recording $expense_recording)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense_recording  $expense_recording
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense_recording  = Expense_recording::find($id);
        $expense_recording->delete();

        Alert::success(' تم الحذف بنجاح ');
        return redirect()->route('ExpensesReport.index');
    }

    public function record($id)
    {
        $sub = DB::table("sub_expenses")->where("main_id", $id)->pluck("name", "id");
        return json_encode($sub);
    }

    public function report()
    {
        $expenserecording = Expense_recording::all();
        $mainexpenses = Main_Expenses::all();
        $subexpenses  = Sub_Expenses::all();
        
        return view('admin.settings.main_expenses.ExpensesReport.index',compact('expenserecording','mainexpenses','subexpenses'));
    }
    
   

  

}
