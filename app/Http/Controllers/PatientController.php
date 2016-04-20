<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            );
        
        return view('patients.index', $data);
    }
}
