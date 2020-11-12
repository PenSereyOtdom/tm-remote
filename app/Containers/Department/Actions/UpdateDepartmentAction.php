<?php

namespace App\Containers\Department\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateDepartmentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name','key'
        ]);

        $department = Apiato::call('Department@UpdateDepartmentTask', [$request->id, $data]);

        return $department;
    }
}
