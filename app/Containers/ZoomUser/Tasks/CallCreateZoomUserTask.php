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
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $password = $data['password'];
        $token = env('ZOOM_TOKEN');
        $url = "https://api.zoom.us/v2/users";
        $authorization = "Authorization: Bearer ".$token;
        $ch = curl_init( $url );
        $user_info =  array("first_name"=>$first_name,"last_name"=>$last_name,"type"=>$type,"password"=>$password,"email"=>$email);
        $payload = json_encode( array("action"=>"create","user_info"=>$user_info) );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$authorization));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result);
    }
}

