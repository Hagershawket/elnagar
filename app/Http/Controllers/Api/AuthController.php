<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Branch;
use App\Traits\GeneralTrait;
use Validator;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\Models\Attendance;
use App\Models\Holiday;
use App\Models\Setting;
use App\Models\Employee;
use DB;

class AuthController extends Controller
{
    use GeneralTrait;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {   
            try {
                //validation
                $rules = [
                    "job_num"      => "required",
                    "password"     => "required",
                    // "lat"          => "required",
                    // "long"         => "required",
                    "device_id"    => "required",

                ];
                $validator = Validator::make($request->all(), $rules,[
                    'job_num.required'=> __('messages.The job number is required'),
                    'password'=>__('messages.The password is required'),
                    // 'lat'=>__('messages.The lat is required'),
                    // 'long'=>__('messages.The long is required'),
                    'device_id'=>__('messages.The device_id is required'),
                ]);
                if ($validator->fails()) {
                    $code = $this->returnCodeAccordingToInput($validator);
                    return $this->returnValidationError($code, $validator);
                }
                //login
                $credentials = $request->only(['job_num', 'password']);
                if (Auth::guard('api')->attempt([
                        'job_num'          => $request->job_num, 
                         'password'        => $request->password,
                         ]))   
                {
                    $token = Auth::guard('api')->attempt($credentials);  //generate token
                    if (!$token)
                        return $this->returnError('Erorr', __('messages.login information is incorrect'));
                    $user = Auth::guard('api')->user();
                    $type = Employee::where('user_id',Auth::guard('api')->user()->id)->first();
                    $user->update([
                        'firebase_token'     => $request->firebase_token,
                        // 'lat'             => $request->lat,
                        // 'long'            => $request->long,
                    ]);
                   if(  $user->is_active == 1){
                    if($user->device_id == Null){
                        $user->update([
                            'device_id'       => $request->device_id,
                            // 'lat'             => $request->lat,
                            // 'long'            => $request->long,
                        ]);
                        $user->type = $type->type;
                        $user->token = $token;
                        return $this->returnData('user',$user, __('messages.login Successfully')); 
                    }
                
                    elseif ($user->device_id == $request->device_id) {
                        $user->type = $type->type ;
                        $user->token = $token;
                        return $this->returnData('user',$user, __('messages.login Successfully')); 
                    }
                    else {
                        // $user->update([
                        //     'device_id'       => $request->device_id,
                        //     // 'lat'             => $request->lat,
                        //     // 'long'            => $request->long,
                        // ]);
                        // $user->type = $type->type;
                        // $user->token = $token;
                        // return $this->returnData('user',$user, __('messages.login Successfully')); 
                        return $this->returnError('Erorr', __('messages.your phone incorrect'));
                    }
                   }else{
                    return $this->returnError('Not Active', __('messages.Is Account Not Active'));
                   }
                }
                else
                {
                    return $this->returnError('Erorr', __('messages.login information is incorrect'));
                } 
            } catch (\Exception $ex) {
                return $this->returnError($ex->getCode(), $ex->getMessage());
            } 
    }

    public function logout(Request $request)
    {
         $token = $request ->token;
        if($token){
            try {
                JWTAuth::setToken($token)->invalidate(); //logout
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this -> returnError('', __('messages.Something Went Wrongs'));
            }
            return $this->returnSuccessMessage(__('messages.You are Logged out'));
        }else{
            $this -> returnError('', __('messages.Something Went Wrongs'));
        }
    }

    public function checkout(Request $request)
    {
        date_default_timezone_set('Africa/Cairo'); // set your default timezone
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $attendance = Attendance::find($request->attendance_id);
        if ($attendance->status == 1){
            $attendance->update([
                'checkout'  => $time,
                'status'    => 0,
            ]);
            auth('api')->user()->update([
                'is_login'    => 0,
            ]);
            return $this->returnSuccessMessage(__('messages.CheckOut Done Successfully'));
        }else{
            return $this->returnError('123',__('messages.CheckOut Has Done Before'));
        }
       

    }

    public function home(Request $request)
    {
        $month = date('m');
        $employee = Employee::where('user_id', Auth::guard('api')->user()->id)->first();
        $attendance = Attendance::where('employee_id', $employee->id)->whereMonth('date', date('m'))->groupBy('date')->count();
        // $attendance = DB::table('attendances')->groupBy('date')->count();

        $Absence = Holiday::where('employee_id', $employee->id)->count();
        $a = Setting::first();
 
        $home = [
            'user'         => Auth::guard('api')->user()->name,
            'articles'     => $a->articles ?? '',
            'attendance'   => $attendance,
            'Absence'      => $Absence ,
           ];

        return $this->returnData('home',$home);
    }
}