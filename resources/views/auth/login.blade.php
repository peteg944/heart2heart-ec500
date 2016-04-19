<!DOCTYPE html>
<html>
<head>
    <title>Login to Heart2Heart</title>
    <link href="/css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="login">
        <form action="{{ url('/login') }}" method="POST" id="form">
            {!! csrf_field() !!}
            <div class="logo">Login Your Account</div>
            <div class="login_form">
                <div class="user">
                    <input class="text_value" value="{{ old('email') }}" name="email" type="text" id="username">
                    <input class="text_value" value="" name="password" type="password" id="password">
                </div>
                <input class="button" type="submit" value="GO">
            </div>
            <div class="rememberme">
                <label><input type="checkbox" name="remember"> Remember Me</label>
            </div>
            <div class="signup">
                <a href="/register"><a1>don't have an account?</a1></a>
                <a href="{{ url('/password/reset') }}"><a2>forget password?</a2></a>
            </div>
        </form>
    </div>
</body>
</html>
