<?php

namespace App\Containers\Zoom\Tasks;

use App\Ship\Parents\Tasks\Task;

class CallCreateZoomMeetingTask extends Task
{

    public function __construct() {
        // ..
    }

    public function run($data)
    {
        $topic = $data['topic'];
        $start_time = $data['start_time'];
        $password = $data['password'];
        $type = 2;
        $token = env('ZOOM_TOKEN');
        $url = "https://api.zoom.us/v2/users/".$data['zoom_user_id']."/meetings";
        $authorization = "Authorization: Bearer ".$token;
        $ch = curl_init( $url );
        $settings = array('waiting_room'=>true);
        $payload = json_encode( array( "topic"=> $topic,"type"=>$type, "start_time"=>$start_time,"password"=>$password, 'timezone'=>'UTC','settings'=>$settings ) );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$authorization));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result);
    }
}
