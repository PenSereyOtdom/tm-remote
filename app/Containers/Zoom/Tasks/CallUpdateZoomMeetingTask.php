<?php

namespace App\Containers\Zoom\Tasks;

use App\Ship\Parents\Tasks\Task;

class CallUpdateZoomMeetingTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($data)
    {
        $topic = $data['topic'];
        $start_time = $data['start_time'];
        $password = $data['password'];
        $type = 2;
        $token = env('ZOOM_TOKEN');
        $meeting_id = $data['meeting_id'];
        $url = "https://api.zoom.us/v2/meetings/".$meeting_id;
        $authorization = "Authorization: Bearer ".$token;

        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$authorization));

        $payload = json_encode( array( "topic"=> $topic,"type"=>$type, "start_time"=>$start_time,"password"=>$password ) );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result);
    }
}
