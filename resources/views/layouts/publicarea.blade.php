@extends('layouts.app')

@section('title', 'Your Patient Profile - Heart2Heart')
@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="patientarea-tabs">
        <li @yield('tabactive-profile') role="presentation">
            <a href="patient">
                <span class="glyphicon glyphicon-user"></span>&nbsp;Your Profile
            </a>
        </li>
        <li @yield('tabactive-contactdoctor') role="presentation">
            <a href="patient/">
                <span class="glyphicon glyphicon-envelope"></span>&nbsp;Contact A Doctor
            </a>
        </li>
        <li @yield('tabactive-aboutheartdisease') role="presentation">
            <a href="patient/introduction">
                <span class="glyphicon glyphicon-question-sign"></span>&nbsp;Introduction About Heart Disease
            </a>
        </li>
        <li @yield('tabactive-contactus') role="presentation">
            <a href="patient/contactus">
                <span class="glyphicon glyphicon-th-list"></span>&nbsp;Contact Us
            </a>
        </li>
    </ul>
    <div id="patientarea">
        @yield('content_patient')
    </div>
</div>
@endsection