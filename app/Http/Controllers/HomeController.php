<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\Supplier;
use App\Models\Account;
use App\Models\Country;
use App\Models\Holiday;
use App\Models\Notification;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['employees'] = Employee::active()->count();
        $data['branches']  = Branch::active()->count();
        $data['suppliers'] = Supplier::active()->count();
        $data['accounts']  = Account::active()->count();
        $countries  = Country::active()->get();
        return view('admin.index',compact('data','countries'));
    }

    public function maintenance()
    {
        return view('admin.maintenance');
    }

    public function notifications()
    {
        $notifications = Auth::user()->unreadNotifications;
        return view('admin.notifications.index',compact('notifications'));
    }

    public function markRead($id)
    {
        $notification= Auth::user()->notifications->where('id', $id)->first();
        if($notification)
        {
           $notification->markAsRead();
           return redirect()->back();
        }
    }
  
       public function markAllRead()
       {
         
        $usernotifications= Auth::user()->unreadnotifications;
  
        if($usernotifications)
        {
           foreach ($usernotifications as $notification) 
           {
              $notification->markAsRead();
           }
           return redirect()->back();
        }
  
    }
}
