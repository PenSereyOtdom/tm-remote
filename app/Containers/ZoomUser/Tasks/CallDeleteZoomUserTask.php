<?php

namespace App\Containers\ZoomUser\Tasks;

use App\Ship\Parents\Tasks\Task;

class CallDeleteZoomUserTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($data)
    {
        $zoom_user_id = $data['zoom_user_id'];
        $token = env('ZOOM_TOKEN');
        $url = "https://api.zoom.us/v2/users/".$zoom_user_id;
        $authorization = "Authorization: Bearer ".$token;
        $ch = curl_init( $url );
        $payload = json_encode( array( "action"=> 'delete',  "transfer_meeting" => false, "transfer_webinar" => false, "transfer_recording" => false ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array($authorization));
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result);
    }
}
