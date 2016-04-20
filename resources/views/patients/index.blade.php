@extends('layouts.patientarea')

@section('tabactive-profile', 'class="active"')
@section('content_patient')
<div class="row">
    <div class="col-md-6 col-s-6 col-xs-12">
        <h1>{{ $patient->firstname.' '.$patient->lastname }}</h1>
        <table>
            <tr><td>Date of birth:</td><td>{{ $months[$patient->dob_month].' '.$patient->dob_day.', '.$patient->dob_year }}</td></tr>
            <tr><td>Gender:</td><td>{{ $patient->gender }}</td></tr>
            <tr><td>Phone number:</td><td>{{ $patient->phone }}</td></tr>
            <tr><td>Home address:</td><td>{{ $patient->address }}</td></tr>
        </table>
        <h3>Your Doctor</h3>
        <p>{{ $mydoctor->firstname.' '.$mydoctor->lastname }}</p>
    </div>
    <div class="col-md-6 col-s-6 col-xs-12">
        <h1>Your Cardiac MRIs</h1>
    </div>
</div>
@endsection('content_patient')