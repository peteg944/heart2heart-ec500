<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * mass assignable attributes
     */
    protected $fillable = [
        'firstname','lastname','dob_month','dob_day','dob_year','phone','address','gender'
    ];

    /**
     * Get this patient's user
     *
     */
    public function user()
    {
        return $this->morphOne('App\User', 'subuser');
    }

    /**
     * Get this patient's doctor
     */
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    
}
