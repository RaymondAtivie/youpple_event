@extends('admin.layout.default')
@section('title')
    Dashboard
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Dashboard
        </h3>
        <span class="sub-title">Welcome to Youpple Events</span>
    </div>

    <div class="wrapper">
        <h1>Welcome to Youpple Event Dashboard</h1>
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
