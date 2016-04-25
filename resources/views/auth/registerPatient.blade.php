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
            <select class="form-control1" id="dob_month" name="dob_month">
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
            <input type="text" class="form-control" id="age" name="age" placeholder="Your age">
            <label for="gender" class="control-label col-sm-2">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
<div class="form-group">
	<label>State</label>
			<select class="form-control" id="state" name="state">
					<option value="AL">AL</option>
					<option value="Ak">AK</option>
					<option value="AS">AS</option>
					<option value="AZ">AZ</option>
					<option value="AR">AR</option>
					<option value="CA">CA</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DE">DE</option>
					<option value="DC">DC</option>
					<option value="FL">FL</option>
					<option value="GA">GA</option>
					<option value="GU">GU</option>
					<option value="HI">HI</option>
					<option value="ID">ID</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="IA">IA</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="ME">ME</option>
					<option value="MD">MD</option>
					<option value="MH">MH</option>
					<option value="MA">MA</option>
					<option value="MI">MI</option>
					<option value="FM">FM</option>
					<option value="MN">MN</option>
					<option value="MS">MS</option>
					<option value="MO">MO</option>
					<option value="MT">MT</option>
					<option value="NE">NE</option>
					<option value="NV">NV</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NY">NY</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="MP">MP</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PW">PW</option>
					<option value="PA">PA</option>
					<option value="PR">PR</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VT">VT</option>
					<option value="VA">VA</option>
					<option value="VI">VI</option>
					<option value="WA">WA</option>
					<option value="WV">WV</option>
					<option value="WI">WI</option>
					<option value="WY">WY</option>
			</select>
</div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit" class="submit action-button" value="Submit" />
        </fieldset>
    </form>
    <script src="/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/js/jQuery.time.js" type="text/javascript"></script>
</body>
</html>
