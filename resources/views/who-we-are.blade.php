@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Who we are</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">who we are</li>
                </ul><!--Breadcrumb End-->
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->


    <!-- Main Content Start -->
    <div class="cp-main-content">

        <!-- Team Content Start-->
        <section class="cp-team-section pd-tb60">
            <div class="container">
                <div class="cp-section-title">
                    <h2>Our Team</h2>
                    <strong>{{$taglineT}}</strong>
                </div>
                <div id="cp-team-slider" class="owl-carousel">

                    @foreach($team as $t)
                        <div class="item">
                            <!--Team Item Start-->
                            <div class="cp-team-item">
                                <div class="cp-text">
                                    <h3>{{$t->name}}</h3>
                                    <span>{{$t->position}}</span>
                                    <p>{{$t->summary}}</p>
                                    <ul class="cp-social-links">
                                        @if($t->google)
                                            <li><a target="_blank" href="{{ $t->google }}"><i class="fa fa-google-plus"></i></a></li>
                                        @endif
                                        @if($t->twitter)
                                            <li><a target="_blank" href="{{ $t->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                        @endif
                                        @if($t->linkedin)
                                            <li><a target="_blank" href="{{ $t->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                        @endif
                                        @if($t->facebook)
                                            <li><a target="_blank" href="{{ $t->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                                <figure class="cp-thumb">
                                    <img src="{{ url('images/'.$t->image) }}" alt="" />
                                </figure>
                            </div><!--Team Item End-->
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- Team Content End-->

        <!-- Team Content Start-->
        <section class="cp-team-section pd-tb60">
            <div class="container">
                <div class="cp-section-title">
                    <h2>Our Partners</h2>
                    <strong>{{$taglineP}}</strong>
                </div>
                <div id="cp-partners" class="owl-carousel">

                    @foreach($partners as $p)
                        <div class="item">
                            <!--Team Item Start-->
                            <div class="cp-team-item">
                                <div class="cp-text">
                                    <h3>{{$p->name}}</h3>
                                    <p>{{$p->summary}}</p>
                                </div>
                                <figure class="cp-thumb">
                                    <img src="{{ url('images/'.$p->image) }}" alt="">
                                </figure>
                            </div><!--Team Item End-->
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- Team Content End-->

        <!-- Creative Content Start-->
        <section class="cp-creative-section pd-tb60">
            <div class="container">
                <div class="cp-section-title">
                    <h2>Our Clients</h2>
                    <strong>{{$taglineC}}</strong>
                </div>
                <hr style="clear: both" />

                <div id="owl-demo" style="text-align: center">

                    @foreach($clients as $c)
                        <div class="item" title="{{$c->name}}">
                            <img style="height: inherit" src="{{ url('images/'.$c->image) }}" />
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- Creative Content End-->

        <!-- Creative Content Start-->
        <section class="cp-creative-section cp-process-section">
            <!--Contact Inner Start-->
            <div class="cp-contact-inner pd-tb60">
                <div class="container">
                    <!--Form Box Start-->
                    <div class="cp-form-box">
                        <h3>Please fill this form to contact with us</h3>
                        <form action="form4.php" method="post">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="inner-holder">
                                        <input type="text" placeholder="Your Name" name="name3" required pattern="[a-zA-Z ]+">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="inner-holder">
                                        <input type="text" placeholder="Your Email" name="email3" required pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="inner-holder">
                                        <input type="text" placeholder="Subject" name="subject3" required pattern="[a-zA-Z ]+">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="inner-holder">
                                        <textarea placeholder="Message" name="comment3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="inner-holder cp-btn-holder">
                                        <button type="submit" class="btn-submit" value="Submit" name="submit3">Contact</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--Form Box End-->
                </div>
            </div><!--Contact Inner End-->
            <!--Contact us Map Start-->
            <div class="cp-contact-map">
                <div id="cp_map"></div>
            </div><!--Contact us Map End-->
        </section><!-- Creative Content End-->


    </div>
    <!-- Main Content End -->
@endsection

@section('footer_scripts')
    <script>
    $(document).ready(function() {

        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 5,
            margin: 20,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]

        });

    });
    </script>
@endsection
