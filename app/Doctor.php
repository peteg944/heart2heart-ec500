<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * mass assignable attributes
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','phone','hospital','interests','education'
    ];

    /**
     * Get this doctor's user
     */
    public function user()
    {
        return $this->morphOne('App\User', 'subuser');
    }

    /**
     * Get this doctor's patients
     *
     */
    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}
