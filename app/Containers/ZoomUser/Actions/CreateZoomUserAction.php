<?php

namespace App\Containers\ZoomUser\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\ZoomUser\Exceptions\ZoomUserInactiveException;

class CreateZoomUserAction extends Action
{
    public function run(Request $request)
    {

        $data = $request->sanitizeInput([
            'company_id','email'
        ]);

        $zoom_user = Apiato::call('ZoomUser@CallGetAZoomUserTask', [$data]);

        if (isset($zoom_user->code)) {
            if ($zoom_user->code==1001) {
                $company = Apiato::call('Company@FindCompanyByIdTask', [$data['company_id']]);
                $created_zoom_user = Apiato::call('ZoomUser@CallCreateZoomUserTask', [$data,$company->default_zoom_user_type]);
                $data['zoom_user_id'] = $created_zoom_user->id;
                $zoomuser = Apiato::call('ZoomUser@CreateZoomUserTask', [$data]);
                return $zoomuser;
            } 
        }

        if ($zoom_user->status=='active') {
            $zoomuser = Apiato::call('ZoomUser@CreateZoomUserTask', [["email"=>$zoom_user->email,"zoom_user_id"=>$zoom_user->id,"company_id"=>$data['company_id']]]);
            return $zoomuser;
        } else {
            throw new ZoomUserInactiveException();
        }




    }
}
