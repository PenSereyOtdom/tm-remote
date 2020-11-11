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


    public function run(array $data)
    {
        try {
            $zoom_res = $data['zoom_res'];
            $note = $data['note'];
            $user_id = auth()->user()->id;
            $dataToSaveDB = array("topic"=>$zoom_res->topic,"start_time"=>$zoom_res->start_time,"password"=>$zoom_res->password,'join_url'=>$zoom_res->join_url,"note"=>$note,"user_id"=>$user_id,"meeting_id"=>$zoom_res->id,"host_id"=>$zoom_res->host_id);
            return $this->repository->create($dataToSaveDB);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
