<?php

namespace App;

use App\Doctor;
use App\Patient;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subuser_id', 'subuser_type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the sub-user associated with this user (doctor or patient)
     *
     */
    public function subuser()
    {
        return $this->morphTo();
    }
}
