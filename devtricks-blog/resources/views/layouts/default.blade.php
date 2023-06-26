<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <link rel="stylesheet" href="{{asset('fontend/fontawesome/css/all.min.css')}}">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Styles -->
    <link href="{{ asset('fontent/css/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fontend/css/media.css')}}">
</head>
<body class="srollbar-site">
<section id="app" class="page-site">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</section>
<div class="configuration-mode">
    <button id="setting" class="configcode">
        <i class="far fa-cog"></i>
</div>
<div id="fb-root"></div>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="107660150866110">
</div>
<!-- Load Facebook SDK for JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('fontend/js/splitting.js')}}"></script>
<script src="{{asset('fontend/js/prism.min.js')}}"></script>
<script src="{{asset('fontend/js/garden.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('fontend/js/script.js')}}"></script>
<!-- Scripts -->
@yield('script')
</body>
</html>
