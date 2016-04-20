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
    </div>
@endsection