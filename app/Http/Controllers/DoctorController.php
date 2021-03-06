<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PatientRepository;

class DoctorController extends Controller
{
    /**
     * The patient repository instance.
     *
     * @var PatientRepository
     */
    protected $patients;

    /**
     * Create a new controller instance.
     */
    public function __construct(PatientRepository $patients)
    {
        $this->middleware('auth');
        $this->patients = $patients;
    }
    
    /**
     * Get list of patients
     * @param Request $request
     * @return Request
     */
    public function index(Request $request)
    {
        // If you are a patient then you cannot see this page
        if($request->user()->subuser_type == "App\\Patient")
            return view('usertypeError', [
                'correct_type' => 'doctor',
                ]);
        $data = array(
            'patients' => $this->patients->forDoctor($request->user()->subuser),
            );
        
        return view('doctors.indexpatients', $data);
    }

    public function myprofile(Request $request)
    {
        // If you are a patient then you cannot see this page
        if($request->user()->subuser_type == "App\\Patient")
            return view('usertypeError', [
                'correct_type' => 'doctor',
                ]);
        $data = array(
            'doctor' => $request->user()->subuser,
            );
        
        return view('doctors.myprofile', $data);
    }

    /**
     * Get a certain patient
     * @param int $patient_id
     * @return Response
     */
    public function show(Request $request, $patient_id)
    {
        // If you are a patient then you cannot see this page
        if($request->user()->subuser_type == "App\\Patient")
            return view('usertypeError', [
                'correct_type' => 'doctor',
                ]);

        // Get the patient with this ID
        $this_patient = $this->patients->withID($patient_id);

        // Make sure this is your patient
        if($this_patient->doctor->id != $request->user()->subuser->id)
            return view('doctors.notyourpatient');

        $data = array(
            'patients' => $this->patients->forDoctor($request->user()->subuser), // List of patients
            'selected' => $this_patient,
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
            'dicom_data' => $this_patient->dicom,
            );

        return view('doctors.showpatient', $data);
    }

    /**
     * Get the 'Add Patient' page
     * @param Request $request
     * @return Response
     */
    // public function getStore(Request $request)
    // {
    //     $data = array(
    //         'patients' => $this->patients->forUser($request->user()), // List of patients
    //     );

    //     return view('patients.store', $data);
    // }

    /**
     * Store a new patient in the db
     * @param Request $request
     * @return Response
     */
    // public function postStore(Request $request)
    // {
    //     // Validate the input
    //     $this->validate($request, [
    //         'firstname' => 'required|max:100',
    //         'lastname' => 'required|max:100',
    //         'dob_month' => 'required',
    //         'dob_day' => 'required',
    //         'dob_year' => 'required',
    //         'phone' => 'required|max:100',
    //         'address' => 'required|max:100',
    //         'gender' => 'required|max:10',
    //     ]);

    //     // Create a new patient that belongs to this doctor
    //     $request->user()->doctor->patients()->create([
    //         'firstname' => $request->firstname,
    //         'lastname' => $request->lastname,
    //         'dob_month' => $request->dob_month,
    //         'dob_day' => $request->dob_day,
    //         'dob_year' => $request->dob_year,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'gender' => $request->gender,
    //     ]);

    //     return redirect('/doctor');
    // }
}
