<?php

namespace App\Containers\Department\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DepartmentRepository
 */
class DepartmentRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
