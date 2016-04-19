<?php
namespace App\Repositories;

use App\Doctor;

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
}
?>