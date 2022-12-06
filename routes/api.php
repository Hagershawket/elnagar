<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group([
    'middleware' =>['api','ChangeLanguage'],
    
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    
   
   
 
});


Route::get('/all_branchs', [ApiController::class, 'all_branchs']);
Route::post('/change_location', [ApiController::class,'change_location']);

Route::group([
    'middleware' => ['api', 'ChangeLanguage', 'CheckAdminToken:api']
    
], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/holiday', [ApiController::class, 'holiday']);
    Route::post('/uploadVideo', [ApiController::class, 'uploadVideo']);
    Route::post('/uploadAudio', [ApiController::class, 'uploadAudio']);
    Route::get('/all_videos',[ApiController::class,'all_videos']);
    Route::get('/all_audios',[ApiController::class,'all_audios']);
    Route::get('/all_holiday',[ApiController::class,'all_holiday']);
    Route::get('/all_notifications',[ApiController::class,'all_notifications']);
    Route::post('/delete_notification/{id}',[ApiController::class,'deleteNotification']);
    Route::get('/user_profile',[ApiController::class,'user_profile']);
    Route::get('/report',[ApiController::class,'employeeReportByDate']);
    Route::get('/home', [AuthController::class, 'home']);
    Route::post('/attendance', [ApiController::class,'attendance']);
    Route::post('/checkout', [AuthController::class, 'checkout']);
    
   
   

});