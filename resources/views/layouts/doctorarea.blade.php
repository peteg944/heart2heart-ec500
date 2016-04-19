@extends('layouts.app')

@section('title', 'View Patients - Heart2Heart')
@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active" role="presentation">
                <a href="/doctor"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;Patient Management</a>
            </li>
            <li role="presentation">
                <a href="/doctor/myprofile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Your Profile</a>
            </li>
        </ul>
        <div id="tab-patients">
            <div class="row">
                <div class="col-xs-12 col-s-3 col-md-3">
                    <div class="list-group">
                        @if(count($patients) > 0)
                            @if(isset($selected))
                                @foreach($patients as $patient)
                                    <a class="list-group-item {{ ($patient->id == $selected->id) ? "active" : "" }}" href="{{ url('/doctor/getpatient/'.$patient->id) }}">
                                        <h4>{{ $patient->lastname.', '.$patient->firstname }}</h4>
                                    </a>
                               @endforeach
                            @else
                                @foreach($patients as $patient)
                                    <a class="list-group-item" href="{{ url('/doctor/getpatient/'.$patient->id) }}">
                                        <h4>{{ $patient->lastname.', '.$patient->firstname }}</h4>
                                    </a>
                               @endforeach
                            @endif
                        @else
                            <h4 class="text-center">No patients yet</h4>
                        @endif
                    </div> <!-- patient selector -->
                    <!--<div class="text-center">
                        <a href="/doctor/addpatient">
                            <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add a Patient&hellip;</button>
                        </a>
                    </div> -->
                </div>
                <!-- patient info -->
                <div class="col-xs-12 col-s-9 col-md-9">
                    <div class="patient">
                        @yield('content_patient')
                    </div>
                </div> <!-- patient info -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection('content')