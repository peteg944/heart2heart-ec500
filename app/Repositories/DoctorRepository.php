<?php

namespace App\Repositories;

use App\Doctor;
use App\Patient;

class DoctorRepository
{
    /**
     * Get all of the doctors names in short form, e.g. G. Smith
     *
     * @return Collection
     */
    public function shortNames()
    {
        // Get all doctors
        $docs = Doctor::orderBy('lastname', 'asc')
                    ->select('id','firstname','lastname')
                    ->get();

        // Truncate the first names to the 1st letter
        foreach($docs as $doc)
        {
            $firstname = $doc['firstname'];
            $doc['firstname'] = $firstname[0].'.';
        }

        return $docs;
    }

    public function doctorID($doctor_id)
    {
        return Doctor::where('id', $doctor_id)
                    ->first();
    }
    /**
     * Get the doctor for the given patient.
     * @param Patient $patient
     * @return Doctor
     */
    public function forPatient(Patient $patient)
    {
        // Get the doc
        return Doctor::where('id', $patient->doctor_id)
                    ->first();
    }
}
?>