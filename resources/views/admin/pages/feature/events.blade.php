@extends('admin.layout.default')
@section('title')
    Featured Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Featured Events
        </h3>
        <span class="sub-title">Change the featured events of Youpple</span>
    </div>

    <div class="wrapper">

    </div>
@stop
@section('styles')
    <link href="{{ url('') }}/assets/css/tabs_home.css" rel="stylesheet">
@stop
@section('scripts')
    <script src="{{ url('') }}/assets/js/tabs.js"></script>
    <script>
        new CBPFWTabs(document.getElementById('tabs'));
    </script>
@stop
