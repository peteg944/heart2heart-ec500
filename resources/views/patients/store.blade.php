@extends('layouts.doctorarea')

@section('content_patient')
<h3>Add a New Patient</h3>
<form class="form-horizontal" method="post" action="{{ url('/doctor/addpatient') }}">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="firstname" class="control-label col-sm-2">First name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="e.g. Jane">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="control-label col-sm-2">Last name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="e.g. Doe">
        </div>
    </div>
    <div class="form-group">
        <label for="dob_month" class="control-label col-sm-2">Date of birth</label>
        <div class="col-sm-2">
            <select class="form-control" id="dob_month" name="dob_month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" id="dob_day" name="dob_day" placeholder="Day">
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" id="dob_year" name="dob_year" placeholder="Year">
        </div>
    </div>
    <div class="form-group">
        <label for="address" class="control-label col-sm-2">Address</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="address" name="address" placeholder="100 Bay State Road, Boston, MA 02215">
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="control-label col-sm-2">Phone number</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="978-617-7810">
        </div>
    </div>
    <div class="form-group">
        <label for="gender" class="control-label col-sm-2">Gender</label>
        <div class="col-sm-2">
            <select class="form-control" id="gender" name="gender">
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-2">
            <button type="submit" class="btn btn-primary">Submit Patient</button>
            <a href="/doctor"><button type="button" class="btn btn-link">Cancel</button></a>
        </div>
    </div>
</form>
@endsection('content_patient')