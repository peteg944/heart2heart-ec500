<?php
namespace App\Repositories;
    
use App\Dicom;

class DicomRepository
{
    /**
     * Create a new Dicom object with the given information for a certain patient.
     * @param array $data ->the ef values
     * @param integer $patient_id ->the id of the target patient
     * @return Dicom
     */
    public function create(array $data, $patient_id)
    {
        return Dicom::create([
            'patient_id' => $patient_id,
            'actual_edv' => $data['actual_edv'],
            'actual_esv' => $data['actual_esv'],
            'predicted_edv' => $data['predicted_edv'],
            'predicted_esv' => $data['predicted_esv'],
            'ef' => $data['ef'],
        ]);
    }
}
