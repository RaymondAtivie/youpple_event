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
    .btn-default{
        background-color: #7c246d;
        border-color: #7c246d;
        color: white !important;
    }
    .btn-default:hover, .btn-default.active, .btn-default.active:hover{
        background-color: #681c5b;
        border-color: #681c5b;
    }
    .btn-default:active{
        background-color: #681c5b;
        border-color: #681c5b;
    }
    .btn-default:focus{
        background-color: #681c5b;
        border-color: #122b40;
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
                                    data-label="Click to upload picture"
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
                                <label>
                                    <i class="fa fa-calendar"></i> Date of Birth
                                </label>
                                <div class="input-field">

                                    <input type="date" name="dob" value="{{ old('dob') }}">
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
                                    <label class="btn btn-default
                                    @if(old('gender') == "male") active @endif
                                    ">
                                        <input type="radio" name="gender" value="male"
                                        @if(old('gender') == "male") checked @endif
                                         required> &nbsp; Male &nbsp;
                                    </label>
                                    <label class="btn btn-default
                                    @if(old('gender') == "female") active @endif
                                    " >
                                        <input type="radio" name="gender" value="female"
                                        @if(old('gender') == "female") checked @endif
                                         required> &nbsp; Female &nbsp;
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br /><br />

                        <div id="map_canvas" style="width: 100%; height: 400px;"></div>
                        <button type="button" class="btn btn-default" id="myLocation">Go to my location</button>
                        <br />
                        <br />
                        <br />
                        <br />

                        <div class="row form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <textarea name="address" id="address" requied>{{ old('address') }}</textarea>
                                    <input type="hidden" id="lat" class="form-control" name="lat" />
                                    <input type="hidden" id="lng" class="form-control" name="lng" />
                                    <label>
                                        <i class="fa fa-compass"></i> Address
                                    </label>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('lga') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-map-marker prefix"></i>
                                    <input type="text" name="lga" id="lga" requied value="{{ old('lga') }}">
                                    <label>LGA / County</label>
                                    @if ($errors->has('lga'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('lga') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-map-marker prefix"></i>
                                    <input type="text" name="state" id="state" requied value="{{ old('state') }}">
                                    <label>State / Province</label>
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label>
                                    <i class="fa fa-globe prefix"></i>
                                    Country
                                </label>
                                <div class="input-field">
                                    <select name="country" id="country" required class="form-control">
                                        <option value="{{old('country')}}">{{old('country')}}</option>
                                        <option value="">--SELECT COUNTRY--</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-file-o prefix"></i>
                                    <input type="number" name="zipcode" id="zip" value="{{ old('zipcode') }}">
                                    <label>Zip Code</label>
                                    @if ($errors->has('zipcode'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

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
                                    <label class="btn btn-default active">
                                        <input type="radio" name="user_type" value="customer" checked required> Customer
                                    </label>
                                    <label class="btn btn-default">
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
    <script>
    var map;
    var geocoder;

    function initialize() {
        var myOptions = {
            center: new google.maps.LatLng(9.3776355,7.48409),
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        
        function gotoMylocation(){
             if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    map.setZoom(15);
                    placeMarker(pos);
                });
            }
        }

        gotoMylocation();

        $("#myLocation").click(function(){
            console.log("going to my location");
            gotoMylocation();
        });
        var addressComp = false;
        $("#address").blur(function() {
            var addy = $(this).val();

            var url = "https://maps.googleapis.com/maps/api/geocode/json?address="+addy+"&key=AIzaSyAiyFQLOKpaCO39ybQVoxy63dzbdvtSXd8";
            $.ajax({
                url: url,
                success: function(result){
                    console.log(result);
                    var loca = result.results[0].geometry.location;
                    var status = result.status;
                    if(status == "OK"){
                        console.log("change location on map");
                        map.setCenter(loca);
                        map.setZoom(15);
                        placeMarker(loca);
                        addressComp = true;
                    }
                    console.log(loca);
                },
                dataType: "json"
            });
            console.log(addy);
        });
       

        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });

        var marker;
        function placeMarker(location) {
            if(marker){ //on vérifie si le marqueur existe
                marker.setPosition(location); //on change sa position
            }else{
                marker = new google.maps.Marker({ //on créé le marqueur
                    position: location,
                    map: map
                });
            }
            document.getElementById('lat').value = location.lat;
            document.getElementById('lng').value = location.lng;
            getAddress(location);
        }

        function getAddress(latLng) {
            geocoder.geocode( {'latLng': latLng},
            function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                    if(results[0]) {

                        var ads = results[0].address_components;
                        var num = ads.length;

                        console.log(ads);

                        var state, country, lga, zip;
                        for(var i=1;i<num;i++){
                            if(ads[num-i].types[0] == "locality"){
                                lga = ads[num-i].long_name;
                                break;
                            }
                        }
                        for(var i=1;i<num;i++){
                            if(ads[num-i].types[0] == "postal_code"){
                                zip = ads[num-i].long_name;
                                break;
                            }
                        }
                        for(var i=1;i<num;i++){
                            if(ads[num-i].types[0] == "country"){
                                country = ads[num-i].long_name;
                                break;
                            }
                        }
                        for(var i=1;i<num;i++){
                            if(ads[num-i].types[0] == "administrative_area_level_1"){
                                state = ads[num-i].long_name;
                                break;
                            }
                        }
                        // console.log(ads);
                        if(addressComp){
                            addressComp = false;
                        }else{
                            document.getElementById("address").value = results[0].formatted_address;
                        }
                        document.getElementById("state").value = state;
                        document.getElementById("country").value = country;
                        document.getElementById("zip").value = zip;
                        document.getElementById("lga").value = lga;
                    }
                    else {
                        document.getElementById("address").value = "No results";
                    }
                }
                else {
                    document.getElementById("address").value = status;
                }
            });
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop
