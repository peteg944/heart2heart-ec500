<?php
namespace App\Repositories;
    
use App\Dicom;
use App\Patient;

class DicomRepository
{
    /**
     * Create a new Dicom object with the given information for a certain patient.
     * @param array $data ->the ef values
     * @param Patient $patient
     * @return Dicom
     */
    public function create(array $data, Patient $patient)
    {
        return Dicom::create([
            'patient_id' => $patient->id,
            'actual_edv' => $data['actual_edv'],
            'actual_esv' => $data['actual_esv'],
            'predicted_edv' => $data['predicted_edv'],
            'predicted_esv' => $data['predicted_esv'],
            'ef' => $data['ef'],
        ]);
    }

    /**
     * Delete the Dicom object of this patient
     * @param Patient $patient
     */
    public function deleteForPatient(Patient $patient)
    {
        return Dicom::where('patient_id', $patient->id)
                    ->delete();
    }
}
