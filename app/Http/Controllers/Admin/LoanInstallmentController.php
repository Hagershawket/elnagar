<?php

namespace App\Http\Controllers\Admin;

use App\Models\loan_installment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\loan;

class LoanInstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
       
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
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loan_installment  $loan_installment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        $loan = loan::find($id);
        $installments = loan_installment::where('loan_id', $loan->id)->get();

       //return $loans->installment;
     return view('admin.settings.loans.report',compact('loan','installments'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loan_installment  $loan_installment
     * @return \Illuminate\Http\Response
     */
    public function edit(loan_installment $loan_installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loan_installment  $loan_installment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')){
            $Installments = uploadImage('Installments',$request->image);
        }
      
       
        loan_installment::create([

            'amount'=>$request->amount,
            'date'=>$request->date,
            'loan_id'=>$request->loan_id,
            'image' =>$Installments,


        ]);
        Alert::success(' تم  سداد فائده القرض   بنجاح ');
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loan_installment  $loan_installment
     * @return \Illuminate\Http\Response
     */
    public function destroy(loan_installment $loan_installment)
    {
        //
    }
}
