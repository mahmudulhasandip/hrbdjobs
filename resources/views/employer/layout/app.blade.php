<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-flash.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/chosen.css" />
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
<body>

{{--  <div class="page-loading">
	<img src="/images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div> --}}

<div class="theme-layout" id="scrollup">
    <!-- Header/Navbar -->
    @include('employer.layout.navbar')

    <!-- sections -->
    @yield('content')

    @include('employer.layout.alert')

    <!-- footer -->
    @include('employer.layout.footer')

</div>

<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/modernizr.js" type="text/javascript"></script>
<script src="/js/script.js" type="text/javascript"></script>
<script src="/js/wow.min.js" type="text/javascript"></script>
<script src="/js/slick.min.js" type="text/javascript"></script>
<script src="/js/parallax.js" type="text/javascript"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.js"></script>
<script src="/js/select-chosen.js" type="text/javascript"></script>
<script>
        paceOptions = {
            ajax: true, // disabled
            document: true, // disabled
            eventLag: false, // disabled
            elements: {
                
            }
        };
    
</script>
@stack('js')

</body>
</html>

