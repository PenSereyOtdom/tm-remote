<?php

namespace App\Containers\ZoomUser\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteZoomUserAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ZoomUser@DeleteZoomUserTask', [$request->id]);
    }
}
