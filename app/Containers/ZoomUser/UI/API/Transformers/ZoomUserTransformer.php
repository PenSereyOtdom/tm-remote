<?php

namespace App\Containers\ZoomUser\UI\API\Transformers;

use App\Containers\Company\UI\API\Transformers\CompanyTransformer;
use App\Containers\ZoomUser\Models\ZoomUser;
use App\Ship\Parents\Transformers\Transformer;

class ZoomUserTransformer extends Transformer
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
        'company'
    ];

    /**
     * @param ZoomUser $entity
     *
     * @return array
     */
    public function transform(ZoomUser $entity)
    {
        $response = [
            'object' => 'ZoomUser',
            'id' => $entity->getHashedKey(),
            'email' => $entity->email,
            'zoom_user_id' => $entity->zoom_user_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeCompany (ZoomUser $zoomuser) {
        return $this->collection($zoomuser->company, new CompanyTransformer);

    }
}
