@extends('layouts.app')

@section('content')
<label for="doctorlist">Doctors:</label>
<select name="doctorlist">
    @foreach($doctors as $doctor)
        <option value="{{ $doctor->id }}">{{ $doctor->firstname.' '.$doctor->lastname }}</option>
    @endforeach
</select>
@endsection('content')