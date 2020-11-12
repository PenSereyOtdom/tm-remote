<?php

namespace App\Containers\Company\Models;

use App\Containers\Department\Models\Department;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'user_id'

    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'user_id'=>'integer'

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

    public function departments() {
        return $this->hasMany(Department::class);
    }
}
