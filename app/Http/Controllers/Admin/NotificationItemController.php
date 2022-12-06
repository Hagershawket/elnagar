<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotificationItem;
use App\Models\NotificationCategory;
use  App\Models\Branch;
use  App\Models\Supplier;
use  App\Models\Employee;
use App\Http\Requests\NotificationItemRequest;
use Alert;

class NotificationItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::active()->get();
        $branches =Branch::active()->get();
        $suppliers = Supplier::active()->get();
        $items  = NotificationItem::active()->get();
        $categories  = NotificationCategory::active()->get();
        return view('admin.settings.notification_items.index',compact('items','categories','suppliers','branches','employees'));
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
    public function store(NotificationItemRequest $request)
    {   
        try
        {
            NotificationItem::create([
                'name'           => $request->name,
                'category_id'    => $request->category_id,
                'employee_id'    => $request->employee_id,
                'branch_id'      => $request->branch_id,
                'supplier_id'    => $request->supplier_id,
                'date'           => $request->date,
                'time'           => $request->time,
                'is_active'      => 1,
            ]);
    
            Alert::success(' تم اضافة الاشعار بنجاح ');
            return redirect()->route('notification_items.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('notification_items.index');
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
    public function update(NotificationItemRequest $request, $id)
    {
        $item = NotificationItem::where('id', $id)->first();
        $item->update([
            'category_id'   => $request->category_id,
            'supplier_id'   => $request->supplier_id,
            'employee_id'   => $request->employee_id,
            'branch_id'     => $request->branch_id,
            'date'          =>$request->date,
            'time'          =>$request->time,


        ]);

        Alert::success(' تم التعديل بنجاح ');
        return redirect()->route('notification_items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = NotificationItem::where('id', $id)->first();
        if($item)
        {
            $item->is_active = false;
            $item->save();
            Alert::success('تم حذف الاشعار بنجاح');
        }
        else
            Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
        return redirect()->route('notification_items.index');
    }
}
