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
        $user_id = auth('api')->user()->id;
        $data['user_id']=$user_id;

        $company = Apiato::call('Company@CreateCompanyTask', [$data]);

        return $company;
    }
}
