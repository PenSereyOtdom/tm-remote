<?php

namespace App\Containers\ZoomUser\Tasks;

use App\Ship\Parents\Tasks\Task;

class CallCreateZoomUserTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($data, $type) {
        $email = $data['email'];
        $token = env('ZOOM_TOKEN');
        $url = "https://api.zoom.us/v2/users";
        $authorization = "Authorization: Bearer ".$token;
        $ch = curl_init( $url );
        $user_info =  array("type"=>$type,"email"=>$email);
        $payload = json_encode( array("action"=>"create","user_info"=>$user_info) );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$authorization));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result);
    }
}

