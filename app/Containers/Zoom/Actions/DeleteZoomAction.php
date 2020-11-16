<?php

namespace App\Containers\Zoom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteZoomAction extends Action
{
    public function run(Request $request)
    {
        $zoom = Apiato::call('Zoom@FindZoomByIdTask', [$request->id]);
        Apiato::call('Zoom@CallDeleteZoomMeetingTask', [$zoom]);
        return Apiato::call('Zoom@DeleteZoomTask', [$request->id]);
    }
}
