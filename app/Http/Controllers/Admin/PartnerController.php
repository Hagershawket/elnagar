<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use App\Models\PartnerAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\Branch;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = Branch::get();
        $partners = Partner::get();
        return view('admin.settings.Partners.index',compact('partners','branchs'));
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
        try
        {
            Partner::create([
                'name'          => $request->name,
                'national_num'  => $request->national_num,
                'address'       => $request->address,
                'phone'         => $request->phone,
                'date'          => $request->date,
                'amount'        => $request->amount,
                'rate'          => $request->rate,
    
            ]);
            Alert::success(' تم اضافه الشريك بنجاح ');
            return redirect()->route('partners.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('partners.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::where('id',$id)->first();
        $partner_actions = PartnerAction::where('partner_id',$id)->get();
        return view('admin.settings.partners.show',compact('partner','partner_actions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try
        {
            $partner = Partner::where('id',$id)->first();
            $partner->update([
                'name'          => $request->name,
                'national_num'  => $request->national_num,
                'address'       => $request->address,
                'phone'         => $request->phone,
                'date'          => $request->date,
                'amount'        => $request->amount,
                'rate'          => $request->rate,
            ]);

            Alert::success(' تم تحديث الشريك  بنجاح ');
            return redirect()->route('partners.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('partners.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::where('id',$id)->first();
        $partner_actions = PartnerAction::where('partner_id',$id)->get();
        foreach($partner_actions as $action)
        {
            $action->delete();
        }
        $partner->delete();
        Alert::success(' تم الحذف بنجاح ');
        return redirect()->route('partners.index');
    }

    public function plus(Request $request, $id)
    {
        try
        {
            $image='';
            if ($request->has('image')) {
                $image = uploadImage('partner_actions', $request->image);
            }   
            $partner = Partner::find($id);
            PartnerAction::create([
                'partner_id'       => $id,
                'date'             => $request->date,
                'amount_plus'      => $request->amount_plus,
                'image'            => $image,
            $partner->update([
                'amount'=> $partner->amount + $request->amount_plus,
            ])
            
            ]);

            Alert::success(' تم  اضافة المبلغ  بنجاح ');
            return redirect()->route('partners.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('partners.index');
        }
    }

    public function minus(Request $request, $id)
    {
        try
        {
            $image='';
            if ($request->has('image')) {
                $image = uploadImage('partner_actions', $request->image);
            }   
            $partner = Partner::find($id);
            PartnerAction::create([
                'partner_id'   => $id,
                'date'         => $request->date,
                'amount_minus' => $request->amount_minus,
                'image'        => $image,
            $partner->update([
                'amount'=> $partner->amount - $request->amount_minus,
            ])
            
            ]);

            Alert::success(' تم  سحب المبلغ  بنجاح ');
            return redirect()->route('partners.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('partners.index');
        }
    }
 
}
