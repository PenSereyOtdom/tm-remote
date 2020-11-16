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
            $dataToSaveDB = array(
                'topic'=>$zoom_res->topic,
                'start_time'=>$zoom_res->start_time,
                'finish_time'=>date('Y-m-d H:i:s',strtotime($data['start_time']."+".$data['duration']." minute")),
                'password'=>$zoom_res->password,
                'join_url'=>$zoom_res->join_url,
                'duration'=>$zoom_res->duration,
                'meeting_id'=>$zoom_res->id,
                'user_id'=>$data['user_id'],
                'note'=>$data['note'],
                'company_id'=>$data['company_id'],
                'zoomuser_id'=>$data['zoomuser_id']
            );
            return $this->repository->create($dataToSaveDB);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
