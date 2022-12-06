<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\Employee;
use App\Models\User;
use Alert;
use Illuminate\Http\Request;
use App\Http\Requests\HolidayRequest;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holiday::latest('id')->get();
        return view('admin.holidays.index',compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.holidays.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HolidayRequest $request)
    {
        try
        {
            $holiday = Holiday::create([
                'employee_id'                      => $request->employee_id,
                'branch_id'                        => $request->branch_id,
                'from_date'                        => $request->from_date,
                'to_date'                          => $request->to_date,
                'reason'                           => $request->reason,
                'is_approved'                      => 1,                  //accept holiday is a default by HR
            ]);
            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('holidays.index');
        } catch(\Exception $ex){
                Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
                return redirect()->route('holidays.index');
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


    public function employeeName(Request $request)
    {
        $employee = Employee::where('job_num',$request->job_num)->first();
        if($employee)
        {
            return response()->json([
                'status'       => true,
                'msg'          => 'Successfully Added',
                'employee'     => $employee,
            ]);
        }
        else
        {
            return response()->json([
                'status'       => false,
                'msg'          => 'لا يوجد بيانات متطابقة',
            ]);
        }
    }

    public function approve($id, $status)
    {

        $holiday  = Holiday::where('id' , $id)->first();
        $employee = Employee::where('id' , $holiday->employee_id)->first();
        $user     = User::where('id' , $employee->user_id)->first();
            if($holiday)
            {
                $holiday->update([
                    'is_approved'    => $status,
                ]);
                if($status == 1)
                {
                    Alert::success('تم قبول  طلب الاجازة');
                    sendmessage($user,'طلب الاجازة','تم قبول طلب الاجازة');
                }
                else
                {
                    Alert::success('تم رفض  طلب الاجازة');
                    sendmessage($user,'طلب الاجازة','تم رفض طلب الاجازة');
                }
            }
            else
            Alert::error('حدث خطا ما برجاء المحاوله مرة اخري');
            return redirect()->route('holidays.index');
    }
}
