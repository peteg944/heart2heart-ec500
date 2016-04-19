<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('introduction', function () {
    return view('intro');
});

// Doctors
Route::get('doctor', 'DoctorController@index');

    Route::get('doctor/getpatient/{patient}', 'DoctorController@show');

    //Route::get('doctor/addpatient', 'DoctorController@getStore');
    //Route::post('doctor/addpatient', 'DoctorController@postStore');

    Route::get('doctor/myprofile', function () {
        return view('doctors/myprofile');
    });

// Patients
Route::get('patient', 'PatientController@index');

// Login, registering routes
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration
Route::get('auth/registerdoctor', 'Auth\AuthController@getRegisterDoctor');
    Route::post('auth/registerdoctor', 'Auth\AuthController@postRegisterDoctor');
Route::get('auth/registerpatient', 'Auth\AuthController@getRegisterPatient');
    Route::post('auth/registerpatient', 'Auth\AuthController@postRegisterPatient');

?>