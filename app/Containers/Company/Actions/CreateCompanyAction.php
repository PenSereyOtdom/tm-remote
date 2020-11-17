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
            'name',
            'default_zoom_user_type',
        ]);

        $user_id = auth('api')->id();
        $data['user_id']=$user_id;

        $company = Apiato::call('Company@CreateCompanyTask', [$data]);
        

        
        return $company;
    }
}
