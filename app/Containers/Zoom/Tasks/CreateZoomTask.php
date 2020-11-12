<?php

namespace App\Containers\Zoom\Tasks;

use App\Containers\Zoom\Data\Repositories\ZoomRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateZoomTask extends Task
{

    protected $repository;

    public function __construct(ZoomRepository $repository)
    {
        $this->repository = $repository;
    }


    public function run(array $data,$zoom_res)
    {
        try {
            $dataToSaveDB = array("user_id"=>$data['user_id'],"topic"=>$zoom_res->topic,"start_time"=>$zoom_res->start_time,"password"=>$zoom_res->password,'join_url'=>$zoom_res->join_url,"note"=>$data['note'],"meeting_id"=>$zoom_res->id,"host_id"=>$zoom_res->host_id);
            return $this->repository->create($dataToSaveDB);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
