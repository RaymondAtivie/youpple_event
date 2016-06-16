@extends('layouts.app')

<!-- Main Content -->
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
    </style>

    <!-- Main Content Start -->
    <div class="cp-main-content">
        <!--Signup Content Start-->
        <section class="cp-signup-section pd-tb60">
            <div class="container">

                <!--Signup Form Start-->
                <div class="cp-signup-form">
                    @if (session('status'))
                        <div class="alert alert-success" style="margin-bottom: 60px">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form role="form" method="POST" action="{{ url('/events/password/email') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="email" required name="email" value="{{ old('email') }}" class="validate">
                                    <label>Email Address</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
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
