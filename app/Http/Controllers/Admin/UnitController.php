<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use Illuminate\Http\Request;
use App\Models\Unit;
use Alert;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $units = Unit::where('is_active',1)->get();
       return view('admin.settings.units.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        try {
                Unit::create([
                    'unit_name' => $request->unit_name,
                    'unit_code' => $request->unit_code,
                    'is_active' => 1,
                ]);
        
                Alert::success(' تم الاضافة بنجاح ');
                return redirect()->route('units.index');
        } catch(\Exception $ex){
                Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
                return redirect()->route('units.index');
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
    public function update(UnitRequest $request, $id)
    {
        try {
                $unit = Unit::where('id',$id)->first();
                $unit->update([
                    'unit_name' => $request->unit_name,
                    'unit_code' => $request->unit_code,   
                ]);
        
                Alert::success(' تم التعديل بنجاح ');
                return redirect()->route('units.index');
        } catch(\Exception $ex){
                Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
                return redirect()->route('units.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);
        if($unit)
        {
            $unit->update([
                'is_active' => false,
            ]);
            Alert::success('تم الحذف بنجاح');
        }
        else
            Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
            return redirect()->route('units.index');
    }
}
