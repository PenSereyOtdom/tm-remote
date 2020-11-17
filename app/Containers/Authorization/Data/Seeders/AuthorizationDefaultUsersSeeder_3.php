<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato; use App\Ship\Parents\Seeders\Seeder;

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
        Apiato::call('Company@CreateCompanyTask', [array('name'=>'Default Company','user_id'=>null)]);
        $user = Apiato::call('User@CreateUserByCredentialsTask', [
            false,
            'admin@gmail.com',
            'P@$$word@dmin',
            'Total Master',
            'Super Admin',
            null,
            1
        ]);
        $user->assignRole(Apiato::call('Authorization@FindRoleTask', ['admin']));
        Apiato::call('Company@UpdateCompanyTask', [1,array('name'=>'Default Company','user_id'=>1, "default_zoom_user_type"=>1)]);


    }
}
