<?php

namespace App\Containers\Company\UI\API\Transformers;

use App\Containers\Company\Models\Company;
use App\Containers\Department\UI\API\Transformers\DepartmentTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;

class CompanyTransformer extends Transformer
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
        'user',
        'departments'
    ];

    /**
     * @param Company $entity
     *
     * @return array
     */
    public function transform(Company $entity)
    {
        $response = [
            'object' => 'Company',
            'id' => $entity->getHashedKey(),
            'name'=> $entity->name,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(Company $company)
    {
        return $this->item($company->user, new UserTransformer());
    }

    public function includeDepartments  (Company $company) {
        return $this->collection($company->departments, new DepartmentTransformer());
    }
}
