<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="blog">
    <meta name="keywords" content="from idea to code">
    <meta name="author" content="divine nguyen">
    @yield('meta')
    <!-- style -->
    <link rel="stylesheet" href="{{asset('./fontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('./fontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('./fontend/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('./fontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('./fontend/css/popup.css')}}">
    <link rel="stylesheet" href="{{asset('./fontend/css/media.css')}}">
    <!-- color style -->
    <link rel="stylesheet" href="{{asset('./fontend/css/colors/torquoise.css')}}">
    <!-- font -->
    <link href="http://fonts.googleapis.com/css?family=Raleway:700,400,500" rel="stylesheet" type="text/css">
</head>
<body>
<!--PRELOADER ##########################-->
<div id="preloader">
    <div class="loading">
        <div class="loader"></div>
    </div>
</div>
<!--CUSTOM BACKGROUND ##########################-->
<div id="star">
    <canvas class="cover"></canvas>
</div>
@yield('content')
<!-- end sections -->
<!-- script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script data-cfasync="false" src="{{asset('./fontend/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{asset('./fontend/js/jquery.js')}}"></script>
<script src="{{asset('./fontend/js/plugin.min.js')}}"></script>
<script src="{{asset('./fontend/js/modernizr.custom.js')}}"></script>
<script src="{{asset('./fontend/js/animation.js')}}"></script>
<script src="{{asset('./fontend/js/main.js')}}"></script>
@yield('scripts')
</script>
</body>
</html>
