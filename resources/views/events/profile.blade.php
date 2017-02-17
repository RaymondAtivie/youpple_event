@extends('events.layout.default')
@section('title')
    My Profile
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            My Basic Information
        </h3>
        <span class="sub-title">Manage Your Basic information</span>
    </div>
    <style>
    .detailsBody .row, .row.social .col-md-6{
        margin-bottom: 35px
    }
    </style>
    <div class="wrapper" ng-app="eventApp">
        <div class="row" ng-controller="profile as RM">

            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-4">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        My Display Picture
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="slim"
                                    data-label="Drop your display picture here"
                                    data-service="{{url('events/myprofile/uploadDP')}}"
                                    data-size="200,200"
                                    data-ratio="1:1">
                                    <img src="{{url('userPhotos/'.$user->picture)}}" alt=""/>
                                    <input type="file" name="picture"></div>
                                </div>
                            </div>
                        </div>

                        <br />                        
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>*Please click the '<i class="fa fa-upload"></i>' button after selecting <br />to update your picture</p>
                            </div>
                        </div>

                    </div>
                </section>

                <section class="panel panel-info">
                    <header class="panel-heading">
                        Password Change
                    </header>

                    <div class="panel-body detailsBody">
                        <form action="{{url('events/myprofile/updateProfilePassword')}}" method="POST">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Current Password</label>
                                        <input class="form-control" type="password" required name="cpassword">
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>New Password</label>
                                        <input class="form-control" type="password" name="newpassword" required pattern=".{7,}" title="7 characters minimum">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Confirm New Password</label>
                                        <input class="form-control" type="password" name="confirm_password" required pattern=".{7,}" title="7 characters minimum">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-lg btn-primary" value="Change Password"/>
                                </div>
                            </div>

                        </form>

                    </div>
                </section>

            </div>

            <div class="col-sm-8">

                <section class="panel panel-info">
                    <header class="panel-heading">
                        Basic Information Update
                    </header>

                    <div class="panel-body detailsBody">
                        <form action="{{url('events/myprofile/updateProfile')}}" method="POST">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Full Name</label>
                                        <input class="form-control" type="text" required name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Phone</label>
                                        <input class="form-control" type="tel" required name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Date of Birth</label>
                                        <input class="form-control" type="date" required name="dob" value="{{$user->dob->format("Y-m-d")}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Gender {{$user->gender}}</label>

                                    <div class="btn-group" data-toggle="buttons" style="margin-left: 20px;">
                                        <label class="btn btn-default @if($user->gender == "male") active @endif">
                                            <input type="radio" name="gender" value="male" @if($user->gender == "male") checked @endif
                                                required /> &nbsp; Male &nbsp;
                                            </label>
                                            <label class="btn btn-default @if($user->gender == "female") active @endif">
                                                <input type="radio" name="gender" value="female" @if($user->gender == "female") checked @endif
                                                    required> &nbsp; Female &nbsp;
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <label>Zip code</label>
                                                <input type="number" class="form-control" required name="zipcode" value="{{$user->zipcode}}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <label>Address</label>
                                                <textarea class="form-control" required name="address">{{$user->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <label>LGA / County</label>
                                                <input type="text" class="form-control" required name="lga" value="{{$user->lga}}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <label>State / Province</label>
                                                <input type="text" class="form-control" required name="state" value="{{$user->state}}" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <label>Country</label>
                                                <input type="text" class="form-control" required name="country" value="{{$user->country}}" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <label>Email</label>
                                                <input class="form-control" disabled type="email" name="email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-lg btn-primary" value="Update"/>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </section>


                    </div>
                </div>
            </div>
        @stop

        @section('scripts')
            <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>
        @endsection

        @section('styles')
            <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
        @stop
