<?php

namespace App\Http\Controllers\Admin;

use App\Models\Investor;
use App\Models\InvestorAction;
use App\Http\Requests\InvestorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $investors = Investor::get();
      return view('admin.settings.Investors.index',compact('investors'));
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
    public function store(InvestorRequest $request)
    {
        try
        {
            Investor::create([
                'name'                => $request->name,
                'national_num'        => $request->national_num,
                'address'             => $request->address,
                'phone'               => $request->phone,
                'main_amount'         => $request->main_amount,
                'investment_amount'   => $request->investment_amount,
                'rate'                => $request->rate,
                'date'                => $request->date,    
            ]);
    
            Alert::success(' تم اضافه المستثمر  بنجاح ');
            return redirect()->route('investors.store');

        } catch(\Exception $ex){
                Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
                return redirect()->route('investors.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $investor = Investor::where('id',$id)->first();
        $investor_actions = InvestorAction::where('investor_id',$id)->get();
        return view('admin.settings.Investors.show',compact('investor','investor_actions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit(Investor $investor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(InvestorRequest $request ,$id)
    {
        
        try
        {
            $investor = Investor::where('id',$id)->first();
            $investor->update([
                'name'                => $request->name,
                'national_num'        => $request->national_num,
                'address'             => $request->address,
                'phone'               => $request->phone,
                'main_amount'         => $request->main_amount,
                'investment_amount'   => $request->investment_amount,
                'rate'                => $request->rate,
                'date'                => $request->date,
            ]);

            Alert::success(' تم تحديث بيانات المستثمر   بنجاح ');
            return redirect()->route('investors.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('investors.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investor = Investor::where('id',$id)->first();
        $investor_actions = InvestorAction::where('investor_id',$id)->get();
        foreach($investor_actions as $action)
        {
            $action->delete();
        }
        $investor->delete();
        Alert::success(' تم الحذف بنجاح ');
        return redirect()->route('investors.index');
    }

    public function plus(Request $request, $id)
    {
        try
        {
            $image='';
            if ($request->has('image')) {
                $image = uploadImage('investor_actions', $request->image);
            }   
            $investor = Investor::find($id);
            InvestorAction::create([
                'investor_id'      => $id,
                'date'             => $request->date,
                'amount_plus'      => $request->amount_plus,
                'image'            => $image,
            $investor->update([
                'profit_amount'=> $investor->profit_amount + $request->amount_plus,
            ])
            
            ]);

            Alert::success(' تم  اضافة المبلغ  بنجاح ');
            return redirect()->route('investors.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('investors.index');
        }
    }

    public function minus(Request $request, $id)
    {
        try
        {
            $image='';
            if ($request->has('image')) {
                $image = uploadImage('investor_actions', $request->image);
            }   
            $investor = Investor::find($id);
            InvestorAction::create([
                'investor_id'  => $id,
                'date'         => $request->date,
                'amount_minus' => $request->amount_minus,
                'image'        => $image,
            $investor->update([
                'amount'=> $investor->amount - $request->amount_minus,
            ])
            
            ]);

            Alert::success(' تم  سحب المبلغ  بنجاح ');
            return redirect()->route('investors.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('investors.index');
        }
    }
}
