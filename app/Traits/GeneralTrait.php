<?php

namespace App\Traits;
use App\Models\Notification;
use App\Models\Order;

trait GeneralTrait
{

    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }


    public function returnSuccessMessage($msg = "OK", $errNum = "200")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ];
    }

    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'errNum' => "200",
            'msg' => $msg,
            $key => $value
        ]);
    }


    //////////////////
    public function returnValidationError($code = "E001", $validator)
    {
        return $this->returnError($code, $validator->errors()->first());
    }


    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }

    public function getErrorCode($input)
    {
       if ($input == "name")
           return 'E001';

      else if ($input == "phone")
            return 'E002';

      else if ($input == "password")
            return 'E003';

      else
            return "";
    }


    function sendWebNotification( $title, $body, $token , $id)
    {
    
        $token = $token;
        $from = "AAAAu0FwkF8:APA91bEdVYmbeKtHUsnqensvpZw-JiBILFl8dKo5qJ7f1azHKjKxNNkuXbcgRWAOq7I5_jkx85xoQd2z8ogRqFPkIeZyEG-hmln35LIbmVpIoUDV4an37UzsyrG84EBq3va82x8ZtksP";
        $msg = array
            (
                'body'      => $body,
                'title'     => $title,
                'receiver'  => 'erw',
                'icon'      => 'https://zawdny.amlakyeg.com/public/images/setting/1644508882.png',/*Default Icon*/
                'vibrate'	=> 1,
                'sound'		=> "http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Kangaroo_MusiQue_-_The_Neverwritten_Role_Playing_Game.mp3",
            );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );

        //store notifications
        Notification::create([
            'user_id'   => $id,
            'title'     => $title,
            'body'      => $body,
            'is_active' => true,
        ]);
        //return redirect('doctor')->with(['success'=> 'Notification Sended Successfully']);
        return $result;



    }

    function userSendWebNotification($title, $body, $token , $id)
    {

        $token = $token;
        $from = "AAAAfXEwyJw:APA91bHl1BfrVdn2fq-GXuA3IE8C6B51PEYOlJfggsGd__oS0fNv7BqwfnEt8Gs5vXkYm7f2AtQqQFncsC7Hlg_672RqFOUvEtiYLsr3p2ZADL11TtXntoMdti1q-IIUrso_NZulvSDG";
        $msg = array
            (
                'body'      => $body,
                'title'     => $title,
                'receiver'  => 'erw',
                'icon'      => 'https://zawdny.amlakyeg.com/public/images/setting/1644508882.png',/*Default Icon*/
                'vibrate'	=> 1,
                'sound'		=> "http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Kangaroo_MusiQue_-_The_Neverwritten_Role_Playing_Game.mp3",
            );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );

        //store in database
        Notification::create([
            'user_id'   => $id,
            'title'     => $title,
            'body'      => $body,
            'is_active' => true,
        ]);
        //return redirect('user')->with(['success'=> 'Notification Sended Successfully']);
        return $result;

    }


    function generateOrderNumber() {
        $number = mt_rand(1000, 9999); // better than rand()

        // call the same function if the barcode exists already
        if (Order::where('code',$number)->exists()) {
            return $this->generateOrderNumber();
        }
        // otherwise, it's valid and can be used
        return $number;
    }


}