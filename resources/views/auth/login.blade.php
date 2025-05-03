<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--  <h2>all data show/link from login page no need to login for view data...Editable so that i can add production next day also</h2>
    <div><h3>View Hourly Production --->>>Right or left side</h3>
    <h3>Enter Hourly Production</h3>
    <h3>Report</h3>
    <li>full year horly Report important..line wish but floor wise production must total </li>
    <li>buyer style wise later</li>

    </div>  --}}
    <title>Debonair Digital-IE</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="card d-flex flex-column justify-content-bettwen  align-items-center">
    <a href="{{route('hourlyproduction')}}" class="btn btn-primary pull-right"> HOURLY PRODUCTION</a>
   <a href=" {{route('hourlyproduction_summary')}} " class="btn btn-info">Hourly Production Summary</a>
</div>
</div>
    <div class="card card-outline card-primary justify-content-center">
        <div class="card-header text-center">

            <a href="" class="h1"><b>Debonair-IE</b> Login </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            @include('partials.message')
            <form action="{{route('custom.login')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="User ID">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock" onclick="showPassword()"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{--                    <div class="col-8">--}}
                    {{--                        <div class="icheck-primary">--}}
                    {{--                            <input type="checkbox" id="remember" name="remember_me">--}}
                    {{--                            <label for="remember">--}}
                    {{--                                Remember Me--}}
                    {{--                            </label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="col-4 text-center">
                        <button type="submit" id="btn" class="btn btn-primary btn-block">Sign In</button>
                        {{--                        <a href="javascript:void(0)" onclick="document.getElementById('btn').style.fontFamily='Times';rabbi_ajaxquery('Times');--}}
                        {{--">lan</a>--}}
                    </div>
                </div>
            </form>

            {{--            <p class="mb-1">--}}
            {{--                <a href="">I forgot my password</a>--}}
            {{--            </p>--}}
            {{--            <p class="mb-0">--}}
            {{--                <a href="{{route('custom.registration')}}" class="text-center">Register a new membership</a>--}}
            {{--            </p>--}}
        </div>
    </div>
</div>


<script>
    function showPassword() {
        let x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

    }

    window.onload = function () {
        if (typeof history.pushState === "function") {
            history.pushState("jibberish", null, null);
            window.onpopstate = function () {
                history.pushState('newjibberish', null, null);
            };
        } else {
            var ignoreHashChange = true;
            window.onhashchange = function () {
                if (!ignoreHashChange) {
                    ignoreHashChange = true;
                    window.location.hash = Math.random();
                } else {
                    ignoreHashChange = false;
                }
            };
        }
    }
</script>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
