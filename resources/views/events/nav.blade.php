<body ng-app="eventApp">
<style>
#ajaxx .input-field{
    margin-bottom: 35px !important;
}
</style>
<div class="cp-wrapper">
    <!-- Header Start -->
    <header class="cp-header">
        <!-- Topbar Start -->
        <div class="cp-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="cp-phone-mail">
                            <li><i class="fa fa-phone"></i>+234 809 072 6621</li>
                            <li><i class="fa fa-envelope-o"></i> info@youpple.com.ng</li>
                            <!--<li><i class="fa fa-clock-o"></i> Mon - Sat: 07:00 - 19:00</li>-->
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="cp-top-social">
                            <li> <a class="quote-btn" href="{{ url('events/create') }}">Create Event</a> </li>
                            <li> <a class="quote-btn" href="#">Order Event Service</a> </li>
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
                        <div class="cp-logo"><a href="{{ url("/events") }}"><img style="width: 80px" src="{{ url('images/event/event_logo_small.png') }}" alt="Youpple"></a></div>
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
                                    <li><a href="{{ url('events') }}">Home</a></li>
                                    <li><a href="{{ url('about') }}">About</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    @if (!Auth::guest())
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ url('events/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                Login
                                            </a>
                                            <ul class="dropdown-menu" style="min-width: 400px; border: 1px solid green">
                                                <li>
                                                    <form action="{{ url('events/login') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div style="padding: 20px" id="ajaxx">

                                                            <div class="row" style="padding-top: 40px">
                                                                <div class="col-md-10 col-md-offset-1">
                                                                    <div class="input-field">
                                                                        <i class="fa fa-user prefix"></i>
                                                                        <input type="text" required value="{{ old('email') }}" name="email" class="validate">
                                                                        <label>User Name</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10 col-md-offset-1">
                                                                    <div class="input-field">
                                                                        <i class="fa fa-unlock prefix"></i>
                                                                        <input type="password" class="validate" name="password" required>
                                                                        <label>Password</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-success btn-lg btn-block">Login</button>
                                                            <hr />
                                                            <a class="btn btn-primary btn-block">
                                                                <i class="fa fa-facebook"></i> &nbsp;
                                                                <span>Facebook Login</span>
                                                            </a>
                                                            <a class="btn btn-primary btn-block">
                                                                <i class="fa fa-google"></i> &nbsp;
                                                                <span>Google Login</span>
                                                            </a>
                                                            <a class="btn btn-primary btn-block">
                                                                <i class="fa fa-twitter"></i> &nbsp;
                                                                <span>Twitter Login</span>
                                                            </a>

                                                        </div>
                                                    </form>

                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('events/register') }}">Sign Up</a></li>
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

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
