<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\DiscountBonus;
use App\Models\Setting;
use App\Models\Holiday;
use App\Http\Requests\EmployeeReportRequest;

class ReportController extends Controller
{
    public function index()
    {
        $employees = Employee::get();
        $discount_value = Setting::first()->discount_value; 
        return view('admin.employees.reports.index',compact(['employees','discount_value']));
    }


    public function employeeReportByDate(EmployeeReportRequest $request)
    {
        try{
            $employee = Employee::where('id',$request->employeeName)->first();

            $timeLate = Attendance::where('employee_id',$request->employeeName)->
            whereBetween('date',[$request->startDate,$request->endDate])->sum('late_time');
            $discount = DiscountBonus::where(['employee_id'=>$request->employeeName,'type'=>0])->
            whereBetween('date',[$request->startDate,$request->endDate])->sum('amount');
            $bonus = DiscountBonus::where(['employee_id'=>$request->employeeName,'type'=>1])->
            whereBetween('date',[$request->startDate,$request->endDate])->sum('amount');
            return view('admin.employees.reports.reportByDate',compact(['employee','timeLate',
                'discount','bonus']));
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    public function holidayReport($id)
    {
        $employee = Employee::find($id);
        $holidays = Holiday::where('employee_id', $id)->get();
        return view('admin.holidays.reports.index',compact(['employee', 'holidays']));
    }

    public function holidayReportByDate(Request $request,$id)
    {
        try{
            $start_date = $request->startDate;
            $end_date   = $request->endDate;
            $employee   = Employee::where('id',$id)->first();
            $holidays   = Holiday::where('employee_id',$id)->whereDate('from_date','>=',$start_date)->whereDate('to_date','<=',$end_date)->orderBy('created_at', 'desc')->get();
            return view('admin.holidays.reports.reportByDate',compact('employee','holidays','start_date','end_date'));
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }
    
}
