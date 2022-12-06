<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Alert;

class LoginController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }
    
    public function adminLogin(Request $request)

    {   
        //Validation
        if(Auth::guard('web')->attempt(['job_num'=>request('job_num'),'password'=>request('password')]))
        {
            if(Auth::guard('web')->user()->is_active)
            {
                Alert::success('تم الدخول بنجاح');
                return redirect('/');
            }
            else
            {
                Alert::error('هذا الحساب تم ايقافه');
                return back()->withInput($request->only('email'));
            }
            // Alert::success('تم الدخول بنجاح');
            // return redirect('/');
        }else{
            Alert::error('يوجـــد مشكلة في البيــانات يرجي التأكد والمحـاولة مرة أخري');
            return back()->withInput($request->only('job_num'));
        }
    }

    public function logout(){
        Auth::logout();
        Alert::success('تـــم تسجيـل الخـروج بنجــــاح');
        return redirect('/');
    }
}
