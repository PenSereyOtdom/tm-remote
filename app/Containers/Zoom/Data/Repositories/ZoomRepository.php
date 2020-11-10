<?php

namespace App\Containers\Zoom\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ZoomRepository
 */
class ZoomRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
