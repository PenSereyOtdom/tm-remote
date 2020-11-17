<?php

namespace App\Containers\Zoom\UI\API\Transformers;

use App\Containers\Company\UI\API\Transformers\CompanyTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Zoom\Models\Zoom;
use App\Containers\ZoomUser\UI\API\Transformers\ZoomUserTransformer;
use App\Ship\Parents\Transformers\Transformer;

class ZoomTransformer extends Transformer
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
        'company',
        'zoomuser'
    ];

    /**
     * @param Zoom $entity
     *
     * @return array
     */
    public function transform(Zoom $entity)
    {
        $response = [
            'object' => 'Zoom',
            'id' => $entity->getHashedKey(),
            'topic' => $entity->topic,
            'join_url' => $entity->join_url,
            'start_time' => $entity->start_time,
            'finish_time' => $entity->finish_time,
            'password' => $entity->password,
            'meeting_id'=> $entity->meeting_id,
            'note' => $entity->note,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
    
    public function includeUser(Zoom $zoom) {
        return $this->item($zoom->user, new UserTransformer());
    }

    public function includeCompany (Zoom $zoom) {
        return $this->item($zoom->company,new CompanyTransformer());
    }

    public function includeZoomuser (Zoom $zoom) {
        return $this->item($zoom->zoomuser,new ZoomUserTransformer());
    }
}
