<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use App\Models\Setting;
use App\Models\Branch;
use Alert;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::latest('id')->get();
        $setting = Setting::first();
        return view('admin.attendances.index',compact('attendances','setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::active()->get();
        return view('admin.attendances.add',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request)
    {
         try{
            $lateTime = Setting::first()->checkin_time;
            if(strtotime($request->checkin) > strtotime($lateTime))
            {
                $checkTime = strtotime($lateTime);
                $loginTime = strtotime($request->checkin);
                $diff = $loginTime - $checkTime;
                $time_late = round(abs($diff)/ 60);
            }
            $attendance = Attendance::create([
                'employee_id'                      => $request->employee_id,
                'branch_id'                        => $request->branch_id,
                'date'                             => $request->date,
                'checkin'                          => $request->checkin,
                'late_time'                        => $time_late ?? '',
                'checkout'                         => $request->checkout,
                'note'                             => $request->note,
            ]);

            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('attendances.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('attendances.index');
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
    public function update(Request $request, $id)
    {
        //
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
}
