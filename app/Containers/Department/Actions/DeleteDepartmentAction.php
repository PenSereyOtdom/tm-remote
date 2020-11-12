<?php

namespace App\Containers\Department\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDepartmentAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Department@DeleteDepartmentTask', [$request->id]);
    }
}
