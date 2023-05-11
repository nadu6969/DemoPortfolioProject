<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}admin/assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('/') }}admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('/') }}admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('/') }}admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('/') }}admin/assets/css/bootstrap.min.css" id="" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/') }}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/') }}admin/assets/css/app.min.css" id="" rel="stylesheet" type="text/css" />
    <!-- Toastr Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body data-topbar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">


    @include('admin.include.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.include.menu')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        @yield('admin')
        <!-- End Page-content -->

        @include('admin.include.footer')

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
{{--<div class="right-bar">--}}
{{--    <div data-simplebar class="h-100">--}}
{{--        <div class="rightbar-title d-flex align-items-center px-3 py-4">--}}

{{--            <h5 class="m-0 me-2">Settings</h5>--}}

{{--            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">--}}
{{--                <i class="mdi mdi-close noti-icon"></i>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <!-- Settings -->--}}
{{--        <hr class="mt-0" />--}}
{{--        <h6 class="text-center mb-0">Choose Layouts</h6>--}}

{{--        <div class="p-4">--}}
{{--            <div class="mb-2">--}}
{{--                <img src="{{ asset('/') }}admin/assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">--}}
{{--            </div>--}}

{{--            <div class="form-check form-switch mb-3">--}}
{{--                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>--}}
{{--                <label class="form-check-label" for="light-mode-switch">Light Mode</label>--}}
{{--            </div>--}}

{{--            <div class="mb-2">--}}
{{--                <img src="{{ asset('/') }}admin/assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">--}}
{{--            </div>--}}
{{--            <div class="form-check form-switch mb-3">--}}
{{--                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">--}}
{{--                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>--}}
{{--            </div>--}}

{{--            <div class="mb-2">--}}
{{--                <img src="{{ asset('/') }}admin/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">--}}
{{--            </div>--}}
{{--            <div class="form-check form-switch mb-5">--}}
{{--                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">--}}
{{--                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>--}}
{{--            </div>--}}


{{--        </div>--}}

{{--    </div> <!-- end slimscroll-menu-->--}}
{{--</div>--}}
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('/') }}admin/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}admin/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('/') }}admin/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('/') }}admin/assets/libs/node-waves/waves.min.js"></script>


<!-- apexcharts -->
<script src="{{ asset('/') }}admin/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="{{ asset('/') }}admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('/') }}admin/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<!-- Required datatable js -->
<script src="{{ asset('/') }}admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="{{ asset('/') }}admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="{{ asset('/') }}admin/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="{{ asset('/') }}admin/assets/js/app.js"></script>
<!-- Toastr js-->
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
</script>
<!--tinymce js-->
<script src="{{ asset('/') }}admin/assets/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="{{ asset('/') }}admin/assets/js/pages/form-editor.init.js"></script>

<!-- Required datatable js -->
<script src="{{ asset('/') }}admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="{{ asset('/') }}admin/assets/js/pages/datatables.init.js"></script>
<script src="{{ asset('/') }}admin/assets/js/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
