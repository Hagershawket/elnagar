<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotificationCategory;
use Alert;

class NotificationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = NotificationCategory::active()->get();
        return view('admin.settings.notification_categories.index',compact('categories'));
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
        NotificationCategory::create([
            'name'        => $request->name,
            'is_active'   => 1,
        ]);

        Alert::success(' تم اضافة فئة اشعارات بنجاح ');
        return redirect()->route('notification_categories.index');
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
        $category = NotificationCategory::where('id', $id)->first();
        $category->update([
            'name'   => $request->name,
        ]);

        Alert::success(' تم تحديث فئة اشعارات بنجاح ');
        return redirect()->route('notification_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = NotificationCategory::findOrFail($id);
        if($category)
        {
            $category->is_active = false;
            $category->save();
            Alert::success('تم حذف فئة اشعارات بنجاح');
        }
        else
        Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
        return redirect()->route('notification_categories.index');
    }
}
