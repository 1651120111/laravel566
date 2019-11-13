<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lavoro | Home 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css')}} ">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.css')}} ">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/owl.transitions.css')}}">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('fonts/font-icon.css')}}">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/meanmenu.min.css')}}">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('custom-slider/css/nivo-slider.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('custom-slider/css/preview.css') }}" type="text/css" media="screen" />

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css')}}">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.css')}}">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/main.css')}}">

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('style.css')}}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css')}}">

    <script src="{{ URL::asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
 <body class="home-one">

@include('components.header')


<session>
    @if(\Session::has('success'))
        <div class="alert alert-success alert-dismissable" role="alert" style="position: fixed;right: 20px;width: 35%;top: 10%;z-index: 6;height: 64px; font-size: larger;
}">
            <a href="" class="close" aria-label="close" data-dismiss = "alert">&times;</a>
            <strong>Thành công! </strong>{{\Session::get('success')}}
        </div>

    @endif
    @if(\Session::has('warning'))
        <div class="alert alert-warning alert-dismissable" role="alert" style="position: fixed;right: 20px;width: 35%;top: 10%;z-index: 6;height: 64px; font-size: larger;
}">
            <a href="" class="close" aria-label="close" data-dismiss = "alert">&times;</a>
            <strong>Cảnh báo! </strong>{{\Session::get('warning')}}
        </div>

    @endif
        @if(\Session::has('danger'))
            <div class="alert alert-danger alert-dismissable" role="alert" style="position: fixed;right: 20px;width: 35%;top: 10%;z-index: 6;height: 64px; font-size: larger;
}">
                <a href="" class="close" aria-label="close" data-dismiss = "alert">&times;</a>
                <strong>Lỗi! </strong>{{\Session::get('danger')}}
            </div>

        @endif
@yield('content')
</session>

@include("components/footer")

<!-- JS -->

<!-- jquery-1.11.3.min js
============================================ -->
<script src="{{ URL::asset('js/vendor/jquery-1.11.3.min.js') }}"></script>

<!-- bootstrap js
============================================ -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<!-- Nivo slider js
============================================ -->
<script src="{{ URL::asset('custom-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('custom-slider/home.js') }}" type="text/javascript"></script>

<!-- owl.carousel.min js
============================================ -->
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="{{ URL::asset('js/jquery.scrollUp.min.js') }}"></script>

<!-- price-slider js
============================================ -->
<script src="{{ URL::asset('js/price-slider.js') }}"></script>

<!-- elevateZoom js
============================================ -->
<script src="{{ URL::asset('js/jquery.elevateZoom-3.0.8.min.js') }}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{ URL::asset('js/jquery.bxslider.min.js') }}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{ URL::asset('js/jquery.meanmenu.js') }}"></script>

<!-- wow js
============================================ -->
<script src="{{ URL::asset('js/wow.js') }}"></script>

<!-- plugins js
============================================ -->
<script src="{{ URL::asset('js/plugins.js') }}"></script>

<!-- main js
============================================ -->
<script src="{{ URL::asset('js/main.js') }}"></script>
 @yield('script')
</body>
</html>
