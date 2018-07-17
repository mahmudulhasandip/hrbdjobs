<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="/css/icons.css">
	<link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/red/pace-theme-flash.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="/css/chosen.css" />
	<link rel="stylesheet" type="text/css" href="/css/colors/colors.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/css/iziToast.min.css" />
	@stack('css')

	<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<div class="page-loading">
	<img src="/images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
    <!-- Header/Navbar -->
    @include('users.layout.navbar')

    <!-- sections -->
    @yield('content')

    @include('users.layout.alert')

    <!-- footer -->
    @include('users.layout.footer')

</div>

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
				<a class="google-login" href="{{ route('candidate.login.gmail') }}" title=""><i class="fa fa-google"></i></a>
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

<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/modernizr.js" type="text/javascript"></script>
<script src="/js/script.js" type="text/javascript"></script>
<script src="/js/wow.min.js" type="text/javascript"></script>
<script src="/js/slick.min.js" type="text/javascript"></script>
<script src="/js/parallax.js" type="text/javascript"></script>
<script src="/js/select-chosen.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.js"></script>
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

