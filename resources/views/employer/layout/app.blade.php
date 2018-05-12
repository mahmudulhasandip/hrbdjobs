<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="/css/icons.css">
	<link rel="stylesheet" href="/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="/css/chosen.css" />
	<link rel="stylesheet" type="text/css" href="/css/colors/colors.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    @stack('css')
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
        console.log(window.Laravel);
    </script>
</head>
<body>

<div class="page-loading">
	<img src="/images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
    <!-- Header/Navbar -->
    @include('employer.layout.navbar')

    <!-- sections -->
    @yield('content')

    <!-- footer -->
    @include('employer.layout.footer')

</div>

<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/modernizr.js" type="text/javascript"></script>
<script src="/js/script.js" type="text/javascript"></script>
<script src="/js/wow.min.js" type="text/javascript"></script>
<script src="/js/slick.min.js" type="text/javascript"></script>
<script src="/js/parallax.js" type="text/javascript"></script>
<script src="/js/select-chosen.js" type="text/javascript"></script>
@stack('js')

</body>
</html>
