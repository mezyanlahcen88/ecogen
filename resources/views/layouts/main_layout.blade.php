<!doctype html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" id="generate_csrf" content="{{ csrf_token() }}" />
    <title>@yield('title', 'SupplyFront - Admin & Dashboard') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
   <!-- App favicon -->
   <link rel="shortcut icon" href="{{asset('storage/images/settings/'.getSettings()['favorites_icon'])}}">
@include('layouts.includes.head_css')

</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.partials.main-header')
        <!-- main-header opened -->
<!-- /main-header -->
        <!-- ========== App Menu ========== -->
        @include('layouts.partials.main-sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- container -->
                <div class="container-fluid">
                    <!-- start page title -->
                    @yield('page-header')
                    <!-- end page title -->
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
<!-- Footer opened -->
            @include('layouts.partials.footer')
<!-- Footer closed -->
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
   <!-- Theme Settings -->
   @include('layouts.partials.setting_bar')
    <!-- JAVASCRIPT -->
    @include('layouts.includes.footer-scripts')

</body>
</html>
