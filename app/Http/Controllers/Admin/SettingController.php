<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use App\Models\Setting;
use Alert;
use Auth;

class SettingController extends Controller
{
    public function generalSetting()
    {
        $setting = Setting::first();
        return view('admin.settings.general_setting', compact('setting'));
    }

    public function generalSettingStore(SettingRequest $request)
    {
        try
        {
            $setting = Setting::first();
            if ($request->hasFile('system_logo'))
            {
                $logo = uploadImage('settings',$request->system_logo);
                $setting->update([
                    'system_logo'  => $logo,
                ]);
            }

            $setting->update([
                'checkin_time'   => $request->checkin_time,
                'checkout_time'  => $request->checkout_time,
                'discount_value' => $request->discount_value,
                'articles'       => $request->articles,
                'whatsApp'       => $request->whatsApp,
            ]);
            
            Alert::success(' تم التحديث بنجاح ');
            return redirect()->route('setting.general');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('setting.general');
        }    
    }
}
