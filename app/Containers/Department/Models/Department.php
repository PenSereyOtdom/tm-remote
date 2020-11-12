<?php

namespace App\Containers\Department\Models;

use App\Containers\Company\Models\Company;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Department extends Model
{
    protected $fillable = [
        'name','key','company_id'
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
    protected $resourceKey = 'departments';


    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
