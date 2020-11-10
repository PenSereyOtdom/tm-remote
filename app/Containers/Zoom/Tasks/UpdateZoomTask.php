<?php

namespace App\Containers\Zoom\Tasks;

use App\Containers\Zoom\Data\Repositories\ZoomRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateZoomTask extends Task
{

    protected $repository;

    public function __construct(ZoomRepository $repository)
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
