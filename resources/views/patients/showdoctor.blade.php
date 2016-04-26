@extends('layouts.patientarea')
@section('tabactive-contactdoctor', 'class="active"')
@section('content_patient')
<div class="container">
	<div id="tab-patients">
            <div class="row">
                <div class="col-xs-122">
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
                    </div>
            	</div> <!-- end row --> 
			<div class="col-xs-12 col-s-9 col-md-9">
				<div class="patient">    
					<h2><img src="/img/person-placeholder.png">{{ $selected->firstname.' '.$selected->lastname }}</h2>
					<div class="row">
    					<div class="col-xs-12 col-s-6 col-md-6">
        					<table class="table">
            					<tr><td>Phone number:</td><td>{{ $selected->phone }}</td></tr>
            					<tr><td>Hospital:</td><td>{{ $selected->hospital }}</td></tr>
            					<tr><td>Interest:</td><td>{{ $selected->interest }}</td></tr>
            					<tr><td>Education:</td><td>{{ $selected->education }}</td></tr>
        					</table>
    					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
					<div class="text-center">
						<a>
							<button class="btn btn-primary" type="button"><span class="
glyphicon glyphicon-envelope"></span>&nbsp;Choose This Doctor</button>
						</a>
					</div>

	</div>
@endsection('content_patient')