<?php

namespace App\Containers\Zoom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateZoomAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
          'topic','start_time','password','note'
        ]);
        
        $zoom_db = Apiato::call('Zoom@FindZoomByIdTask', [$request->id]);
        $data['meeting_id'] = $zoom_db['meeting_id'];
        $zoom_res = Apiato::call('Zoom@CallUpdateZoomMeetingTask', [$data]);
        $data['zoom_res']=$zoom_res;
        return Apiato::call('Zoom@UpdateZoomTask', [$request->id, $data]);
    }
}
