<?php

namespace App\Containers\ZoomUser\Tasks;

use App\Containers\ZoomUser\Data\Repositories\ZoomUserRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteZoomUserTask extends Task
{

    protected $repository;

    public function __construct(ZoomUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
