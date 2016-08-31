@extends('events.layout.default')
@section('title')
    My Profile
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            My Profile
        </h3>
        <span class="sub-title">Manage Your Profile</span>
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
                <section class="panel">
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
                                    <img src="{{url('userPhotos/'.$user->info->picture)}}" alt=""/>
                                    <input type="file" name="picture"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="panel"  ng-show="RM.mode == 'p'">
                    <header class="panel-heading">
                        Upload Extra Images
                    </header>
                    <div class="panel-body">
                        <form action="{{url('events/myprofile/uploadExtraPics')}}" method="post" enctype="multipart/form-data">
                            <div id="my-slims"  class="row"  style="padding: 10px">

                                <div class="col-sm-12" ng-repeat="i in RM.numPics">
                                    <div class="slim"
                                    data-label="Drop your display picture here"
                                    data-size="1000,1000"
                                    data-ratio="free">
                                    <input type="file" name="dPicture[]"></div>
                                </div>

                                <div class="col-sm-12">
                                    <hr />
                                    <button class="btn btn-default" type="button" ng-click="RM.addPicture()">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                    <button class="btn pull-right btn-primary" type="submit">
                                        <i class="fa fa-upload"></i> Upload
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </section>


                <section class="panel"  ng-show="RM.mode == 'p'">
                    <header class="panel-heading">
                        Current Images
                    </header>
                    <div class="panel-body">

                        @foreach($user->info->dPicture as $pic)
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="{{url('userPhotos/'.$pic)}}" class="img-responsive img-thumbnail" />
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section>
            </div>

            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel panel-info">
                            <header class="panel-heading">
                                Customer or Service Provider?
                            </header>
                            <div class="panel-body">

                                <div class="col-md-4 col-md-offset-2">
                                    <button class="btn btn-block btn-default" ng-click="RM.toCustomer()">Customer</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-default" ng-click="RM.toProvider()">Service Provider</button>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
                <section class="panel panel-info">
                    <header class="panel-heading">
                        <b ng-show="RM.mode == 'c'">Customer</b>
                        <b ng-show="RM.mode == 'p'">Service Provider</b>
                        Details
                    </header>
                    <div class="panel-body detailsBody">
                        <form action="{{url('events/myprofile/updateBio')}}">

                            <input type="hidden" name="user_type" value="customer" ng-if="RM.mode == 'c'" />
                            <input type="hidden" name="user_type" value="provider" ng-if="RM.mode == 'p'" />

                            <div class="row"  ng-show="RM.mode == 'p'">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Business Name</label>
                                        <input class="form-control" type="text" name="business_name" value="{{$user->info->business_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row"  ng-show="RM.mode == 'p'">
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <label>Identification Type</label>
                                        <select class="form-control" name="id_type">
                                            <option>{{$user->info->id_type}}</option>
                                            <option>CAC Registraion Number</option>
                                            <option>TIN</option>
                                            <option>Driver’s License</option>
                                            <option>International Passport Number</option>
                                            <option>National ID</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6"  ng-show="RM.mode == 'p'">
                                    <div class="input-field">
                                        <label>Identification Number</label>
                                        <input class="form-control" type="text" name="id_number" value="{{$user->info->id_number}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label ng-show="RM.mode == 'c'">CV</label>
                                    <label ng-show="RM.mode == 'p'">Company Profile</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="file" name="CV" value="">
                                </div>
                            </div>

                            <br />
                            <div class="row" ng-show="RM.mode == 'c'">
                                <div class="col-md-2"><label>Gender:</label></div>
                                <div class="col-md-3">
                                    <div class="input-field">
                                        <label>
                                            <input type="radio"
                                            @if($user->info->gender == 'male')
                                                checked="checked"
                                            @endif
                                             name="gender" value="male"> Male
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-field">
                                        <label>
                                            <input type="radio"
                                            @if($user->info->gender == 'female')
                                                checked="checked"
                                            @endif
                                            name="gender" value="female"> Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <div class="row">
                                <div class="col-md-8">
                                    <label ng-show="RM.mode == 'c'">Date of birth</label>
                                    <label ng-show="RM.mode == 'p'">Date of Registration</label>
                                    <input ng-show="RM.mode == 'c'" type='date' name="dob" value="{{$user->info->dob}}" class="form-control" />
                                    <input ng-show="RM.mode == 'p'" type='date' name="dor" value="{{$user->info->dor}}" class="form-control" />
                                </div>
                            </div>

                            <br /><br /><br />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Contact Address</label>
                                        <input class="form-control" type="text" name="address" value="{{$user->info->address}}">
                                    </div>
                                </div>
                            </div>

                            <br />
                            <div class="row">
                                <div class="col-md-3"><label>Currency Prefrence:</label></div>
                                <div class="col-md-5">
                                    <select class="form-control" name="currency">
                                        <option>{{$user->info->currency}}</option>
                                        <option>Naira</option>
                                        <option>Dollar</option>
                                    </select>
                                </div>
                            </div>

                            <h3>Socail Media</h3>
                            <hr />

                            <div class="row social">
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <i class="fa fa-twitter prefix"></i>
                                        <label>Twitter</label>
                                        <input class="form-control" type="text" name="social_twitter" value="{{$user->info->social_twitter}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <i class="fa fa-facebook prefix"></i>
                                        <label>Facebook</label>
                                        <input class="form-control" type="text" name="social_facebook" value="{{$user->info->social_facebook}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <i class="fa fa-blackberry prefix"></i>
                                        <label>BBM</label>
                                        <input class="form-control" type="text" name="social_bbm" value="{{$user->info->social_bbm}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <i class="fa fa-instagram prefix"></i>
                                        <label>Instagram</label>
                                        <input class="form-control" type="text" name="social_instagram" value="{{$user->info->social_instagram}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <i class="fa fa-google prefix"></i>
                                        <label>Google</label>
                                        <input class="form-control" type="text" name="social_google" value="{{$user->info->social_google}}">
                                    </div>
                                </div>
                            </div>

                            <div  ng-show="RM.mode == 'c'">
                                <h3>Self Description</h3>
                                <hr />

                                <div class="row social">
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Eye Color</label>
                                            <input class="form-control" type="text" name="desc_eye_color" value="{{$user->info->desc_eye_color}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Hair Color</label>
                                            <input class="form-control" type="text" name="desc_hair_color" value="{{$user->info->desc_hair_color}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Height</label>
                                            <input class="form-control" type="text" name="desc_height" value="{{$user->info->desc_height}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Weight</label>
                                            <input class="form-control" type="text" name="desc_weight" value="{{$user->info->desc_weight}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Sleeve Length</label>
                                            <input class="form-control" type="text" name="desc_sleeve" value="{{$user->info->desc_sleeve}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Waist Measurement</label>
                                            <input class="form-control" type="text" name="desc_waist" value="{{$user->info->desc_waist}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Lap</label>
                                            <input class="form-control" type="text" name="desc_lap" value="{{$user->info->desc_lap}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>DL</label>
                                            <input class="form-control" type="text" name="desc_dl" value="{{$user->info->desc_dl}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Back Measurement</label>
                                            <input class="form-control" type="text" name="desc_back" value="{{$user->info->desc_back}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Bust Measurement</label>
                                            <input class="form-control" type="text" name="desc_bust" value="{{$user->info->desc_bust}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field">
                                            <label>Trouser Length</label>
                                            <input class="form-control" type="text" name="desc_trouser" value="{{$user->info->desc_trouser}}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Short description about
                                            <span ng-show="RM.mode == 'c'">you</span>
                                            <span ng-show="RM.mode == 'p'">your company</span>
                                        </label>
                                        <textarea class="form-control" name="description">{{$user->info->description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding: 20px;" ng-show="RM.mode == 'c'">
                                <h4>Intrests</h4>
                                <div class="row servicesList">
                                    @foreach($intrests as $value)
                                        <div class="col-sm-4">
                                            <label>
                                                <input type="checkbox" name="intrests[]"
                                                @if(collect($user->info->intrests)->contains($value))
                                                    checked="checked"
                                                @endif
                                                value="{{$value}}"/>
                                                {{$value}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row" style="padding: 20px" ng-show="RM.mode == 'p'">
                                <h3>Event Service Options</h3>
                                <hr />

                                @foreach($services as $key => $list)
                                    <br />
                                    <h4>{{ucfirst($key)}}</h4>
                                    <hr />
                                    <div class="row servicesList">
                                        @foreach($list as $value)
                                            <div class="col-sm-4">
                                                <label>
                                                    <input type="checkbox" name="event_services[]"
                                                    @if(collect($user->info->event_services)->contains($value))
                                                        checked="checked"
                                                    @endif
                                                    value="{{$value}}"/>
                                                    {{$value}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
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
    <script>
    angular.module('eventApp', [])
    .controller('profile', function() {

        this.numPics = [0];

        @if($user->info->user_type == 'provider')
        this.mode = 'p';
        @else
        this.mode = 'c';
        @endif

        this.toCustomer = function(){
            this.mode = "c";
        }
        this.toProvider = function(){
            this.mode = "p";
        }
        this.addPicture = function(){
            this.numPics.push(this.numPics.length);
            console.log(this.numPics);
            Slim.parse(document.getElementById('my-slims'));
        }
    });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
@stop
