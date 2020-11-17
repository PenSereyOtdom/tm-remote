<?php

namespace App\Containers\Company\Models;

use App\Containers\User\Models\User;
use App\Containers\Zoom\Models\Zoom;
use App\Containers\ZoomUser\Models\ZoomUser;
use App\Ship\Parents\Models\Model;

class Company extends Model
{

    protected $table = "companies";

    protected $fillable = [
        'name',
        'default_zoom_user_type',
        'user_id',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'companies';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function users () {
        return $this->hasMany(User::class);
    }

    public function zoomusers() {
        return $this->hasMany(ZoomUser::class);
    }

    public function zooms () {
        return $this->hasMany(Zoom::class);
    }
}
