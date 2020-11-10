<?php

namespace App\Containers\Zoom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllZoomsAction extends Action
{
    public function run(Request $request)
    {
        $zooms = Apiato::call('Zoom@GetAllZoomsTask', [], ['addRequestCriteria']);

        return $zooms;
    }
}
