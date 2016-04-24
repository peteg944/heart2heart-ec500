<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dicom extends Model
{
    /**
     * mass assignable attributes
     * @var array
     */
    protected $fillable = [
        'patient_id','actual_edv','actual_esv','predicted_edv','predicted_esv','ef'
    ];

    /**
     * Get the patient that this dicom result belongs to
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
