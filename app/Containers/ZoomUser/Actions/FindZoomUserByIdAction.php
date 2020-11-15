<?php

namespace App\Containers\ZoomUser\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindZoomUserByIdAction extends Action
{
    public function run(Request $request)
    {
        $zoomuser = Apiato::call('ZoomUser@FindZoomUserByIdTask', [$request->id]);

        return $zoomuser;
    }
}
