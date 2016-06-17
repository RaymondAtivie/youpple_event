@extends('layouts.app')

@section('content')
<!-- Main Slider Start -->
<div id="homev1-slider" class="owl-carousel">
  <div class="item">
    <div class="cp-slider-thumb"> <img src="{{ url('images/h1-slide1.jpg') }}" alt=""> </div>
    <div class="cp-slider-content">
      <h2></h2>
      <strong>Most Celebrated Events...</strong>
      <p>We are an Event Planning Agency each event and client is<br>
        unique and we believe our services should be as well.</p>
      <a href="quote.html">Get Quick Quote</a> <a href="#">Learn More</a> </div>
  </div>
  <div class="item">
    <div class="cp-slider-thumb"> <img src="{{ url('images/h1-slide1.jpg') }}" alt=""> </div>
    <div class="cp-slider-content">
      <h2>We Arrange World’s</h2>
      <strong>Most Celebrated Events...</strong>
      <p>We are an Event Planning Agency each event and client is<br>
        unique and we believe our services should be as well.</p>
      <a href="quote.html">Get Quick Quote</a> <a href="#">Learn More</a> </div>
  </div>
</div>
<!-- Main Slider End -->

<!-- Main Content Start -->
<div class="cp-main-content">

  <!-- Our Experties Start -->
  <section class="cp-Our-experties pd-tb60">
    <div class="container">
        <div class="cp-section-title">
          <h2>Our Experties</h2>
          <strong> Morlem ipsum dolor sit amet, vesena tomosi elit. Ut elit tellus luctus nec.</strong>
        </div>
        <div class="cp-ex-slider row">
          <div class="col-md-4 col-sm-6">
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

          <div class="col-md-4 col-sm-6">
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

          <div class="col-md-4 col-sm-6">
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

          <div class="col-md-4 col-sm-6">
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

          <div class="col-md-4 col-sm-6">
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

          <div class="col-md-4 col-sm-6">
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

      </div>
    </div>
  </section><!-- Our Experties End -->


</div>
<!-- Main Content End -->

@endsection
