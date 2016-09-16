@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>What We Do</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">What we do</li>
                </ul><!--Breadcrumb End-->
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->


    <!-- Main Content Start -->
    <div class="cp-main-content">

        <!-- Process Content Start-->
        <section class="cp-process-section pd-tb60">
            <div class="container">
                <div class="row">

                    @foreach($logos as $logo)
                        <div class="col-md-3 col-sm-6">
                            <!--Process Box Start-->
                            <div class="cp-process-box">
                                <img src="{{ url('images/'.$logo['link']) }}" style="height: 200px" />

                                <div class="cp-text">
                                    <h3>{{$logo['name']}}</h3>
                                    <p>{{$logo['desc']}}</p>
                                </div>
                            </div><!--Process Box End-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- Process Content End-->

        <!-- Clients Content Variation 2 Start-->
        <section class="cp-clients-section pd-tb60">
            <div class="container">
                <h2>Satisfied Clients</h2>
                <!--Clients Inner Start-->
                <div class="">
                    <div id="cp-testimonial-slider2" class="owl-carousel">

                        @foreach($testimonials as $t)
                            <div class="item cp-clients-inner cp-clients-inner2">
                                <div class="cp-top">
                                    <div class="cp-sm-thumb">
                                        <img src="{{ url('images/'.$t->image) }}" alt="">
                                    </div>
                                    <h5>{{ $t->name }}</h5>
                                    <span>{{ $t->position }}</span>
                                </div>
                                <p>{{ $t->testimony }}</p>
                            </div>
                        @endforeach
                        
                    </div>
                </div><!--Clients Inner End-->
            </div>
        </section><!-- Clients Content Variation 2 End-->

    </div>
    <!-- Main Content End -->
@endsection
