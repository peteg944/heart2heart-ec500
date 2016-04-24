<?php

namespace App\Http\Controllers;

use ZipArchive;
use Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;

use App\Patient;
use App\Repositories\DicomRepository;
use App\Repositories\PatientRepository;

class DicomController extends Controller
{
    /**
     * Dicom repository
     */
    private $dicoms;

    /**
     * Patient repository
     */
    private $patients;

    /**
     * Create a new controller instance.
     */
    public function __construct(DicomRepository $dicom_repo, PatientRepository $patient_repo)
    {
        $this->middleware('auth');
        $this->dicoms = $dicom_repo;
        $this->patients = $patient_repo;
    }

    /**
     * Handles a file upload and processes it
     * @param Request $request
     * @param int $patient_id
     * @return Response
     */
    public function upload(Request $request, $patient_id)
    {
        // Get the file and python folder
        $file = $request->file('zipfile');
        $python_folder = storage_path('app/python');
        Log::info("Python folder is: $python_folder");

        // Validate it
        $rules = array(
            'zipfile' => 'mimes:zip',
        );
        $validation = Validator::make($request->all(), $rules);
        if($validation->fails())
        {
            return Response::json([
                'error' => $validation->errors->first(),
                'code' => 400,
            ], 400); // HTTP 400 error
        }

        // Move file to storage folder
        $newname = uniqid(rand(), true);
        $newname_with_extension = $newname . '.' . $file->getClientOriginalExtension();
        $file->move($python_folder, $newname_with_extension);

        // Unzip the file
        $zip = new ZipArchive;
        if($zip->open($python_folder . '/' . $newname_with_extension) !== TRUE)
        {
            // There was an error in unzipping the file
            return Response::json([
                'error' => 'Problem with unzipping the file.',
                'code' => 400,
            ], 400);
        }

        // Extract the zip
        $zip->extractTo($python_folder);
        $zip->close();

        // Run the python program
        //exec('source ~/.bashrc');
        //$output = exec('python ' . $python_folder . 'segment.py'); // execute

        // Now there should be an accuracy.csv file
        if(!file_exists($python_folder . '/accuracy.csv'))
        {
            // There was an error in opening the csv file
            return Response::json([
                'error' => 'Problem with opening the .csv file.',
                'code' => 400,
            ], 400);
        }
        
        $csv_file = fopen($python_folder . '/accuracy.csv', 'r');

        // Parse the second line of csv file and get turn into doubles
        fgets($csv_file); // get the first line (this is not data)
        $csv_data = fgetcsv($csv_file, 200, ','); // second line (has data)
        fclose($csv_file);

        // Get the data
        $actual_edv = floatval($csv_data[1]);
        $actual_esv = floatval($csv_data[2]);
        $predicted_edv = floatval($csv_data[3]);
        $predicted_esv = floatval($csv_data[4]);
        
        $ef = 0;
        if($predicted_edv > 0)
            $ef = 100 * ($predicted_edv - $predicted_esv) / $predicted_edv;

        // Put into array
        $ef_data = array(
            'actual_edv' => $actual_edv,
            'actual_esv' => $actual_esv,
            'predicted_edv' => $predicted_edv,
            'predicted_esv' => $predicted_esv,
            'ef' => $ef,
        );

        // Create dicom object
        $created_dicom = $this->dicoms->create($ef_data, $this->patients->withID($patient_id));

        // Delete files that are unnecessary
        $keep_files = array(
            '.gitignore',
            'accuracy.csv',
            'segment.py',
            'train.csv',
        );

        $files = Storage::allFiles(basename($python_folder));
        Log::info("Found # of files: ".count($files));
        foreach($files as $file)
        {
            //Log::info("Found file: $file");

            if(!in_array(basename($file), $keep_files))
            {
                if(is_dir($file))
                {
                    Storage::deleteDirectory($file);
                    //Log::info("Deleted folder: $file");
                }
                else
                {
                    Storage::delete($file);
                    //Log::info("Deleted file: $file");
                }
            }
        }

        // return success
        return Response::json([
            'message' => 'The file upload was successful!',
            'code' => 200,
        ], 200); // http 200 success
    }

    /**
     * Deletes the Dicom entry for a given patient
     * @param Request $request
     * @param int $patient_id
     * @return Response
     */
    public function delete(Request $request, $patient_id)
    {
        $this_patient = $this->patients->withID($patient_id);

        if($this->dicoms->deleteForPatient($this_patient) === TRUE) // Successful
        {
            return Response::json([
                'message' => 'The data was successfully deleted.',
                'code' => 200,
            ], 200);
        }
        else // Error
        {
            return Response::json([
                'message' => 'There was an error in deleting the data.',
                'code' => 400,
            ], 400);
        }
    }
}
