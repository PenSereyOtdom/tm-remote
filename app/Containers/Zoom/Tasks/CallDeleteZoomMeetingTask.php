<?php

namespace App\Containers\Zoom\Tasks;

use App\Ship\Parents\Tasks\Task;

class CallDeleteZoomMeetingTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($data)
    {
        $meeting_id = $data['meeting_id'];
        $token = env('ZOOM_TOKEN');
        $url = "https://api.zoom.us/v2/meetings/".$meeting_id;
        $authorization = "Authorization: Bearer ".$token;
        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array($authorization));
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result);
    }
}
