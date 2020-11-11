<?php

namespace App\Containers\Company\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $data = array('name'=>'Default Company','user_id'=>1);
        Apiato::call('Company@CreateCompanyTask', [$data]);
    }
}
