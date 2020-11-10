<?php

namespace App\Containers\Zoom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateZoomAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
          'topic','start_time','password','note'
        ]);
        
        $zoom_res = Apiato::call('Zoom@CallCreateZoomMeetingTask', [$data]);
        $data['zoom_res']=$zoom_res;
        $zoom = Apiato::call('Zoom@CreateZoomTask', [$data]);

        return $zoom;
    }
}
