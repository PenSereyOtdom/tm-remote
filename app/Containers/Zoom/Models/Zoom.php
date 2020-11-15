<?php

namespace App\Containers\Zoom\Models;

use App\Containers\Company\Models\Company;
use App\Containers\User\Models\User;
use App\Containers\ZoomUser\Models\ZoomUser;
use App\Ship\Parents\Models\Model;

class Zoom extends Model
{
    protected $table = "zooms";
    
    protected $fillable = [
      'topic',
      'join_url',
      'start_time',
      'finish_time',
      'password',
      'note',
      'duration',
      'meeting_id',
      'user_id',
      'company_id',
      'zoomuser_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
    ];

    protected $dates = [
        'start_time',
        'finish_time',
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'zooms';


    public function user() {
      return $this->belongsTo(User::class);
    }

    public function company() {
      return $this->belongsTo(Company::class);
    }

    public function zoomuser () {
      return $this->belongsTo(ZoomUser::class);
    }

}
