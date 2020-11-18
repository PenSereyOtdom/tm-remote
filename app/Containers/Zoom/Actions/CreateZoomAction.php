<?php

namespace App\Containers\Zoom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Zooms\Exceptions\TimeSlotBusyException;

class CreateZoomAction extends Action {
    public function run(Request $request) {
        $data = $request->sanitizeInput([
          'topic','start_time','duration','password','note'
        ]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        $zoom_user_to_use = Apiato::call('ZoomUser@GetFreeZoomUserTask', [$user,$data]);


        if (count($zoom_user_to_use)==0) { 
            throw new TimeSlotBusyException();
        }

        $data["zoomuser_id"] = $zoom_user_to_use[0]->zoomuser_id;
        $data["zoom_user_id"] = $zoom_user_to_use[0]->zoom_user_id;
        $data["company_id"] = $zoom_user_to_use[0]->company_id;
        $data['user_id']=$user->id;
        



        $zoom_res = Apiato::call('Zoom@CallCreateZoomMeetingTask', [$data]);
        $zoom = Apiato::call('Zoom@CreateZoomTask', [$data,$zoom_res]);
        return $zoom;
    }
}
