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
        {{-- <h1>Welcome to Youpple Event Dashboard</h1> --}}

        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-send"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">{{$totalEvents}}</h1>
                        <p>Total Events</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-send"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">{{$onEvents}}</h1>
                        <p>Todays Events</p>
                    </div>
                </section>
            </div>

            <div class="col-lg-3 col-sm-6">
                <section class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-send"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">{{$futureEvents}}</h1>
                        <p>Upcoming Events</p>
                    </div>
                </section>
            </div>

            <div class="col-lg-3 col-sm-6">
                <section class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-send"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">{{$pastEvents}}</h1>
                        <p>Past Events</p>
                    </div>
                </section>
            </div>
        </div>

        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel green">
                    <div class="symbol">
                        <i class="fa fa-tag"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">{{$totalTickets}}</h1>
                        <p>Total Tickets Sold</p>
                    </div>
                </section>
            </div>

            <div class="col-lg-3 col-sm-6">
                <section class="panel green">
                    <div class="symbol">
                        <i class="fa fa-tag"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">₦{{number_format($totalTicketSales)}}</h1>
                        <p>Total Ticket Sales</p>
                    </div>
                </section>
            </div>
        </div>

        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel blue">
                    <div class="symbol">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">{{$totalUsers}}</h1>
                        <p>Total Users</p>
                    </div>
                </section>
            </div>

            <div class="col-lg-3 col-sm-6">
                <section class="panel blue">
                    <div class="symbol">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">{{$totalCustomers}}</h1>
                        <p>Normal Customers</p>
                    </div>
                </section>
            </div>

            <div class="col-lg-3 col-sm-6">
                <section class="panel blue">
                    <div class="symbol">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                        data-speed="1000">{{$totalProviders}}</h1>
                        <p>Service Providers</p>
                    </div>
                </section>
            </div>
        </div>

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
