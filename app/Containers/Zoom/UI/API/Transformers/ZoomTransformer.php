<?php

namespace App\Containers\Zoom\UI\API\Transformers;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Zoom\Models\Zoom;
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
        'user'
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
            'password' => $entity->password,
            'meeting_id'=> $entity->meeting_id,
            'note' => $entity->note,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'host_id' => $entity->host_id,
            'user_id' => $entity->user_id,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
    
    public function includeUser(Zoom $zoom)
    {
        // use `item` with single relationship
        return $this->item($zoom->user, new UserTransformer());
    }
}
