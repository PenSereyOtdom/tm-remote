<?php

namespace App\Containers\ZoomUser\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllZoomUsersAction extends Action
{
    public function run(Request $request)
    {
        $zoomusers = Apiato::call('ZoomUser@GetAllZoomUsersTask', [], ['addRequestCriteria']);

        return $zoomusers;
    }
}
