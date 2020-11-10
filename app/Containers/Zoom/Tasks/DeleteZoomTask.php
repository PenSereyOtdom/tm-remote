<?php

namespace App\Containers\Zoom\Tasks;

use App\Containers\Zoom\Data\Repositories\ZoomRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteZoomTask extends Task
{

    protected $repository;

    public function __construct(ZoomRepository $repository)
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
