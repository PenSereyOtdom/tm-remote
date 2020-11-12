<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class AuthorizationDefaultUsersSeeder_3
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AuthorizationDefaultUsersSeeder_3 extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Users (with their roles) ---------------------------------------------
        $user = Apiato::call('User@CreateUserByCredentialsTask', [
            false,
            'admin@gmail.com',
            'P@$$word@dmin',
            'Total Master',
            'Super Admin',
        ]);
        $user->assignRole(Apiato::call('Authorization@FindRoleTask', ['admin']));
        $company = Apiato::call('Company@CreateCompanyTask', [array('name'=>'Default Company','user_id'=>$user->id)]);
        $department = Apiato::call('Department@CreateDepartmentTask', [array('name'=>'Default Department','key'=>'0','company_id'=>$company->id)]);
        $department->users()->save($user);


    }
}
