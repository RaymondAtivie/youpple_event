
  <!-- Header Start -->
  <header class="cp-header">
    <!-- Topbar Start -->
    <div class="cp-topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <ul class="cp-phone-mail">
              <li><i class="fa fa-phone"></i> +234 809 072 6621</li>
              <li><i class="fa fa-envelope-o"></i> info@youpple.com.ng</li>
              <!--<li><i class="fa fa-clock-o"></i> Mon - Sat: 07:00 - 19:00</li>-->
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="cp-top-social">
              <li> <a style="visibility: hidden" class="quote-btn" href="quote.html">Create Event</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Nav Bar Start -->
    <div class="cp-nav-logo-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="cp-logo"><a href="/"><img style="width: 80px" src="/images/main/logo_small.png" alt="Event Co"></a></div>
          </div>
          <div class="col-md-9">
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                  <li><a href="/home">Home</a></li>
                  <li><a href="/about">About</a></li>

                </ul>
                 <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right cp-search-basket">
                   <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
                    <ul class="dropdown-menu">
                      <li>
                        <form class="navbar-form navbar-left" role="search">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                          </div>
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </form>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header End -->
