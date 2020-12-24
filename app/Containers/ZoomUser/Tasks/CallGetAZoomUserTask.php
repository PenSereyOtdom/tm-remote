<?php

namespace App\Containers\ZoomUser\Tasks;

use App\Ship\Parents\Tasks\Task;

class CallGetAZoomUserTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($data)
    {
        $email = $data['email'];
        $token = env('ZOOM_TOKEN');
        $url = "https://api.zoom.us/v2/users/".$email;
        $authorization = "Authorization: Bearer ".$token;
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$authorization));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result);

    }
}
