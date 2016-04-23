<?php

namespace App\Http\Controllers;

use ZipArchive;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;

class DicomController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $python_folder = storage_path() . '/python/';

        // Validate it
        $rules = array(
            'zipfile' => 'mimes:zip',
        );
        $validation = Validator::make($request->all(), $rules);
        if($validation->fails())
        {
            return Response::json([
                'error' => true,
                'message' => $validation->errors->first(),
                'code' => 400,
            ], 400); // HTTP 400 error
        }

        // Move file to storage folder
        $newname = uniqid(rand(), true);
        $newname_with_extension = $newname . '.' . $file->getClientOriginalExtension();
        $file->move($python_folder, $newname_with_extension);

        // Unzip the file
        $zip = new ZipArchive;
        if($zip->open($python_folder . $newname_with_extension) !== TRUE)
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
        $csv_file = fopen($python_folder . 'accuracy.csv', 'r');
        if($csv_file === FALSE)
        {
            // There was an error in opening the csv file
            return Response::json([
                'error' => 'Problem with opening the .csv file.',
                'code' => 400,
            ], 400);
        }

        fgets($csv_file); // get the first line (this is not data)

        // Parse the second line of csv file and get turn into doubles
        //$csv_data = fgetcsv($csv_file, 200, ',');
        $csv_data = fgets($csv_file, 200);

        fclose($csv_file);

        // return success
        return Response::json([
            'message' => $csv_data,
            'code' => 200,
        ], 200); // http 200 success
    }
}
