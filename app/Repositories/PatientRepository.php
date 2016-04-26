<?php

namespace App\Repositories;
    
use App\User;
use App\Doctor;
use App\Patient;
use App\Dicom;

class PatientRepository
{
    /**
     * Get all of the patients for a given doctor.
     *
     * @param  Doctor  $doctor
     * @return Collection
     */
    public function forDoctor(Doctor $doctor)
    {
        return Patient::where('doctor_id', $doctor->id)
                    ->orderBy('lastname', 'asc')
                    ->select('id','firstname','lastname')
                    ->get();
    }

    /**
     * Get a patient with a certain ID
     *
     * @param int $patient_id
     * @return Patient
     */
    public function withID($patient_id)
    {
        return Patient::where('id', $patient_id)
                    ->first();
    }
    
        public function doctorID($doctor_id)
    {
        return Doctor::where('id', $doctor_id)
                    ->first();
    }
    

    /**
     * Get the patient associated with a given user.
     * @param User $user
     * @return Patient
     */
    public function forUser(User $user)
    {
        return Patient::where('id', $user->subuser->id)
                    ->first();
    }
    
    public function search1($state,$age,$gender)
    {
        $docs = Patient::where('state', '=', $state)
                    	  ->where('gender', '=', $gender)
                      	  //->where('age', [intval($age),intval($age)+10])//;
            		//})
            		->select('id','lastname','firstname')
            		->get();

        return $docs;

    }
        public function changedoctor($patient_id, $doctor_id)
    {
        return Patient::where('id', $patient_id)
          		->update(['doctor_id' => $doctor_id]);
    }
}

