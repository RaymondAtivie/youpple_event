@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Who we are</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('index.html') }}">Home</a></li>
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
                    <strong>Morlem ipsum dolor sit amet, vesena tomosi elit. Ut elit tellus luctus nec.</strong>
                </div>
                <div id="cp-team-slider" class="owl-carousel">
                    <div class="item">
                        <!--Team Item Start-->
                        <div class="cp-team-item">
                            <div class="cp-text">
                                <h3>Lily Anderson Tom</h3>
                                <span>Chief Executive Expert</span>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elitc urabitur blandit tempus.</p>
                                <ul class="cp-social-links">
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                            <figure class="cp-thumb">
                                <img src="{{ url('images/team-img-02.jpg') }}" alt="">
                            </figure>
                        </div><!--Team Item End-->
                    </div>
                    <div class="item">
                        <!--Team Item Start-->
                        <div class="cp-team-item">
                            <div class="cp-text">
                                <h3>Lily Anderson Sam</h3>
                                <span>Chief Executive Expert</span>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elitc urabitur blandit tempus.</p>
                                <ul class="cp-social-links">
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                            <figure class="cp-thumb">
                                <img src="{{ url('images/team-img-01.jpg') }}" alt="">
                            </figure>
                        </div><!--Team Item End-->
                    </div>
                    <div class="item">
                        <!--Team Item Start-->
                        <div class="cp-team-item">
                            <div class="cp-text">
                                <h3>Lily Anderson Harry</h3>
                                <span>Chief Executive Expert</span>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elitc urabitur blandit tempus.</p>
                                <ul class="cp-social-links">
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                            <figure class="cp-thumb">
                                <img src="{{ url('images/team-img-01.jpg') }}" alt="">
                            </figure>
                        </div><!--Team Item End-->
                    </div>
                </div>

            </div>
        </section><!-- Team Content End-->

        <!-- Team Content Start-->
        <section class="cp-team-section pd-tb60">
            <div class="container">
                <div class="cp-section-title">
                    <h2>Our Partners</h2>
                    <strong>These are the people we work with</strong>
                </div>
                <div id="cp-partners" class="owl-carousel">
                    @for($i=0; $i < 5; $i++)
                        <div class="item">
                            <!--Team Item Start-->
                            <div class="cp-team-item">
                                <div class="cp-text">
                                    <h3>Partner {{$i+1}}</h3>
                                    <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elitc urabitur blandit tempus.</p>
                                </div>
                                <figure class="cp-thumb">
                                    <img src="{{ url('images/team-img-01.jpg') }}" alt="">
                                </figure>
                            </div><!--Team Item End-->
                        </div>
                    @endfor
                </div>

            </div>
        </section><!-- Team Content End-->

        <!-- Creative Content Start-->
        <section class="cp-creative-section pd-tb60">
            <div class="container">
                <div class="cp-section-title">
                    <h2>Our Clients</h2>
                    <strong>Morlem ipsum dolor sit amet, vesena tomosi elit. Ut elit tellus luctus nec.</strong>
                </div>
                <hr style="clear: both" />

                <div id="owl-demo" style="text-align: center">
                    <?php for($i=0;$i<10;$i++){ ?>
                        <div class="item">
                            <img style="height: inherit" src="{{ url('images/test-sm-img-01.jpg') }}" />
                        </div>
                        <?php } ?>
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
