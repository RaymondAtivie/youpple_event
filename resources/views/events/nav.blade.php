<body ng-app="eventApp">
<style>
#ajaxx .input-field{
    margin-bottom: 35px !important;
}
.quote-btn{
    padding: 0px 15px;
}
</style>
<div class="cp-wrapper">
    <!-- Header Start -->
    <header class="cp-header">
        <!-- Topbar Start -->
        <div class="cp-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="cp-phone-mail">
                            <li>
                                <a href="{{ url("/events") }}">
                                    <img style="width: 50px" src="{{ url('images/event/event_logo_small.png') }}" alt="Youpple" />
                                </a>
                            </li>
                            <li><i class="fa fa-phone"></i>+234 809 072 6621</li>
                            {{-- <li><i class="fa fa-envelope-o"></i> info@youpple.com.ng</li> --}}
                            <!--<li><i class="fa fa-clock-o"></i> Mon - Sat: 07:00 - 19:00</li>-->
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <ul class="cp-top-social">
                            <li><a class="quote-btn" href="{{ url('events') }}">Home</a></li>
                            <li> <a class="quote-btn" href="{{ url('events/create') }}">Create Event</a> </li>
                            <li> <a class="quote-btn" href="{{ url('events/order') }}">Order Service</a> </li>

                            @if (!Auth::guest())
                                <li>
                                    <a class="quote-btn" href="{{ url('events/me') }}" style="padding: 0px; border-radius: 50%">
                                        <img src="{{ url('userPhotos/'.Auth::user()->picture) }}" style="height: 50px; border-radius: 50%" />
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle quote-btn" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('events/me') }}"><i class="fa fa-btn fa-user"></i> &nbsp; My Basic Information</a></li>
                                        @if(!Auth::user()->info)
                                            <li><a href="{{ url('events/becomeProvider') }}"><i class="fa fa-btn fa-user"></i> &nbsp; Become a Service Provider</a></li>
                                        @else
                                            <li><a href="{{ url('events/myprofile') }}"><i class="fa fa-btn fa-user"></i> &nbsp; Manage My Service Profile</a></li>
                                            @if(count(Auth::user()->events) > 0)
                                                <li><a href="{{ url('events/myevent') }}"><i class="fa fa-btn fa-user"></i> &nbsp; Manage My Events</a></li>
                                            @endif
                                            @if(count(Auth::user()->serviceOrders) > 0)
                                                <li><a href="{{ url('events/myorders') }}"><i class="fa fa-btn fa-user"></i> &nbsp; Manage My Service Orders</a></li>
                                            @endif
                                        @endif
                                        <li><a href="{{ url('events/logout') }}"><i class="fa fa-btn fa-sign-out"></i> &nbsp; Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle quote-btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Login
                                    </a>
                                    <ul class="dropdown-menu" style="min-width: 400px; border: 1px solid green">
                                        <li>
                                            <form action="{{ url('events/login') }}" method="post">
                                                {{ csrf_field() }}
                                                <div style="padding: 20px" id="ajaxx">
                                                    @if (count($errors) > 0)
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    <div class="row" style="padding-top: 40px">
                                                        @include("inc/flash")
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
                                                    <a class="btn btn-primary btn-block" href="{{ url("events/social/redirect/facebook") }}">
                                                        <i class="fa fa-facebook"></i> &nbsp;
                                                        <span>Facebook Login</span>
                                                    </a>
                                                    <a class="btn btn-primary btn-block" href="{{ url("events/social/redirect/google") }}">
                                                        <i class="fa fa-google"></i> &nbsp;
                                                        <span>Google Login</span>
                                                    </a>
                                                    <a class="btn btn-primary btn-block" href="{{ url("events/social/redirect/twitter") }}">
                                                        <i class="fa fa-twitter"></i> &nbsp;
                                                        <span>Twitter Login</span>
                                                    </a>

                                                </div>
                                            </form>

                                        </li>
                                    </ul>
                                </li>
                                <li><a class="quote-btn" href="{{ url('events/register') }}">Sign Up</a></li>
                            @endif
                            <li class="dropdown">
                                <button class="dropdown-toggle quote-btn" data-toggle="modal" data-target="#searchModal" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></button>


                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Serach Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Search Youpple events</h4>
                </div>
                <div class="modal-body" style="padding: 0px 0px">
                    @include("inc/search", ['num' => "2"])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <br />
