<?php

namespace App\Containers\ZoomUser\Tasks;

use App\Containers\ZoomUser\Data\Repositories\ZoomUserRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllZoomUsersTask extends Task
{

    protected $repository;

    public function __construct(ZoomUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
