@extends('layouts.app')

@section('title', 'My Profile - Heart2Heart')
@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li role="presentation">
                <a href="/doctor"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;Patient Management</a>
            </li>
            <li class="active" role="presentation">
                <a href="/doctor/myprofile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Your Profile</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-xs-12 col-s-6 col-md-4 col-md-offset-4">
                <h1 class="text-center">{{ $doctor->firstname . ' ' . $doctor->lastname }}</h1>
                <style>
                    #doctor-table tr td:first-child {
                        text-align: right;
                    }
                </style>
                <table class="table" id="doctor-table">
                    <tr><td>Phone number:</td><td>{{ $doctor->phone }}</td></tr>
                    <tr><td>Hospital:</td><td>{{ $doctor->hospital }}</td></tr>
                    <tr><td>Interest:</td><td>{{ $doctor->interests }}</td></tr>
                    <tr><td>Education:</td><td>{{ $doctor->education }}</td></tr>
                </table>
            </div>
        </div>
    </div>
@endsection