<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Youpple
        </title>
        <!-- Css Files Start -->

        @if(isset($pageType))
            <link href="/css/<?php echo $pageType ?>-style.css" rel="stylesheet">
            <link href="/css/<?php echo $pageType ?>-color.css" rel="stylesheet">
        @else
            <link href="/css/style.css" rel="stylesheet">
            <link href="/css/color.css" rel="stylesheet">
        @endif


        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/owl.carousel.css" rel="stylesheet">
        <link href="/css/jquery.bxslider.css" rel="stylesheet">
        <link href="/css/responsive.css" rel="stylesheet">
        <link href="/css/prettyPhoto.css" rel="stylesheet">
        <link href="/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">


        {{-- <link href="{{ elixir('css/all.css') }}" rel="stylesheet"> --}}
        <link href="/css/all.css" rel="stylesheet">


        <!--Font Family Css Start-->
        <link href='https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700italic,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,300italic,400italic,600,600italic,900,700italic,700,200italic' rel='stylesheet' type='text/css'>
        <!-- Css Files End -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body id="app-layout">

        <div class="cp-wrapper">
          @unless(isset($pageType))
            @include('inc/nav')
          @else
            @include('events/nav')
          @endif

            @yield('content')

            @include('inc/footer')
        </div>

        @include('inc/scripts')
        @yield('footer_scripts')
    </body>

</html>
