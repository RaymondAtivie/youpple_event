@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
<div class="cp-inner-banner">
<div class="container">
    <div class="cp-inner-banner-outer">
    <h2>About Youpple</h2>
        <!--Breadcrumb Start-->
        <ul class="breadcrumb">
        <li><a href="{{ url('index.html') }}">Home</a></li>
        <li class="active">About Us</li>
        </ul><!--Breadcrumb End-->
    </div>
    </div>
</div>
<!-- Inner Banner End -->


  <!-- Main Content Start -->
  <div class="cp-main-content">

    <!-- About Content Start-->
    <section class="cp-about-section pd-tb60">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="cp-about-left">
              <h2>We Arrange Wold’s</h2>
              <strong>Most Celebrated Events</strong>
              <figure class="cp-about-img">
                <img src="{{ url('images/banner/about.jpg') }}" style="width: 555px">
              </figure>
            </div>
          </div>
          <div class="col-md-6">
            <!--About Text Start-->
            <div class="cp-about-text">
              <p>Eventco Management Ageycn must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. </p>

              <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter circumstances occur in which toil and pain can procure him some great pleasure who has any right to find fault with a man who chooses to enjoy a pleasure. occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example.</p>

              <p>Which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man.</p>
              <ul class="cp-about-listed">
                <li>Birthday Parties</li>
                <li>Wedding Arrangements</li>
                <li>Corporate Events</li>
                <li>Proposal Arrange</li>
                <li>Bachelor Parties</li>
                <li>Social Meetings</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section><!-- About Content End-->

    <!-- Process Content Start-->
    <section class="cp-process-section pd-tb60">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <!--Process Box Start-->
            <div class="cp-process-box">
              <img src="{{ url('images/consult/consult_logo_small.png') }}" style="height: 200px" />

              <div class="cp-text">
                <h3>Pple Consult</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris hendrerit fringilla ligula.</p>
              </div>
            </div><!--Process Box End-->
          </div>
          <div class="col-md-3 col-sm-6">
            <!--Process Box Start-->
            <div class="cp-process-box">
              <img src="{{ url('images/event/event_logo_small.png') }}" style="height: 200px" />

              <div class="cp-text">
                <h3>Pple Events</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
              </div>
            </div><!--Process Box End-->
          </div>
          <div class="col-md-3 col-sm-6">
            <!--Process Box Start-->
            <div class="cp-process-box">
              <img src="{{ url('images/fashion/fashion_logo_small.png') }}" style="height: 200px" />
              <div class="cp-text">
                <h3>Pple Fashion</h3>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.</p>
              </div>
            </div><!--Process Box End-->
          </div>
          <div class="col-md-3 col-sm-6">
            <!--Process Box Start-->
            <div class="cp-process-box">
              <img src="{{ url('images/talk/talk_logo_small.png') }}" style="height: 200px" />

              <div class="cp-text">
                <h3>Pple Talk</h3>
                <p>Voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat.</p>
              </div>
            </div><!--Process Box End-->
          </div>
          <div class="col-md-3 col-md-offset-3 col-sm-6">
            <!--Process Box Start-->
            <div class="cp-process-box">
              <img src="{{ url('images/technology/technology_logo_small.png') }}" style="height: 200px" />
              <div class="cp-text">
                <h3>Pple Technology</h3>
                <p>Voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat.</p>
              </div>
            </div><!--Process Box End-->
          </div>
          <div class="col-md-3 col-sm-6">
            <!--Process Box Start-->
            <div class="cp-process-box">
              <img src="{{ url('images/reformers/reformers_logo_small.png') }}" style="height: 200px" />
              <div class="cp-text">
                <h3>Reformers Circle</h3>
                <p>Voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat.</p>
              </div>
            </div><!--Process Box End-->
          </div>
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
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>Paul Anderson</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>Eddy John</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>Niky Bard</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>John Doe</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>John Doe</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>Niky Barad</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>John Doe</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>John Doe</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
            <div class="item cp-clients-inner cp-clients-inner2">
                <div class="cp-top">
                  <div class="cp-sm-thumb">
                    <img src="{{ url('images/test-sm-thumb.jpg') }}" alt="">
                  </div>
                  <h5>Alliay N</h5>
                  <span>Eventco President</span>
                </div>
                <p>Lorem ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis.</p>
            </div>
          </div>
        </div><!--Clients Inner End-->
      </div>
    </section><!-- Clients Content Variation 2 End-->


    <!-- Team Content Start-->
    <section class="cp-team-section pd-tb60">
      <div class="container">
         <div class="cp-section-title">
            <h2>Our Creatives</h2>
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

    <!-- Creative Content Start-->
    <section class="cp-creative-section pd-tb60">
       <div class="container">
         <div class="cp-section-title">
            <h2>Our Partners</h2>
            <strong>Morlem ipsum dolor sit amet, vesena tomosi elit. Ut elit tellus luctus nec.</strong>
        </div>
        <div class="row" style="text-align: center">
            <?php for($i=0;$i<8;$i++){ ?>
            <div class="col-md-3 col-sm-6" style="padding: 10px">
                <img style="height: inherit" src="{{ url('images/test-sm-img-01.jpg') }}" />
            </div>
            <?php } ?>
        </div>
      </div>
    </section><!-- Creative Content End-->

        <!-- Creative Content Start-->
    <section class="cp-creative-section pd-tb60">
       <div class="container">
         <div class="cp-section-title">
            <h2>Our Clients</h2>
            <strong>Morlem ipsum dolor sit amet, vesena tomosi elit. Ut elit tellus luctus nec.</strong>
        </div>
        <div class="row" style="text-align: center">
            <?php for($i=0;$i<8;$i++){ ?>
            <div class="col-md-3 col-sm-6" style="padding: 10px">
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
