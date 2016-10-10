@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Register for Your Account</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('events') }}">Events</a></li>
                    <li class="active">Register</li>
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

                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('events/register') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="slim"
                                    data-label="Profile Picture"
                                    data-size="360,400"
                                    data-ratio="1:1">
                                    <input type="file" name="picture" /></div>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />

                        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" name="name" value="{{ old('name') }}">
                                    <label>Full Name</label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="email" name="email" value="{{ old('email') }}">
                                    <label>Email</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-phone prefix"></i>
                                    <input type="text" name="phone" value="{{ old('phone') }}">
                                    <label>Phone</label>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-calendar prefix"></i>
                                    <input type="date" name="dob" value="{{ old('dob') }}">
                                    <label>Date of Birth</label>
                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label>Gender</label>

                                <div class="btn-group" data-toggle="buttons" style="margin-left: 20px;">
                                    <label class="btn btn-primary">
                                        <input type="radio" name="gender" value="male" required> &nbsp; Male &nbsp;
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="gender" value="female" required> &nbsp; Female &nbsp;
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br /><br />

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" name="password" value="">
                                    <label>Password</label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" name="password_confirmation" value="">
                                    <label>Confirm password</label>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label>Register as?</label>

                                <div class="btn-group btn-group-justified" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="user_type" value="customer" checked required> Customer
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="user_type" value="provider" required> Service Provider
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br />

                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <label>
                                        <input type="checkbox" required name="terms" value="yes">
                                        I Accept Youpple <a target="_blank" href="{{url("terms-and-conditions")}}">Terms and Condition</a>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="input-field btn-holder">
                                <input type="submit" class="btn-submit" value="Register" />
                                {{-- <button type="submit" class="btn-submit" value="Submit">Register</button> --}}
                            </div>
                        </div>
                    </form>


                </div><!--Signup Form End-->
            </div>
        </section><!--Signup Section Content End-->

    </div>
    <!-- Main Content End -->
@endsection

@section('footer_scripts')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css" />
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>
@stop
