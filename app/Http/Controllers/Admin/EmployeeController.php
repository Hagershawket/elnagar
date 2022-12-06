<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\NotificationRequest;
use App\Models\Employee;
use App\Models\Country;
use App\Models\Branch;
use App\Models\User;
use App\Models\Document;
use Alert;
use Hash;
use Keygen;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();
        return view('admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::active()->get();
        $countries = Country::active()->get();
        $branches  = Branch::active()->get();
        return view('admin.employees.add',compact('employees','countries','branches'));
    }

    public function generatePassword()
    {
        $pass = rand(100000,400000);
        return $pass;
    }

    public function store(EmployeeRequest $request)
    {
        try
        {
            $image = '';
            if ($request->has('image')) {
                $image = uploadImage('employees', $request->image);
            }
            $file = '';
            if ($request->has('file')) {
                $file = uploadImage('documents', $request->file);
            }  
            
            // Create User Account
            $user = User::create([
                'job_num'   => $request->job_num,
                'name'      => $request->name,
                'password'  => bcrypt($request->password),
                'is_active' => true,
            ]);

            // Create Employee
            $employee = Employee::create([
                'job_num'           => $request->job_num,
                'job_title'         => $request->job_title,
                'user_id'           => $user->id,
                'insurance_num'     => $request->insurance_num,
                'name'              => $request->name,
                'branch_id'         => $request->branch_id,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'type'              => $request->type,
                'address'           => $request->address,
                'country_id'        => $request->country_id,
                'payroll'           => $request->payroll,
                'hiring_date'       => $request->hiring_date,
                'start_work_date'   => $request->start_work_date,
                'national_num'      => $request->national_num,
                'image'             => $image,
                'off_day'           => $request->off_day,
                'working_days'      => $request->working_days,
                'work_hours'        => $request->work_hours,
                'attendance_status' => $request->attendance_status ? true : false,
                'status'            => $request->status,
                'is_active'         => 1,
            ]);

            if($file != '')
            {
                // Create Document
                Document::create([
                    'file'        => $file,
                    'start_date'  => $request->start_date,
                    'end_date'    => $request->end_date,
                    'employee_id' => $employee->id,
                    'type'        => 1,
                    'is_active'   => true,
                ]);
            }

            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('employees.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('employees.index');
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
        $employee  = Employee::find($id);
        $user      = User::find($employee->user_id);
        $document  = Document::where('employee_id',$id)->first();
        $countries = Country::active()->get();
        $branches  = Branch::active()->get();
        return view('admin.employees.edit',compact('employee', 'document','countries','branches','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        try
        {
            $employee = Employee::find($id);
            $document = Document::where('employee_id' , $id)->first();
            $user = User::find($employee->user_id); 

            $image = '';
            if ($request->has('image')) {
                $image = uploadImage('employees', $request->image);
                $employee->update([
                    'image'  => $image,
                ]);
            } 

            // Update User Account
            $user->update([
                'job_num'   => $request->job_num,
                'name'      => $request->name,
            ]);
            if($request->password)
            {
                $user->update(['password'  => bcrypt($request->password)]);
            }

            // Update Employee Account
            $employee->update([
                'job_num'           => $request->job_num,
                'job_title'         => $request->job_title,
                'insurance_num'     => $request->insurance_num,
                'name'              => $request->name,
                'branch_id'         => $request->branch_id,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'type'              => $request->type,
                'address'           => $request->address,
                'country_id'        => $request->country_id,
                'payroll'           => $request->payroll,
                'hiring_date'       => $request->hiring_date,
                'start_work_date'   => $request->start_work_date,
                'national_num'      => $request->national_num,
                'off_day'           => $request->off_day,
                'attendance_status' => $request->attendance_status ? true : false,
                'status'            => $request->status,
            ]);

            $file = '';
            if ($request->has('file')) {
                $file = uploadImage('documents', $request->file);
            }
            if($file)
            {
                if($document)
                {
                    $document->update([
                        'file'       => $file,
                        'start_date' => $request->start_date,
                        'end_date'   => $request->end_date,
                    ]);
                }
                else
                {
                    Document::create([
                        'file'        => $file,
                        'start_date'  => $request->start_date,
                        'end_date'    => $request->end_date,
                        'employee_id' => $employee->id,
                        'type'        => 1,
                        'is_active'   => true,
                    ]);
                }
            }
            Alert::success(' تم التعديل بنجاح ');
            return redirect()->route('employees.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('employees.index');
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
        
    }
    public function stop($id, $status)
    {
            $employee = Employee::where('id' , $id)->first();
            if($employee->user_id){
                $user = User::find($employee->user_id);
                $user->update([
                    'is_active' => $status,
                ]);
            }
                $employee->update([
                    'is_active'    => $status,
                ]);
                $document = Document::where('employee_id' , $id)->first();
                if($document)
                {
                    $document->update([
                        'is_active' => $status,
                    ]);
                }
                if($status == 0)
                    Alert::success('تم الايقاف بنجاح');
                else
                    Alert::success('تم التفعيل بنجاح');
            return redirect()->route('employees.index');
    }

    public function edit_device(Request $request , $id)
    {
        $user = User::find($id);
        if($user)
        {
            $user->update(['device_id'=> $request->device_id]);
            Alert::success('تم التحديث بنجاح');
            return redirect()->route('employees.index');
        }
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('employees.index');
    }

    public function send_notifications(NotificationRequest $request , $id)
    {
        try
        {
            $employee = Employee::where('id' , $id)->first();
            $user     = User::where('id' , $employee->user_id)->first();
            sendmessage($user, $request->title, $request->body);
            Alert::success('تم ارسال الاشعار بنجاح');
            return redirect()->route('employees.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('employees.index');
        }
    }

    public function send_notifications_all(NotificationRequest $request)
    {
        try
        {
            $users = User::get();
            foreach($users as $user)
                sendmessage($user, $request->title, $request->body);
            Alert::success('تم ارسال الاشعار بنجاح');
            return redirect()->route('employees.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('employees.index');
        }
    }
}
