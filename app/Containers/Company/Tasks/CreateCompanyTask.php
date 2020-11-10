<?php

namespace App\Containers\Company\Tasks;

use App\Containers\Company\Data\Repositories\CompanyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCompanyTask extends Task
{

    protected $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $user_id = auth('api')->user()->id;
            $data['user_id']=$user_id;

            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
