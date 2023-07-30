<?php

namespace App\Traits;



use App\Models\Fcm as FCMModel;

trait FCM {



    private function sendFCM($data) {

        if (!empty($data['fcm_token'])) {

            $fields = array(

                'to' => $data['fcm_token'],

                'content_available' => true,

                'priority' => "high",

                'notification' => array('title' => $data['title'], 'body' => $data['body'], 'sound' => 'default'),

                'data' => $data['data'],

            );


            $this->pushFCMNotification($fields);

        }

    }

    public function pushFCMNotification($fields) {







        $headers = array(



            env('FCM_URL'),



            'Content-Type: application/json',



            'Authorization: key=' . env('FCM_SERVER_KEY')



        );

      



        $ch = curl_init();



        curl_setopt($ch, CURLOPT_URL, env('FCM_URL'));



        curl_setopt($ch, CURLOPT_POST, true);



        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);



        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);



        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));



        $result = curl_exec($ch);


        logger('=========FCM RESULT============', [$result]);



        curl_close($ch);



        if ($result === FALSE) {



            return 0;



        }



        $res = json_decode($result);

       



        logger('=========FCM============', [$res]);



        if (isset($res->success)) {



          

            return $res->success;



        } else {



            return 0;
        }
    }
     public function removeFCMTokenTrait($request){

        $user = \request('jwt.user', new \stdClass());
        $tokenExists = FCMModel::where(['fcm_token'=>$request->fcm_token])->first();
        if (!is_null($tokenExists))
        {
           $res= FCMModel::find($tokenExists->id);
           $res->delete();
           return true;
        }
        return false;

    }

}



