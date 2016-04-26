<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Repositories\PatientRepository;
use App\Repositories\DicomRepository;


class PublicController extends Controller
{
    /**
     * The patient repository instance.
     *
     * @var PatientRepository
     */
    protected $patients;
        /**
     * Dicom repository
     */
    protected $dicoms;

    /*public searching*/
        public function __construct(PatientRepository $patients,DicomRepository $dicoms)
    {
        $this->patients = $patients;
        $this->dicoms = $dicoms;
    }
    
    public function publicsearch(Request $request)
    {
   		$data = $request->all();
   		$patients = $this->patients->search1($data['state'], $data['age'], $data['gender']);
   		$dicoms = $this->dicoms->dicomID($patients);
    	$data1 = array(
    	'dicoms' => $dicoms,
    	'count'=> count($dicoms),
    	'patients' => $patients,
    	);
        return view('public1.search', $data1);
    }

    
}


