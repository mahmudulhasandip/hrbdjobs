<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>

    {{-- favicon --}}
    {{-- <link rel="shortcut icon" href="/admin/demo/default/media/img/logo/favicon.ico" /> --}}
    <link rel="shortcut icon" href="/favicon.ico" />

    <!-- Styles -->
    <!--begin::Base Styles -->
    <link href="/admin/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />
    <link href="/admin/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/admin/custom/style.css" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    
    @stack('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
	<!--end::Web font -->
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" >  
    
    <!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

        
        @include('admin.layout.partialLayouts.header')

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            
            @include('admin.layout.partialLayouts.sidebar')

            <div class="m-grid__item m-grid__item--fluid m-wrapper">    
                @yield('content')
            </div>
        </div>
        <!-- end::Body -->
        
        @include('admin.layout.partialLayouts.footer')

	</div>
    <!-- end:: Page -->

    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->
    
    <!--begin::Base Scripts -->
    <script src="/admin/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="/admin/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <!--end::Base Scripts -->   
    <!--begin::Page Resources -->
    <script src="/admin/demo/default/custom/header/actions.js" type="text/javascript"></script>
    @stack('js')
    <!--end::Page Resources -->

</body>
</html>
