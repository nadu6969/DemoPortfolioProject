<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}frontend/assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/default.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

<!-- preloader-start -->
<div id="preloader">
    <div class="rasalina-spin-box"></div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
@include('frontend.include.header')
<!-- header-area-end -->

<!-- main-area -->
@yield('main')
<!-- main-area-end -->



<!-- Footer-area -->
@include('frontend.include.footer')
<!-- Footer-area-end -->




<!-- JS here -->
<script src="{{ asset('/') }}frontend/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/element-in-view.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/slick.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/ajax-form.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/wow.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/plugins.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif


</body>
</html>

