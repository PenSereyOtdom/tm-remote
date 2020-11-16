<?php

namespace App\Containers\ZoomUser\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateZoomUserAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'first_name','last_name','company_id','password','email'
        ]);

        $created_zoom_user = Apiato::call('ZoomUser@CallCreateZoomUserTask', [$data]);
        $data['zoom_user_id'] = $created_zoom_user->id;
        $zoomuser = Apiato::call('ZoomUser@CreateZoomUserTask', [$data]);

        return $zoomuser;
    }
}
