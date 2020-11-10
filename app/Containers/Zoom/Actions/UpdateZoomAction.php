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
            // add your request data here
        ]);

        $zoom = Apiato::call('Zoom@UpdateZoomTask', [$request->id, $data]);

        return $zoom;
    }
}
