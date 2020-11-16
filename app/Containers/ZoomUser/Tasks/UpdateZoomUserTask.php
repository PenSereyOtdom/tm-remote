<?php

namespace App\Containers\ZoomUser\Tasks;

use App\Containers\ZoomUser\Data\Repositories\ZoomUserRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateZoomUserTask extends Task
{

    protected $repository;

    public function __construct(ZoomUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
