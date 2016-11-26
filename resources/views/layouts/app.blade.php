<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('pageDescription')">
    <meta property="og:image" content="@yield('pageImage')" />
    @if(isset($pageType))
        <link rel="shortcut icon" href="{{url("images/event_favicon.ico")}}" type="image/x-icon">
        <link rel="icon" href="{{url("images/event_favicon.ico")}}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{url("images/home_favicon.ico")}}" type="image/x-icon">
        <link rel="icon" href="{{url("images/home_favicon.ico")}}" type="image/x-icon">
    @endif

    <title>@yield('pageTitle') Youpple</title>
    <!-- Css Files Start -->

    @if(isset($pageType))
        <link href="{{ url('css/'.$pageType.'-style.css') }}" rel="stylesheet">
        <link href="{{ url('css/'.$pageType.'-color.css') }}" rel="stylesheet">
    @else
        <link href="{{ url('css/style.css') }}" rel="stylesheet">
        <link href="{{ url('css/color.css') }}" rel="stylesheet">
    @endif


    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ url('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ url('css/jquery.bxslider.css') }}" rel="stylesheet">
    <link href="{{ url('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ url('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ url('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ url('css/select2.css') }}" rel="stylesheet">


    {{-- <link href="{{ elixir('css/all.css') }}" rel="stylesheet"> --}}
    <link href="{{ url('css/all.css') }}" rel="stylesheet">


    <!--Font Family Css Start-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700italic,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,300italic,400italic,600,600italic,900,700italic,700,200italic' rel='stylesheet' type='text/css'>
    <!-- Css Files End -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    * {
        font-family: "Roboto";
    }
    </style>
</head>
<body id="app-layout">

    <div class="cp-wrapper">
        @unless(isset($pageType))
            @include('inc/nav')
        @else
            @include('events/nav')
        @endif

        {{-- <hr style="clear: both" /> --}}

        @yield('content')

        @include('inc/footer')
    </div>

    @include('inc/scripts')
    @yield('footer_scripts')
    <script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    </script>

    @yield('addThis')

    <script src="{{ url('js/sweetalert.min.js') }}"></script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5835a590e6ab3b03d059d139/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>
