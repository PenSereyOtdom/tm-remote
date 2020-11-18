<?php

namespace App\Containers\ZoomUser\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ZoomUserRepository
 */
class ZoomUserRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
