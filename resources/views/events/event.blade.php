@extends('layouts.app')

@section('content')
<!-- Main Slider Start -->
<div id="homev2-slider" class="owl-carousel">
  <div class="item">
    <div class="cp-slider-thumb"> <img src="/images/h1-slide5.jpg" alt=""> </div>
    <div class="container">
       <div class="cp-slider-content">
        <h2>We <span>Arrange</span> World’s </h2>
        <strong>Most Celebrated <span>Events...</span></strong>
        <p>We are an Event Planning Agency each event and client is unique and we believe our services should be as well.</p>
        <a href="quote.html">Get Quick Quote</a> <a href="#">Learn More</a>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="cp-slider-thumb"> <img src="/images/h1-slide6.jpg" alt=""> </div>
    <div class="container">
       <div class="cp-slider-content">
        <h2>We <span>Arrange</span> World’s </h2>
        <strong>Most Celebrated <span>Events...</span></strong>
        <p>We are an Event Planning Agency each event and client is unique and we believe our services should be as well.</p>
        <a href="quote.html">Get Quick Quote</a> <a href="#">Learn More</a>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="cp-slider-thumb"> <img src="/images/h1-slide7.jpg" alt=""> </div>
    <div class="container">
       <div class="cp-slider-content">
        <h2>We <span>Arrange</span> World’s </h2>
        <strong>Most Celebrated <span>Events...</span></strong>
        <p>We are an Event Planning Agency each event and client is unique and we believe our services should be as well.</p>
        <a href="quote.html">Get Quick Quote</a> <a href="#">Learn More</a>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="cp-slider-thumb"> <img src="/images/h1-slide4.jpg" alt=""> </div>
    <div class="container">
       <div class="cp-slider-content">
        <h2>We <span>Arrange</span> World’s </h2>
        <strong>Most Celebrated <span>Events...</span></strong>
        <p>We are an Event Planning Agency each event and client is unique and we believe our services should be as well.</p>
        <a href="quote.html">Get Quick Quote</a> <a href="#">Learn More</a>
      </div>
    </div>
  </div>
</div>
<!-- Main Slider End -->

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

          <?php for($i=0;$i<6;$i++){ ?>
            <!-- Item Start -->
            <div class="slide">
              <div class="cp-thumb"> <img src="/images/ex1.jpg" alt="">
                <div class="cp-hover-content">
                  <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                  <a href="experties-details.html">Read More</a> </div>
              </div>
              <div class="cp-ex-title">
                <h3><a href="/events/1">Event <?php echo $i ?></a></h3>
              </div>
            </div>
            <!-- item end -->
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </section><!-- Our Experties End -->

  <!-- Our Experties Start -->
  <section class="cp-Our-experties pd-tb60">
    <div class="container">
        <div class="cp-section-title">
          <h2>Events Service Providers</h2>
          <strong>Featured</strong>
        </div>

        <div class="cp-ex-slider row">

          <?php for($i=0;$i<20;$i++){ ?>
          <div class="col-md-3 col-sm-6">
             <!-- Item Start -->
            <div class="slide">
              <div class="cp-thumb"> <img src="/images/expert-img-01.jpg" alt="">
                <div class="cp-hover-content" style="padding-top: 10% !important">
                  <h3 style="color: white">Sam Events</h3>
                  <p> <i class="fa fa-map-marker"></i> Abuja, Nigeria </p>
                  <hr />
                  <p> Conference dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                  <a href="/events/1">Read More</a>
                </div>
              </div>
              <div class="cp-ex-title">
                <h3><a href="/events/1">Hire / Order</a></h3>
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
