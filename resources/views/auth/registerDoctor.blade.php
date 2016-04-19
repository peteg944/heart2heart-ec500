<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" media="screen" href="/css/css.css" />
</head>
<body>
    @include('common.errors')
    <form id="msform" action="{{ url('/auth/registerdoctor') }}" method="POST">
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
            <input type="text" name="email" placeholder="Email" value="" />
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Personal Details</h2>
            <h3 class="fs-subtitle">We will never sell it</h3>
            <input type="text"id="firstname" name="firstname" placeholder="e.g. Jane" value="Jane">
            <input type="text" id="lastname" name="lastname" placeholder="e.g. Doe" value="Doe">
            <input type="text" name="phone" placeholder="Phone" value="978-123-4567" />
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">job details</h2>
            <h3 class="fs-subtitle">Your information heart disease</h3>
            <input type="text" name="hospital" placeholder="the hospital you work in" value="MGH" />
            <input type="text" name="interests" placeholder="clinical interests" value="Cardiology" />
            <input type="text" name="education" placeholder="medical education" value="Ph.D" />
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit" class="submit action-button" value="Submit" />
        </fieldset>
    </form>
    <script src="/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="/js/jQuery.time.js" type="text/javascript"></script>
</body>
</html>
