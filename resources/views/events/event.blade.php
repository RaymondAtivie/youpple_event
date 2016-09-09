@extends('layouts.app')

@section('content')

    @include('inc/flash');


<!-- Main Content Start -->
<div class="cp-main-content">

    <!-- Our Experties Start -->
    <section class="cp-Our-experties pd-tb60">
        <div class="container">
            <div class="row">
                <div class="cp-section-title col-md-12">
                    <h2>Our Featured Events</h2>
                    <strong> Morlem ipsum dolor sit amet, vesena tomosi elit. Ut elit tellus luctus nec.</strong> </div>
                    <div class="cp-ex-slider col-md-12">
                        <div class="experties-slider owl-carousel">

                            @foreach($fEvents as $event)
                                <!-- Item Start -->
                                <div class="slide">
                                    <div class="cp-thumb"> <img src="{{ url('userPhotos/'.$event->image) }}" alt="">
                                        <div class="cp-hover-content">
                                            <p>{{$event->title}}</p>
                                            <a href="{{ url("/events//".$event->id) }}">View More</a> </div>
                                        </div>
                                        <div class="cp-ex-title">
                                            <h3><a href="{{ url("/events//".$event->id) }}">{{$event->title}}</a></h3>
                                        </div>
                                    </div>
                                    <!-- item end -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- Our Experties End -->

            <!-- Our Experties Start -->
            <section class="cp-Our-experties pd-tb60">
                <div class="container">
                    <div class="cp-section-title">
                        <h2>All Events</h2>
                        <strong></strong>
                    </div>

                    <div class="cp-ex-slider row">

                        <?php foreach($events as $event){ ?>
                            <div class="col-md-3 col-sm-6">
                                <!-- Item Start -->
                                <div class="slide">
                                    <div class="cp-thumb"> <img src="{{ url('userPhotos/'.$event->image) }}" alt="">
                                        <div class="cp-hover-content" style="padding-top: 10% !important">
                                            <h3 style="color: white">{{$event->title}}</h3>
                                            <p> <i class="fa fa-map-marker"></i> {{$event->venue[0]}}</p>
                                            <a href="{{ url("/events//".$event->id) }}">View More</a>
                                        </div>
                                    </div>
                                    <div class="cp-ex-title">
                                        <h3><a href="{{ url('/events/1') }}">Hire / Order</a></h3>
                                    </div>
                                </div><!-- item end -->
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </section><!-- Our Experties End -->


            </div>
            <!-- Main Content End -->
        @endsection
