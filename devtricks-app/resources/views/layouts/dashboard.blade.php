<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     @yield('meta')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/assets')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{asset('/assets')}}/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/assets')}}/libs/css/style.css">
    <link rel="stylesheet" href="{{asset('/assets')}}/vendor/fonts/fontawesome/css/fontawesome-all.css">
    @yield('end_head')
</head>
<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    @include('dashboard.template.dashboard-navigation')
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    @include('dashboard.template.dashboard-sidebar')
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @yield('dashboard-content')
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('dashboard.template.dashboard-footer')
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->

    <!-- Optional JavaScript -->
    <script src="{{asset('/assets')}}/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="{{asset('/assets')}}/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{asset('/assets')}}/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="{{asset('/assets/libs/js/main-js.js')}}"></script>
@yield('scripts')
</body>
</html>
