
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
                    
                    @include('inc/flash');

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
                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
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
                                <div class="input-field btn-holder">
                                    <button type="submit" class="btn-submit" value="Submit">Login</button>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="input-field">
                                    <ul class="cp-social-links2">
                                        <li class="fb-btn">
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                                <span>Facebook Login</span>
                                            </a>
                                        </li>
                                        <li class="google-btn">
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                                <span>Google Plus Login</span>
                                            </a>
                                        </li>
                                        <li class="twitter-btn">
                                            <a href="#">
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
{{--

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Login</div>
<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/events/login') }}">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="col-md-4 control-label">E-Mail Address</label>

<div class="col-md-6">
<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<label for="password" class="col-md-4 control-label">Password</label>

<div class="col-md-6">
<input id="password" type="password" class="form-control" name="password">

@if ($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<div class="checkbox">
<label>
<input type="checkbox" name="remember"> Remember Me
</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
<i class="fa fa-btn fa-sign-in"></i> Login
</button>

<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div> --}}
