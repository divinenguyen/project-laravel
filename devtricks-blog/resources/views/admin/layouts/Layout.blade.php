<!doctype>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
    @yield('meta')
	<link rel="stylesheet" href="{{asset('')}}backend/vendor/fonts/fontawesome/css/all.css">
	<link rel="stylesheet" href="{{asset('')}}backend/vendor/bootstrap/css/bootstrap.min.css">
	<link href="{{asset('')}}backend/vendor/fonts/circular-std/style.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('')}}backend/libs/css/style.css">
	<link rel="stylesheet" href="{{asset('')}}backend/libs/css/custom.css">
	<script src="{{asset('')}}backend/vendor/jquery/jquery-3.3.1.min.js"></script>
	<script src="{{asset('')}}backend/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="{{asset('')}}backend/vendor/slimscroll/jquery.slimscroll.js"></script>
</head>
<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
	<!-- ============================================================== -->
	<!-- navbar -->
	<!-- ============================================================== -->
        @include('admin.layouts.header')
	<!-- ============================================================== -->
	<!-- end navbar -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- left sidebar -->
	<!-- ============================================================== -->
        @include('admin.layouts.sidebar')
	<!-- ============================================================== -->
	<!-- end left sidebar -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- wrapper  -->
	<!-- ============================================================== -->
	<div class="dashboard-wrapper">
		<div class="container-fluid  dashboard-content">
			<!-- ============================================================== -->
			<!-- pageheader -->
			<!-- ============================================================== -->
                @yield('content')
			<!-- ============================================================== -->
			<!-- end pageheader -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- footer -->
		<!-- ============================================================== -->
		<div class="footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
						&copy; <?php echo date('Y')?> Bản quyền thuộc về <a href="http://divinenguyen.tk/">Nguyễn Thiên Linh</a>.
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end footer -->
		<!-- ============================================================== -->
	</div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="{{asset('')}}backend/libs/js/main-js.js"></script>
<script src="{{asset('')}}backend/ckeditor/ckeditor.js"></script>
@yield('scripts')
</body>
</html>
