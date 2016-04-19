<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /*************/
    /** Doctor **/
    /************/

    /**
     * Show the application registration form for doctors.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegisterDoctor()
    {
        return $this->showRegistrationFormDoctor();
    }

    /**
     * Show the application registration form for doctors.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationFormDoctor()
    {
        if (property_exists($this, 'registerViewDoctor')) {
            return view($this->registerViewDoctor);
        }

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


    /*************/
    /** Patient **/
    /*************/

    /**
     * Show the application registration form for patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegisterPatient()
    {
        return $this->showRegistrationFormPatient();
    }

    /**
     * Show the application registration form for patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationFormPatient()
    {
        if (property_exists($this, 'registerViewPatient')) {
            return view($this->registerViewPatient);
        }

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

    /**
     * Get the guard to be used during registration.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
}
