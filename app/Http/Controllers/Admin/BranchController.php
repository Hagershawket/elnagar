<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;
use Alert;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barnches = Branch::get();
        return view('admin.branches.index',compact('barnches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        return view('admin.branches.add',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        try
        {
            if ($request->hasFile('image')){
                $fileNameToStore = uploadImage('documents',$request->image);
            }else {
                $fileNameToStore = 'images/zummXD2dvAtI.png';
            } 
    
            $branch = Branch::create([
                'name'                      => $request->name, 
                'phone'                     => $request->phone,
                'address'                   => $request->address,
                'cost'                      => $request->cost,
                'rent'                      => $request->rent,
                'country_id'                => $request->country,
                'asset_id'                  => 1,
            ]);
    
            $document = Document::create([
                'file'        => $fileNameToStore,
                'start_date'  => $request->start_date,
                'end_date'    => $request->end_date,
                'branch_id'   => $branch->id,
                'type'        => 0,
            ]);
            
    
            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('branches.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('branches.index');
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
        $branch = Branch::where('id',$id)->first();
        $document = Document::where('branch_id',$id)->first();
        $countries = Country::get();
        return view('admin.branches.edit',compact('branch','document', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, $id)
    {
        try {
            $branch = Branch::where('id',$id)->first();
            $branch->update([
                'name'                      => $request->name, 
                'phone'                     => $request->phone,
                'address'                   => $request->address,
                'cost'                      => $request->cost,
                'rent'                      => $request->rent,
                'country_id'                => $request->country,
                'asset_id'                  => 1,
            ]);

            $document = Document::where('id',$id)->first();
            if($document)
            {
                if ($request->hasFile('image'))
                {
                    $fileNameToStore = uploadImage('documents',$request->image);
                    $document->update([
                        'file'                  => $fileNameToStore,
                    ]);
                }

                $document->update([
                    'start_date'                => $request->start_date,
                    'end_date'                  => $request->end_date,
                ]);
            }

            Alert::success(' تم التعديل بنجاح ');
            return redirect()->route('branches.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('branches.index');
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
        //
    }

    public function stop($id, $status)
    {
            $branch = Branch::where('id' , $id)->first();
            $document = Document::where('branch_id' , $id)->first();
            if($branch)
            {
                $branch->update([
                    'is_active'    => $status,
                ]);
                $document->update([
                    'is_active'    => $status,
                ]);
                if($status == 0)
                    Alert::success('تم ايقاف الفرع بنجاح');
                else
                    Alert::success('تم تفعيل الفرع بنجاح');
            }
            else
            Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
            return redirect()->route('branches.index');
    }
}
