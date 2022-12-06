<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransportRequest;
use Alert;


class TransportController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $transports = Transport::get();
        return view('admin.settings.Transports.index',compact('transports'));
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
    public function store(TransportRequest $request)
    {      
        try
        {
            $images = [];
            if ($request->has('image')) {
                foreach ($request->image as $image) {
                    $images[] = uploadImage('Transport', $image);
                }
            }
    
             Transport::create([
                'num'               => $request->num,
                'chassis_num'       => $request->chassis_num,
                'description'       => $request->description,
                'organization_name' => $request->organization_name,
                'type'              => $request->type,
                'image'             => $request->image ? implode(',', $images) : 'images/zummXD2dvAtI.png',
                'start_date'        => $request->start_date,
                'exp_date'          => $request->exp_date,
    
            ]);
           
    
            Alert::success(' تمت الاضافه بنجاح ');
            return redirect()->route('Transports.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('Transports.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(TransportRequest $request,$id)
    {

        $transport = Transport::where('id',$id)->first();
        $images = [];
            if ($request->has('image')) {
                foreach ($request->image as $image) {
                    $images[] = uploadImage('Transport', $image);
                }
            }

        $transport->update([
            'num'                  => $request->num,
            'chassis_num'          => $request->chassis_num,
            'description'          => $request->description,
            'organization_name'    => $request->organization_name,
            'type'                 => $request->type,
            'image'                => $request->image ? implode(',', $images) : 'images/zummXD2dvAtI.png',
            'start_date'           => $request->start_date,
            'exp_date'             => $request->exp_date,

        ]);
       

        Alert::success(' تم التحديث بنجاح ');
        return redirect()->route('Transports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $transports =Transport::find($id);
                $transports->delete();
       

         Alert::success(' تم الحذف بنجاح ');
        return redirect()->route('Transports.index');
    }

   
}
