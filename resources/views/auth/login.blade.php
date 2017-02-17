
@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Login to Your Account</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('events') }}">Events</a></li>
                    <li class="active">Login</li>
                </ul><!--Breadcrumb End-->
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <style>
    .has-error input{
        border-bottom-color: red;
    }
    </style>

    <!-- Main Content Start -->
    <div class="cp-main-content">
        <!--Signup Content Start-->
        <section class="cp-signup-section pd-tb60">
            <div class="container">
                <!--Signup Form Start-->
                <div class="cp-signup-form">

                    @include('inc/flash')
                    <br />

                    <form role="form" method="POST" action="{{ url('events/login') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="email" required name="email" value="{{ old('email') }}" class="validate">
                                    <label>Email</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-unlock prefix"></i>
                                    <input type="password" name="password" class="validate" required>
                                    <label>Password</label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <input type="checkbox" name="rememebr"> Keep me logged in
                                    </label>
                                    <label class="pull-right">
                                        <a class="btn btn-link" href="{{ url('events/password/reset') }}">Forgot Your Password?</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="input-field">
                                    <label>
                                        <input type="checkbox" required name="terms" value="yes">
                                        I accept Youpple <a target="_blank" href="{{url("terms-and-conditions")}}">Terms and Condition</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="input-field btn-holder">
                                    <button type="submit" class="btn-submit" value="Submit">Login</button>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="input-field">
                                    <ul class="cp-social-links2">
                                        <li class="fb-btn">
                                            <a href="{{ url("events/social/redirect/facebook") }}">
                                                <i class="fa fa-facebook"></i>
                                                <span>Facebook Login</span>
                                            </a>
                                        </li>
                                        <li class="google-btn">
                                            <a href="{{ url("events/social/redirect/google") }}">
                                                <i class="fa fa-google-plus"></i>
                                                <span>Google Plus Login</span>
                                            </a>
                                        </li>
                                        <li class="twitter-btn">
                                            <a href="{{ url("events/social/redirect/twitter") }}">
                                                <i class="fa fa-twitter"></i>
                                                <span>Twitter Login</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <strong class="login-btn">Don't have an Account? <a href="{{ url('events/register') }}">Signup NOW</a></strong>
                            </div>
                        </div>
                    </form>
                </div><!--Signup Form End-->
            </div>
        </section><!--Signup Section Content End-->

    </div>
    <!-- Main Content End -->

@endsection
