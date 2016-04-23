@extends('layouts.patientarea')
@section('tabactive-contactdoctor', 'class="active"')
@section('title', 'Contact Us - Heart2Heart')
@section('content_patient')
<div id="tab-patients">
            <div class="row">
                <div class="col-xs-12 col-s-3 col-md-3">
                    <div class="list-group">
                        @if(count($doctors) > 0)
                            @if(isset($selected))
                                @foreach($doctors as $doctor)
                                    <a class="list-group-item {{ ($doctor->id == $doctor->id) ? "active" : "" }}" href="{{ url('/patient/getdoctor/'.$doctor->id) }}">
                                        <h4>{{ $doctor->lastname.', '.$doctor->firstname }}</h4>
                                    </a>
                               @endforeach
                            @else
                                @foreach($doctors as $doctor)
                                    <a class="list-group-item" href="{{ url('/patient/getdoctor/'.$doctor->id) }}">
                                        <h4>{{ $doctor->lastname.', '.$doctor->firstname }}</h4>
                                    </a>
                               @endforeach
                            @endif
                        @else
                            <h4 class="text-center">No doctors yet</h4>
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
						<h3 class="action-message"><span class="glyphicon glyphicon-hand-left"></span>&nbsp;Select the doctor you want to contact</h3>
                    </div>
                </div> <!-- patient info -->
            </div> <!-- end row -->
        </div>

@endsection('content_patient')