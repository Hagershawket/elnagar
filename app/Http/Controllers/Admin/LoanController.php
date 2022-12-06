<?php

namespace App\Http\Controllers\Admin;

use App\Models\loan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = loan::get();
        return view('admin.settings.loans.index',compact('loans'));
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
        loan::create([

            'amount'     =>$request->amount,
            'bank'       =>$request->bank,
            'rate'       =>$request->rate,
            'from_date'  =>$request->from_date,

        ]);

        Alert::success(' تم اضافه بيانات القرض   بنجاح ');
        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $loans = loan::where('id',$id)->first();
        $loans->update([

            'amount'     =>$request->amount,
            'bank'       =>$request->bank,
            'rate'       =>$request->rate,
            'from_date'  =>$request->from_date,

        ]);

        Alert::success(' تم تحديث بيانات القرض  بنجاح ');
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
       
        $loans = loan::where('id',$id)->first();
        $loans->destroy();

        // Alert::success(' تم حذف بيانات القرض  بنجاح ');
        // return redirect()->route('loans.index');
    }

    
}
