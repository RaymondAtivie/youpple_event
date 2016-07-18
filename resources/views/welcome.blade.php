@extends('layouts.app')

@section('content')
<style>
    #prevSlide:hover, #nextSlide:hover{
        color: black !important;
    }
</style>
    <!-- Main Content Start -->
    <div class="cp-main-content">
        <!-- Our Experties Start -->
        <section class="cp-Our-experties pd-tb60">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-2" style="text-align: center" id="prevSlide">
                        <div style="margin-top: 100%">
                            <i class="fa fa-5x fa-chevron-left" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="col-md-8">

                        <div id="owl-test">

                            {{-- FIRST SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/main/main_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">About Youpple</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/talk/talk_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="experties-details.html">Youpple Talk</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/event/event_logo.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="{{ url('events') }}">Youpple Events</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/consult/consult_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="experties-details.html">Youpple Consult</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/expert-img-05.jpg') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="experties-details.html">Youpple Shop</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/reformers/reformers_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="experties-details.html">Reformers Circle</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/fashion/fashion_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="experties-details.html">Fashion</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/technology/technology_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="experties-details.html">Technology</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>

                                </div>
                            </div>
                            {{-- FIRST SLIDE END --}}


                            {{-- SECOND SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/main/main_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">About Youpple</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>
                                </div>

                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6 col-md-offset-3">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Who We Are</button>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">What We Do</button>
                                    </div>
                                </div>
                            </div>
                            {{-- SECOND SLIDE END --}}

                            {{-- THIRD SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/consult/consult_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">Pple Consult</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>
                                </div>

                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6 col-md-offset-3">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">About Pple Consults</button>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Get Serviced</button>
                                    </div>
                                </div>
                            </div>
                            {{-- THIRD SLIDE END --}}

                            {{-- FOURTH SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/event/event_logo.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">Pple Events</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>
                                </div>

                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6 col-md-offset-2">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">About Pple Events</button>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Create Event</button>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Order Event Service</button>
                                    </div>
                                </div>
                            </div>
                            {{-- FOURTH SLIDE END --}}

                            {{-- FIFTH SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/fashion/fashion_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">Pple Fashion</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>
                                </div>

                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6 col-md-offset-3">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">About Pple Fashion</button>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Go Shopping</button>
                                    </div>
                                </div>
                            </div>
                            {{-- FIFTH SLIDE END --}}

                            {{-- SIXTH SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/expert-img-05.jpg') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">Pple Shop</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>
                                </div>

                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6 col-md-offset-3">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Go Shopping</button>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Get Serviced</button>
                                    </div>
                                </div>
                            </div>
                            {{-- SIXTH SLIDE END --}}

                            {{-- SEVENTH SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/talk/talk_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">Pple Talk</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>
                                </div>

                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6 col-md-offset-3">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Adeola Speaks</button>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">HiHi</button>
                                    </div>
                                </div>
                            </div>
                            {{-- SEVENTH SLIDE END --}}

                            {{-- 8TH SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/technology/technology_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">Pple Technology</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>
                                </div>

                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6 col-md-offset-3">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">About Pple Technology</button>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Go Shopping</button>
                                    </div>
                                </div>
                            </div>
                            {{-- 8TH SLIDE END --}}

                            {{-- 9TH SLIDE --}}
                            <div class="item">
                                <div class="cp-ex-slider row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Item Start -->
                                        <div class="slide">
                                            <div class="cp-thumb"> <img src="{{ url('images/reformers/reformers_logo_normal.png') }}" alt="">
                                                <div class="cp-hover-content">
                                                    <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                                                    <!--<a href="experties-details.html">Read More</a> -->
                                                </div>
                                            </div>
                                            <div class="cp-ex-title">
                                                <h3><a href="about">Reformers Circle</a></h3>
                                            </div>
                                        </div><!-- item end -->
                                    </div>
                                </div>

                                <div class="cp-ex-slider row">
                                    <div class="col-md-3 col-sm-6 col-md-offset-3">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Donate</button>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <!-- item Start -->
                                        <button class="btn btn-lg btn-block btn-primary">Join a Cause</button>
                                    </div>
                                </div>
                            </div>
                            {{-- 9TH SLIDE END --}}

                        </div>

                    </div>
                    <div class="col-md-2" style="text-align: center;" id="nextSlide">
                        <div style="margin-top: 100%">
                            <i class="fa fa-5x fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>


                {{-- <div class="row">
                    <div class="col-md-3 col-md-offset-3">
                        <button class="btn btn-block" id="prevSlide">Previous</button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-block">Next</button>
                    </div>
                </div> --}}
            </div>
        </section><!-- Our Experties End -->

        <hr style="clear: both" />

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2 col-sm-4">
                    <a class="goSlide" gotoslide="2">
                        <img class="img-responsive img" src="{{ url('images/talk/talk_logo_normal.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-4">
                    <a class="goSlide" gotoslide="3" style="cursor: pointer">
                        <img class="img-responsive img" src="{{ url('images/event/event_logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-4">
                    <a class="goSlide" gotoslide="4" style="cursor: pointer">
                        <img class="img-responsive img" src="{{ url('images/consult/consult_logo_normal.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-4">
                    <a class="goSlide" gotoslide="5" style="cursor: pointer">
                        <img class="img-responsive img" src="{{ url('images/reformers/reformers_logo_normal.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-4">
                    <a class="goSlide" gotoslide="6" style="cursor: pointer">
                        <img class="img-responsive img" src="{{ url('images/fashion/fashion_logo_normal.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-4">
                    <a class="goSlide" gotoslide="7" style="cursor: pointer">
                        <img class="img-responsive img" src="{{ url('images/technology/technology_logo_normal.png') }}" alt="">
                    </a>
                </div>

            </div>
        </div>

    </div>
    <!-- Main Content End -->

@endsection


@section('footer_scripts')
    <script>
    $(document).ready(function(){
        var owl = $("#owl-test");
        owl.owlCarousel({
            loop:true,
            singleItem:true,
            navigation : false,
            items : 1,
            itemsDesktop : false,
            itemsDesktopSmall : false,
            itemsTablet: false,
            itemsMobile : false
        });
        var owlCtrl = $("#owl-test").data('owlCarousel');

        $("#prevSlide").click(function(){
            owlCtrl.prev();
        });
        $("#nextSlide").click(function(){
            owlCtrl.next();
        });

        $(".goSlide").click(function(){
            var slideNo = $(this).attr("gotoslide");
            // owlCtrl.goTo(slideNo);
            owl.trigger('to.owl.carousel', [slideNo, 500]);
        })
    });
    </script>
@endsection
