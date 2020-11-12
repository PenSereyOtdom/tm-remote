<?php

namespace App\Containers\Department\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDepartmentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name','key','company_id'
        ]);

        return Apiato::call('Department@CreateDepartmentTask', [$data]);
    
    }
}
