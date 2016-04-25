@extends('layouts.app')

@section('content')

<div class="jumbotron" id="jumbotron-aboutpage1">
    <div class="container">
        <h1 class="text-center">Data Analysis</h1>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <p>Choose the kind of data you want to analyze</p>
            </div>
        </div>
    </div>
</div>
<h1>{{ $patients->lastname.', '.$patients->firstname }}</h1>
@endsection('content')