<?php

namespace App\Containers\Company\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCompanyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name'
        ]);

        $company = Apiato::call('Company@CreateCompanyTask', [$data]);

        return $company;
    }
}
