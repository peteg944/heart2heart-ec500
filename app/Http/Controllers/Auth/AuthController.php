<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // from AuthenticatesUsers since we're using/copying those functions
use Illuminate\Support\Facades\Auth; // from AuthenticatesUsers since we're using/copying those functions
use Illuminate\Support\Facades\Lang; // from AuthenticatesUsers since we're using/copying those functions
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\User;
use App\Doctor;
use App\Patient;
use App\Repositories\DoctorRepository;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(DoctorRepository $doctors)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorDoctor(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phone' => 'required|max:20',
            'hospital' => 'required|max:255',
            'interests' => 'required|max:255',
            'education' => 'required|max:255',
        ]);
    }
    protected function validatorPatient(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'dob_month' => 'required|numeric|min:1|max:12',
            'dob_day' => 'required|numeric|min:1|max:31',
            'dob_year' => 'required|numeric|min:1890|max:2016',
            'phone' => 'required|max:20',
            'address' => 'required|max:255',
            'gender' => 'required|max:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * For doctors.
     *
     * @param  array  $data
     * @return User
     */
    protected function createDoctor(array $data)
    {
        // Create the doctor that's associated with this user
        $doctor = Doctor::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'hospital' => $data['hospital'],
            'interests' => $data['interests'],
            'education' => $data['education'],
        ]);

        return User::create([
            'subuser_id' => $doctor->id,
            'subuser_type' => 'App\\Doctor',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * For patients.
     *
     * @param  array  $data
     * @return User
     */
    protected function createPatient(array $data)
    {
        // Create the patient that will be associated with this user
        $patient = Patient::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'dob_month' => $data['dob_month'],
            'dob_day' => $data['dob_day'],
            'dob_year' => $data['dob_year'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'gender' => $data['gender'],
        ]);

        return User::create([
            'subuser_id' => $patient->id,
            'subuser_type' => 'App\\Patient',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /*************************/
    /** Doctor registration **/
    /*************************/

    /**
     * Return the register page for doctors.
     * @param Request $request
     * @return Response
     */
    public function getRegisterDoctor(Request $request)
    {
        return view('auth.registerDoctor');
    }

    /**
     * Handle a doctor registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegisterDoctor(Request $request)
    {
        return $this->registerDoctor($request);
    }

    /**
     * Handle a doctor registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerDoctor(Request $request)
    {
        $validator = $this->validatorDoctor($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->createDoctor($request->all()));

        return redirect($this->redirectPath());
    }


    /**************************/
    /** Patient registration **/
    /**************************/

    /**
     * Return the register page for patients.
     *
     * @param Request $request
     * @return Response
     */
    public function getRegisterPatient(Request $request)
    {
        return view('auth.registerPatient');
    }

    /**
     * Handle a patient registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegisterPatient(Request $request)
    {
        return $this->registerPatient($request);
    }

    /**
     * Handle a patient registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerPatient(Request $request)
    {
        $validator = $this->validatorPatient($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->createPatient($request->all()));

        return redirect($this->redirectPath());
    }
}
