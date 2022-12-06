<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InstallmentRequest;
use App\Models\Installment;
use App\Models\InstallmentAction;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Link;
use Alert;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $installments = Installment::get();
        $categories = Category::Active()->get();
        $subcategories = Subcategory::Active()->get();
        $links = Link::Active()->get();
        return view('admin.installments.index',compact('installments','categories'));
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
    public function store(InstallmentRequest $request)
    {
        try
        {
            Installment::create([
                'link_id'           => $request->link_id,
                'reason'            => $request->reason,
                'months_num'        => $request->months_num,
                'monthly_amount'    => $request->monthly_amount,
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'total_amount'      => $request->total_amount,
                'notes'             => $request->notes,
    
            ]);
    
            Alert::success(' تم اضافه قسط  بنجاح ');
            return redirect()->route('installments.store');

        } catch(\Exception $ex){
                Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
                return redirect()->route('installments.index');
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
        $installment = Installment::where('id',$id)->first();
        $installment_actions = InstallmentAction::where('installment_id',$id)->get();
        return view('admin.installments.show',compact('installment','installment_actions'));
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
    public function update(InstallmentRequest $request, $id)
    {
        try
        {
            $installment = Installment::where('id',$id)->first();
            $installment->update([
                'reason'            => $request->reason,
                'months_num'        => $request->months_num,
                'monthly_amount'    => $request->monthly_amount,
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'total_amount'      => $request->total_amount,
                'notes'             => $request->notes,
            ]);

            Alert::success(' تم تحديث بيانات القسط بنجاح ');
            return redirect()->route('installments.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('installments.index');
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
        $installment = Installment::where('id',$id)->first();
        $installment_actions = InstallmentAction::where('installment_id',$id)->get();
        foreach($installment_actions as $action)
        {
            $action->delete();
        }
        $installment->delete();
        Alert::success(' تم الحذف بنجاح ');
        return redirect()->route('installments.index');
    }

    public function plus(Request $request)
    {
        try
        {
            $image = '';
            if ($request->has('image')) {
                $image = uploadImage('installment_actions', $request->image);
            }   
            $installment = Installment::find($request->installment_id);
            InstallmentAction::create([
                'installment_id'   => $request->installment_id,
                'date'             => $request->date,
                'amount_plus'      => $request->amount_plus,
                'image'            => $image,
            $installment->update([
                'total_paid' => $installment->total_paid + $request->amount_plus,
            ])
            
            ]);

            Alert::success(' تم  اضافة المبلغ  بنجاح ');
            return redirect()->route('installments.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('installments.index');
        }
    }

    public function getSubcategories(Request $request)
    {
        $data   = [];
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();

        foreach($subcategories as $subcategory)
        {
            // if( $subcategory->supplier_id != $request->id){
            //     return response()->json('<option >لاتوجد بيانات</option>') ;
            // }
                $data[] = '<option  value="'.$subcategory->id.'">' . $subcategory->name .'</option>';
        }
        return response()->json([
            'status'       => true,
            'msg'          => 'Successfully Added',
            'data'         => $data,
        ]);
    }

    public function getLinks(Request $request)
    {
        $data   = [];
        $links = Link::where(['category_id' => $request->category_id,'subCategory_id'=> $request->subCategory_id])->get();

        foreach($links as $link)
        {
            // if( $subcategory->supplier_id != $request->id){
            //     return response()->json('<option >لاتوجد بيانات</option>') ;
            // }
                $data[] = '<option  value="'.$link->id.'">' . $link->name .'</option>';
        }
        return response()->json([
            'status'       => true,
            'msg'          => 'Successfully Added',
            'data'         => $data,
        ]);
    }
}
