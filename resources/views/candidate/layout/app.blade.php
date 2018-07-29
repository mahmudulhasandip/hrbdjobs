<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="">
	<meta name="keywords" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css" />

	<link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="/css/icons.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/css/iziToast.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/red/pace-theme-flash.min.css" />
    <link rel="stylesheet" href="/css/chosen.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"> --}}
    @stack('css')
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/css/colors/colors.css" />


 <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="app">


{{--  <div class="page-loading">
	<img src="/images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div> --}}

<div class="theme-layout" id="scrollup">
    <!-- Header/Navbar -->
    @include('candidate.layout.navbar')

    <!-- sections -->
    @yield('content')
    @include('candidate.layout.alert')

    <!-- footer -->
    @include('candidate.layout.footer')

</div>

@if (Auth::guest())
<div class="account-popup-area signin-popup-box">
    <div class="account-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>User Login</h3>
        <span>Click To Login With User</span>
        <div class="select-user">
            <span id="candidate-login" class="active">Candidate</span>
            <span id="employer-login">Employer</span>
        </div>
        <form id="popup-login" method="post">
            @csrf
            <div class="cfield">
                <input type="text" placeholder="Username" name="username"/>
                <i class="la la-user"></i>
            </div>
            <div class="cfield">
                <input type="password" placeholder="********" name="password" />
                <i class="la la-key"></i>
            </div>
            <p class="remember-label">
                <input type="checkbox" name="remember" id="cb1"><label for="cb1">Remember me</label>
            </p>
            <a href="{{ url('/candidate/password/reset') }}" id="forget-password" title="">Forgot Password?</a>
            <button type="submit">Login</button>
        </form>
        <div class="extra-login">
            <span>Or</span>
            <div class="login-social mb-50">
                <a class="google-login" href="#" title=""><i class="fa fa-google"></i></a>
            </div>
        </div>
    </div>
</div><!-- LOGIN POPUP -->


<div class="account-popup-area signup-popup-box">
    <div class="account-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>Sign Up</h3>
        <!-- Candidate Signup -->
        <div class="card">
            <div class="container">
                <h4 class="text-left text-blue bold"><b>As Candidate</b></h4>
                <p class="text-left">Create your account to manage your profile</p>
                <a href="{{ route('candidate.register') }}" title="" class="signup">Create Account</a>
            </div>
        </div>

        <!-- Employer signup -->
        <div class="card">
                <div class="container">
                    <h4 class="text-left text-red bold"><b>As Employer</b></h4>
                    <p class="text-left">Create your account to manage your profile</p>
                    <a href="{{ route('employer.register') }}" title="" class="signup red">Create Account</a>
                </div>
            </div>
    </div>
</div><!-- SIGNUP POPUP -->

@endif

<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script src="/js/modernizr.js" type="text/javascript"></script>
<script src="/js/script.js" type="text/javascript"></script>
<script src="/js/wow.min.js" type="text/javascript"></script>
<script src="/js/slick.min.js" type="text/javascript"></script>
<script src="/js/parallax.js" type="text/javascript"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.js"></script>
<script src="/js/select-chosen.js" type="text/javascript"></script>
{{-- <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script> --}}
<script>
    $(document).ajaxStart(function() { Pace.restart(); });
</script>

<script>
    var candidateLogin = "{{ url('/candidate/login') }}";
    var employerLogin = "{{ url('/employer/login') }}";

    var candidateForgetPassword = "{{ url('/candidate/password/reset') }}";
    var employerForgetPassword = "{{ url('/employer/password/reset') }}";

    $('#popup-login').on('submit', function(e){
        if($('#candidate-login').hasClass('active')){
            $('#popup-login').attr('action', candidateLogin);
        }else if($('#employer-login').hasClass('active')){
            $('#popup-login').attr('action', employerLogin);
        }
        $('#popup-login').submit();
        e.preventDefault();
    });

    $('#candidate-login').on('click', function(e){
        $('#forget-password').attr('href', candidateForgetPassword);
    });

    $('#employer-login').on('click', function(e){
        $('#forget-password').attr('href', employerForgetPassword);
    });
</script>
@stack('js')

</body>
</html>

