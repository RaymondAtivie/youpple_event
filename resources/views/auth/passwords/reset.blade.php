@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Reset Your Password</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="/events">Events</a></li>
                    <li class="active">Reset Password</li>
                </ul><!--Breadcrumb End-->
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->
    <style>
    .has-error input{
        border-bottom-color: red;
    }
    .danger{
        color: red;
    }
    </style>

    <!-- Main Content Start -->
    <div class="cp-main-content">
        <!--Signup Content Start-->
        <section class="cp-signup-section pd-tb60">
            <div class="container" class="{{ $errors->has('email') ? ' has-error' : '' }}">

                <form role="form" method="POST" action="{{ url('/events/password/reset') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-field">
                                <i class="fa fa-user prefix"></i>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                                <label>Email Address</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-field">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" required name="password">
                                <label>Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-field">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" required name="password_confirmation" >
                                <label>Confirm Password</label>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong class="danger">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="input-field btn-holder">
                                <button type="submit" class="btn-submit" value="Submit">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection
