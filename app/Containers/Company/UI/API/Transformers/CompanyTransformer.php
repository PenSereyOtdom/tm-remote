<?php

namespace App\Containers\Company\UI\API\Transformers;

use App\Containers\Company\Models\Company;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Zoom\UI\API\Transformers\ZoomTransformer;
use App\Containers\ZoomUser\UI\API\Transformers\ZoomUserTransformer;
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
        'users',
        'zoomusers',
        'zooms'
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
            'default_zoom_user_type'=>$entity->default_zoom_user_type,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(Company $company) {
        return $this->item($company->user, new UserTransformer());
    }

    public function includeUsers  (Company $company) {
        return $this->collection($company->users, new UserTransformer());
    }

    public function includeZooms (Company $company) {
        return $this->collection($company->zooms, new ZoomTransformer());
    }

    public function includeZoomUsers (Company $company) {
        return $this->collection($company->zoomusers, new ZoomUserTransformer());
    }
}
