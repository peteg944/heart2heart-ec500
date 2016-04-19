@extends('layouts.app')

@section('title', 'Uh oh, wrong user type')
@section('content')
<div class="text-center">
    <h1>Uh oh</h1>
    <h2>You have to be a {{ $correct_type }} to navigate to that page.</h2>
    <p>Would you like to <a href="{{ url('/logout') }}">log out?</a></p>
</div>
@endsection('content')
