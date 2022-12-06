<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Holiday;
use App\Traits\GeneralTrait;
use App\Http\Resources\LoginResource;
use App\Http\Resources\MediaResource;
use App\Http\Resources\AttendanceResource;
use Validator;
use Auth;
use  App\Models\Media;
use App\Models\Attendance;
use App\Models\DiscountBonus;
use App\Models\Setting;
use App\Models\Employee;
use  App\Models\User;
use App\Models\Branch;
use App\Http\Requests\Api\ChangeBranchLocationRequest;
use App\Http\Requests\Api\AttendanceApiRequest;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;


class ApiController extends Controller
{
  
use GeneralTrait;

    public function holiday(Request $request){

     try {
        $rules = [
            'from_date'   => "required",
            'to_date'    => "required",
        ];
        $validator = Validator::make($request->all(), $rules,[
            'from_date.required' =>__('messages.The from date is required'),
            'to_date.required'   =>__('messages.The to date is required'),
        ]);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        else{
            $employee = Employee::where('user_id', Auth::guard('api')->user()->id)->first();
            $holiday = Holiday::create([
                'branch_id'       => $request->branch_id,
                'employee_id'     => $employee->id,
                'from_date'       => $request->from_date,
                'to_date'         => $request->to_date,
                'reason'          => $request->reason,
                'is_approved'     => 2,
            ]);
            
            //store notifications
            $data =[
                'title'      => 'طلب اجازة',
                'body'       => 'تم انشاء طلب اجازة بواسطة',
                'user_id'    =>  Auth::guard('api')->user()->id,
                'created_at' =>  date('d-m-y , g:i:a',strtotime($holiday->created_at)),
            ];

            $users = User::where('id',1)->first();
            Notification::send($users, new UserNotification($data));

            return $this->returnSuccessMessage(__('messages.The Holiday Request Sent Successfully'));
           
        }
        }catch (\Exception $ex) {
        return $this->returnError($ex->getCode(), $ex->getMessage());
        }

       
       
    }

    public function uploadVideo(Request $request){
        try {
            $rules = [
                'media'          => "required|mimes:mp4,ogx,oga,ogv,ogg,webm,x-ms-wmv,x-flv|max:10000",
            ];
            $validator = Validator::make($request->all(), $rules,[
                'media.required'           => __('messages.The media is required'),
                'media.mimes' => __('messages.The media must be mp4,ogx,oga,ogv,ogg,webm,x-ms-wmv,x-flv'),
                'media.max'           => __('messages.The media must be 10 mb'),
            ]);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            else{
                if($request->hasfile('media')){
                    $media = uploadImage('media/videos', $request->media);
                }
                $employee = Employee::where('user_id', Auth::guard('api')->user()->id)->first();
                    Media::create([
                        'media'         => $media,
                        'type'          => 1,
                        'employee_id'   => $employee->id,
                        'is_active'     => 1,
                    ]);

             
                return $this->returnSuccessMessage(__('messages.The media upload Successfully'));
               
            }
            }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
            }
    }

    public function uploadAudio(Request $request){
        try {
            $rules = [
                'media'          => "required|mimes:mpeg,mpga,mp3,wav|max:5000",
            ];
            $validator = Validator::make($request->all(), $rules,[
                'media.required'           => __('messages.The audio is required'),
                'media.mimes' => __('messages.The audio must be mpeg,mpga,mp3,wav'),
                'media.max'           => __('messages.The audio must be 5 mb'),
            ]);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            else{
                if($request->hasfile('media')){
                    $media = uploadImage('media/audios', $request->media);
                }
                $employee = Employee::where('user_id', Auth::guard('api')->user()->id)->first();
                Media::create([
                    'media'         => $media,
                    'type'          => 0,
                    'employee_id'   => $employee->id,
                    'is_active'     => 1,
                ]);
                return $this->returnSuccessMessage(__('messages.The audio upload Successfully'));
               
            }
            }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }    
    }

    

    public function all_videos()
    {
            $media = MediaResource::collection(Media::where('type',1)->get());
             return $this->returnData('media', $media);
    }

    public function all_audios()
    {
            // $id = Auth::guard('api')->user()->id;
            // $audios = Media::where('employee_id',$id)->where('type',0)->get();
            // return $this->returnData('audios', $audios);
            $media = MediaResource::collection(Media::where('type',0)->get());
            return $this->returnData('media', $media);
    }
    
    public function all_holiday()
    {
            $employee = Employee::where('user_id', Auth::guard('api')->user()->id)->first();
            $holiday = Holiday::where('employee_id',$employee->id )->get();
            return $this->returnData('holiday', $holiday);
    }

    public function user_profile(){
     
        $data = new LoginResource(User::where('id',Auth::guard('api')->user()->id)->first());
        return $this->returnData('user_profile', $data);
    }

    public function all_branchs(){

        $branches = Branch::get();
        return $this->returnData('branches', $branches);


    }

    public function attendance(AttendanceApiRequest $request){
        // calculte the date and time that employee attend
        date_default_timezone_set('Africa/Cairo'); // set your default timezone
        $date = date('Y-m-d');
        $time = date('H:i:s');
        // calculte the late time of the employee
        $lateTime = Setting::first()->checkin_time;    
            if(strtotime($time) > strtotime($lateTime))
            {
                $checkTime = strtotime($lateTime);
                $loginTime = strtotime($time);
                $diff = $loginTime - $checkTime;
                $time_late = round(abs($diff)/ 60);          
            }
        $employee = Employee::where('user_id', Auth::guard('api')->user()->id)->first(); 
        $attendances = Attendance::create([
            'employee_id'                      => $employee->id , 
            'branch_id'                        => (($employee->type == 2 || $employee->type  == 4 ) ?   null  : $request->branch_id ),
            'lat'                              => $request->lat,
            'lang'                             => $request->lang,
            'date'                             => $date,
            'checkin'                          => $time,
            'late_time'                        => $time_late ?? '',
            'status'                           => 1,       
        ]);
        $attendances = new AttendanceResource($attendances);
        return $this->returnData('attendances',$attendances, __('messages.attendances sent Successfully')); 
       
    }



    public function all_notifications(){
        
        $notifications = Notification::where('user_id',Auth::guard('api')->user()->id)->get();
         return $this->returnData('notifications', $notifications);
        
    }
    
    public function deleteNotification($id){
        $notification = Notification::find($id);
        if( $notification)
        {
           $notification->delete(); 
           return $this->returnSuccessMessage(__('messages.Notification Deleted Successfully'));
        }
       else{
           return $this->returnSuccessMessage(__('Notification not found '));
       }
         
        
        
        
    }
    
    public function change_location(ChangeBranchLocationRequest $request ){
        
       
        $branche= Branch::find($request->branch_id);
        $branche->update([
            'longitude'=> $request->longitude,
            'latitude' => $request->latitude
            
            ]);
        return $this->returnData('branche', $branche);

        
    }



 
}
