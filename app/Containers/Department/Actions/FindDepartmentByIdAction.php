<?php

namespace App\Containers\Department\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDepartmentByIdAction extends Action
{
    public function run(Request $request)
    {
        $department = Apiato::call('Department@FindDepartmentByIdTask', [$request->id]);

        return $department;
    }
}
