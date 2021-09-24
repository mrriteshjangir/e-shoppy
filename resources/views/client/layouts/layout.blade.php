<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon.ico')}}">

    <!-- Bootstrap4 files-->
    <link href="{{asset('frontend/css/bootstrap.css?v=1.0')}}" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link href="{{asset('frontend/fonts/fontawesome/css/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">
    
    <!-- plugin: fancybox  -->
    <link href="{{asset('frontend/plugins/fancybox/fancybox.min.css')}}" type="text/css" rel="stylesheet">

    <!-- plugin: owl carousel  -->
    <link href="{{asset('frontend/plugins/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/plugins/owlcarousel/assets/owl.theme.default.css')}}" rel="stylesheet">

    <!-- custom style -->
    <link href="{{asset('frontend/css/ui.css?v=1.0')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    <!-- custom javascript -->
    <script src="{{asset('frontend/js/script.js')}}" type="text/javascript"></script>
</head>
<body>
    @include('client.layouts.partials.header')
    @yield('content')
    @include('client.layouts.partials.footer')

    <!-- jQuery -->
    <script src="{{asset('frontend/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    
    <!-- plugin: fancybox  -->
    <script src="{{asset('frontend/plugins/fancybox/fancybox.min.js')}}" type="text/javascript"></script>
    
    <!-- plugin: owl carousel  -->
    <script src="{{asset('frontend/plugins/owlcarousel/owl.carousel.min.js')}}"></script>
    
    <!-- custom javascript -->
    <script src="{{asset('frontend/js/script.js')}}" type="text/javascript"></script>
</body>
</html>