<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\Company\UI\API\Transformers\CompanyTransformer;
use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;

/**
 * Class UserPrivateProfileTransformer.
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 */
class UserPrivateProfileTransformer extends Transformer
{

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'roles',
        'company'
    ];

    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @param \App\Containers\User\Models\User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        $response = [
            'object'               => 'User',
            'id'                   => $user->getHashedKey(),
            'name'                 => $user->name,
            'email'                => $user->email,
            'plan'                 => $user->plan,
            'status'               => $user->status,
            'created_at'           => $user->created_at,
            'updated_at'           => $user->updated_at,
            'readable_created_at'  => $user->created_at->diffForHumans(),
            'readable_updated_at'  => $user->updated_at->diffForHumans(),
        ];

        $response = $this->ifAdmin([
            'real_id'    => $user->id,
            'deleted_at' => $user->deleted_at,
        ], $response);

        return $response;
    }

    public function includeRoles(User $user)
    {
        return $this->collection($user->roles, new RoleTransformer());
    }


    public function includeCompany(User $user)
    {
        return $this->item($user->company, new CompanyTransformer());
    }
}
