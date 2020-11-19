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
            'company_id','email'
        ]);

        $company = Apiato::call('Company@FindCompanyByIdTask', [$data['company_id']]);
        $created_zoom_user = Apiato::call('ZoomUser@CallCreateZoomUserTask', [$data,$company->default_zoom_user_type]);
        $data['zoom_user_id'] = $created_zoom_user->id;
        $zoomuser = Apiato::call('ZoomUser@CreateZoomUserTask', [$data]);

        return $zoomuser;
    }
}
