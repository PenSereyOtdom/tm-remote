<?php
namespace App\Containers\ZoomUser\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;

class GetFreeZoomUserTask extends Task {

    public function __construct() { }

    public function run($user,$data) {
        $from = date('Y-m-d H:i:s',strtotime($data['start_time']));
        $to = date('Y-m-d H:i:s',strtotime($from."+".$data['duration']." minute"));
        return DB::table('zoomusers')->where('zoomusers.company_id',$user->company_id)->whereNotExists(function ($query) use ($from,$to) {
            $query->select(DB::raw(1))->from('zooms')->whereRaw("zooms.zoomuser_id=zoomusers.id and zooms.start_time <= '".$to."' and zooms.finish_time >= '".$from."'" );
        })->select(['zoomusers.company_id','zoomusers.id as zoomuser_id','zoom_user_id'])->get();
    }
}
