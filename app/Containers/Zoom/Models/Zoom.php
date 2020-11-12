<?php

namespace App\Containers\Zoom\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Zoom extends Model
{
    protected $table = "zooms";
    
    protected $fillable = [
      'topic',
      'join_url',
      'start_time',
      'password',
      'user_id',
      'note',
      'meeting_id',
      'host_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
    ];

    protected $dates = [
        'start_time',
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
}
