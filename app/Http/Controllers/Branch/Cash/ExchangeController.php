<?php

namespace App\Http\Controllers\Branch\Cash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Main_Expenses;
use App\Models\Sub_Expenses;
use App\Models\Expense_recording;
use App\Traits\GeneralTrait;
use Alert;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainExpenses = Main_Expenses::get();
        $records = Expense_recording::where('branch_id',auth()->user()->branch_id)->latest()->get();
        return view('resturant.cash.cashExchange', compact(['mainExpenses','records']));
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
        try{
             Expense_recording::create([
                'branch_id'                    => auth()->user()->branch_id,
                'main_id'                      => $request->maincat,
                'sub_id'                       => $request->subcat,
                'date'                         => $request->date,
                'amount'                       => $request->amount,
                'notes'                        => $request->notes,
            ]);
            Alert::success(' تم الاضافة بنجاح ');
            return back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
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
        Expense_recording::find($id)->delete();
        Alert::erorr(' تم الحذف ');
        return back();
    }
}
