<?php

namespace App\Containers\Department\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDepartmentsAction extends Action
{
    public function run(Request $request)
    {
        $departments = Apiato::call('Department@GetAllDepartmentsTask', [], ['addRequestCriteria']);

        return $departments;
    }
}
