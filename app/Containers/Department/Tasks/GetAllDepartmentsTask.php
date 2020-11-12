<?php

namespace App\Containers\Department\Tasks;

use App\Containers\Department\Data\Repositories\DepartmentRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllDepartmentsTask extends Task
{

    protected $repository;

    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
