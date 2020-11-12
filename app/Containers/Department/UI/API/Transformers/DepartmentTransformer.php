<?php

namespace App\Containers\Department\UI\API\Transformers;

use App\Containers\Company\UI\API\Transformers\CompanyTransformer;
use App\Containers\Department\Models\Department;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;

class DepartmentTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'company',
        'users'
    ];

    /**
     * @param Department $entity
     *
     * @return array
     */
    public function transform(Department $entity)
    {
        $response = [
            'object' => 'Department',
            'id' => $entity->getHashedKey(),
            'name' => $entity->name,
            'key' => $entity->key,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeCompany (Department $department) {
        return $this->item($department->company, new CompanyTransformer());
    }


    public function includeUsers (Department $department) {
        return $this->collection($department->users, new UserTransformer());
    }
}
