<?php

namespace App\Containers\ZoomUser\Models;

use App\Containers\Company\Models\Company;
use App\Ship\Parents\Models\Model;

class ZoomUser extends Model
{
    protected $table = "zoomusers";
    protected $fillable = [
        'email','first_name','last_name','password','company_id',"zoom_user_id"
    ];

    protected $attributes = [

    ];

    protected $hidden = [
        'password'
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
    protected $resourceKey = 'zoomusers';

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
