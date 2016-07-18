@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
<div class="cp-inner-banner">
<div class="container">
    <div class="cp-inner-banner-outer">
    <h2>What We Do</h2>
        <!--Breadcrumb Start-->
        <ul class="breadcrumb">
        <li><a href="{{ url('index.html') }}">Home</a></li>
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

  </div>
  <!-- Main Content End -->
@endsection
