<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Repositories\PatientRepository;
use App\Repositories\DoctorRepository;


class PatientController extends Controller
{
    /**
     * The patient repository instance.
     *
     * @var PatientRepository
     */
    protected $patients;

    /**
     * The doctors repository instance.
     *
     * @var PatientRepository
     */
    protected $doctors;

    /**
     * Create a new controller instance.
     */
    public function __construct(PatientRepository $patients, DoctorRepository $doctors)
    {
        $this->middleware('auth');
        $this->patients = $patients;
        $this->doctors = $doctors;
    }

    /**
     * Get information for myself
     * @param Request $request
     * @return Request
     */
    public function index(Request $request)
    {
        if($request->user()->subuser_type == "App\\Doctor")
            return view('usertypeError', [
                'correct_type' => 'patient',
                ]);

        $data = array(
            'patient' => $request->user()->subuser,
            'mydoctor' => $this->doctors->forPatient($request->user()->subuser),
            'alldoctors' => $this->doctors->shortNames(),
            'months' => array(
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
                ),
            'dicom_data' => $request->user()->subuser->dicom,
            );
        
        return view('patients.index', $data);
    }
    
   
       /**
     * Get list of doctors
     * @param Request $request
     * @return Request
     */
    public function indexdoctor(Request $request)
    {
        if($request->user()->subuser_type == "App\\Doctor")
            return view('usertypeError', [
                'correct_type' => 'patient',
                ]);

        $data = array(
            'doctors' => $this->doctors->shortNames(),
            );
        
        return view('patients.contact', $data);
    }

    /**
     * Get a certain doctor
     * @param int $doctor_id
     * @return Response
     */
public function showdoctor(Request $request, $doctor_id)
    {
        if($request->user()->subuser_type == "App\\Doctor")
            return view('usertypeError', [
                'correct_type' => 'patient',
                ]);

		$this_doctor = $this->patients->doctorID($doctor_id);
		        $data = array(
            'doctors' => $this->doctors->shortNames($request->user()->subuser),
            'selected' => $this->doctors->doctorID($doctor_id),
            );
        return view('patients.showdoctor', $data);
    }

    /**
     * Set this patient's doctor to this doctor
     * @param int $doctor_id
     * @return Response
     */
    public function setDoctor(Request $request, $doctor_id)
    {
        if($request->user()->subuser_type == "App\\Doctor")
            return view('usertypeError', ['correct_type' => 'patient']);

        // Set the new doctor ID
        $this_patient = $request->user()->subuser;
        $this_patient->doctor_id = $doctor_id;
        $this_patient->save();

        // Go back to patient
        return redirect('patient');
    }
    
    /* change the doctor of patient database*/
    public function choosedoctor(Request $request, $doctor_id)
    {
            if($request->user()->subuser_type == "App\\Doctor")
            return view('usertypeError', [
                'correct_type' => 'patient',
                ]);
    	$patient_id = $request->user()->subuser->id;
    	$patients = $this->patients->changedoctor($patient_id, $doctor_id);
		$this_doctor = $this->patients->doctorID($doctor_id);
		        $data = array(
            'doctors' => $this->doctors->shortNames($request->user()->subuser),
            'selected' => $this->doctors->doctorID($doctor_id),
            );
        return view('patients.showdoctor', $data);
    }
    
}


