<?php

namespace App\Containers\ZoomUser\Tasks;

use App\Containers\ZoomUser\Data\Repositories\ZoomUserRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateZoomUserTask extends Task
{

    protected $repository;

    public function __construct(ZoomUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
