<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\Hash;

/**
 * Class UpdateUserAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserAction extends Action
{

    /**
     * @param \App\Ship\Transporters\DataTransporter $data
     *
     * @return  \App\Containers\User\Models\User
     */
    public function run(DataTransporter $data): User
    {
        $userData = [
            'name'                 => $data->name,
            'email'                => $data->email,
            'company_name'         => $data->company_name,
            'plan'                 => $data->plan,
            'status'               => $data->status
        ];

        // remove null values and their keys
        $userData = array_filter($userData);

        $user = Apiato::call('User@UpdateUserTask', [$userData, $data->id]);

        return $user;
    }
}
