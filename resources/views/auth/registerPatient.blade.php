<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" media="screen" href="/css/css.css" />
</head>
<body>
    @include('common.errors')
    <form id="msform" action="{{ url('/auth/registerpatient') }}" method="POST">
        {!! csrf_field() !!}
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Personal Details</li>
            <li>Job Details</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Create your account</h2>
            <h3 class="fs-subtitle">This is step 1</h3>
            <input type="text" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Personal Details</h2>
            <h3 class="fs-subtitle">We will never sell it</h3>
            <input type="text" id="firstname" name="firstname" placeholder="First name">
            <input type="text" id="lastname" name="lastname" placeholder="Last name">
            <label for="dob_month" class="control-label col-sm-2">Date of birth</label>
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
            <input type="number" class="form-control" id="dob_day" name="dob_day" placeholder="Day">
            <input type="number" class="form-control" id="dob_year" name="dob_year" placeholder="Year">
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Contact Information</h2>
            <h3 class="fs-subtitle">Address, phone, etc.</h3>
            <input type="text" class="form-control" id="address" name="address" placeholder="100 Bay State Road, Boston, MA 02215">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="978-617-7810">
            <label for="gender" class="control-label col-sm-2">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit" class="submit action-button" value="Submit" />
        </fieldset>
    </form>
    <script src="/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/js/jQuery.time.js" type="text/javascript"></script>
</body>
</html>
