<?php

namespace App\Containers\User\Models;

use App\Containers\Authorization\Traits\AuthenticationTrait;
use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\Department\Models\Department;
use App\Containers\Payment\Contracts\ChargeableInterface;
use App\Containers\Payment\Models\PaymentAccount;
use App\Containers\Payment\Traits\ChargeableTrait;
use App\Containers\Zoom\Models\Zoom;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Notifications\Notifiable;

/**
 * Class User.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class User extends UserModel implements ChargeableInterface
{

    use ChargeableTrait;
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'email',
      'password',
      'plan',
      'status',
      'device',
      'platform',
      'confirmed',
      'is_client',
      'department_id'
    ];

    protected $casts = [
        'is_client' => 'boolean',
        'confirmed' => 'boolean',
        'department_id'=> 'integer'
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
    public function paymentAccounts()
    {
        return $this->hasMany(PaymentAccount::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function zooms() {
      return $this->hasMany(Zoom::class);
    }
}
