@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ url('css/bootstrap-nav.css') }}" />
    <link rel="stylesheet" href="{{ url('css/summernote.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">

    <!-- Inner Banner Start -->
    <div class="cp-inner-banner" style="padding-top: 30px; padding-bottom: 30px;">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Create an Event</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('events') }}">Events</a></li>
                    <li class="active">Create</li>
                </ul><!--Breadcrumb End-->
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <style>
    .form-group{
        margin-bottom: 30px
    }
    .cOptions label{
        font-weight: normal;
    }
    .help{
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
    }
    </style>

    <!-- Main Content Start -->
    <div class="cp-main-content" style="padding-left: 10px; padding-right: 10px">
        <hr style="clear:both" />

        @include('inc/verify')

        <form action="{{ url('events/create') }}" method="POST" enctype="multipart/form-data">

            <!--Signup Content Start-->
            <section class="cp-signup-section pd-tb60">

                @include('inc/chips', ['page'=>'create'])

                <div class="row pd-tb60">
                    <div class="col-md-6 col-md-offset-3">
                        @include('inc/flash')

                        <h2>Basic information</h2>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="slim"
                                    data-label="Your events main picture"
                                    data-size="950,400"
                                    data-ratio="19:8">
                                    <input type="file" name="picture"></div>
                                </div>
                            </div>
                        </div>

                        <br />

                        <div class="form-group">
                            <label>Event Title</label>
                            <input type="text" name="title" required value="{{ old('title') }}"  class="form-control" placeholder="Event Title">
                            @if($errors->has('title'))
                                {!! $errors->first('title', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Event Type</label>
                            {!! Form::select('event_type[]', $eTypes, null, ['class'=>'form-control', 'id'=>'selectEvents', 'multiple']) !!}

                            @if($errors->has('event_type'))
                                {!! $errors->first('event_type', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>If others, Specify</label>
                            <input type="text" class="form-control" name="others" {{ old('others') }}  placeholder="Specify Others">
                        </div>

                        <div id="map_canvas" style="width: 100%; height: 400px;"></div>
                        <button type="button" class="btn btn-default" id="myLocation">Go to my location</button>
                        <br />
                        <br />

                        <div class="form-group">
                            <label>Event Venue</label>
                            <textarea class="form-control" id="address" required name="venue"></textarea>
                            <p class="info">Seperate multiple addresses with a column "<b>;</b>"</p>
                            @if($errors->has('venue'))
                                <p class='text-danger help'>At least one venue is needed</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>State / Province</label>
                            <input type="text" id="state" required class="form-control" name="state" />
                            <input type="hidden" id="lat" class="form-control" name="lat" />
                            <input type="hidden" id="lng" class="form-control" name="lng" />
                            @if($errors->has('state'))
                                <p class='text-danger help'>Please add a state/province</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <select name="country" id="country" required class="form-control">
                                <option value="">--SELECT COUNTRY--</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                                <p class='text-danger help'>Please select a country</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Event Date and Time (Start)</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' required name="datetime" value="{{ old('datetime') }}" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            @if($errors->has('datetime'))
                                {!! $errors->first('datetime', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                            <br /><br />
                            <label>Event Date and Time (End)</label>
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' required name="datetime_end" value="{{ old('datetime_end') }}" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            @if($errors->has('datetime_end'))
                                {!! $errors->first('datetime_end', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Event Description</label>
                            <div id="summernote">{{ old('description') }}</div>
                            <input type="hidden" id="eventDescription" value="{{ old('description') }}" name="description" />
                            @if($errors->has('description'))
                                {!! $errors->first('description', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                        <label>Upload Audio</label>
                        <div ng-controller="formCtrl as FC" class="row" style="margin-bottom: 20px;">
                            <div style="border: 2px solid silver; padding: 15px; border-radius: 5px" class="col-md-6"  ng-repeat="i in FC.list">
                                <div>Audio @{{i + 1}}</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="audio[]" class="form-control" placeholder="Audio Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="min-height: 150px;">
                                    <div class="col-md-12">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-justified" role="tablist">
                                            <li role="presentation" class="active"><a href="#file@{{i}}" aria-controls="home" role="tab" data-toggle="tab">File</a></li>
                                            <li role="presentation"><a href="#url@{{i}}" aria-controls="profile" role="tab" data-toggle="tab">URL</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content" style="padding: 20px;">
                                            <div role="tabpanel" class="tab-pane active" id="file@{{i}}">
                                                <input type="file" name="audioFile[]" class="form-control" />
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="url@{{i}}">
                                                <input type="text" name="audioUrl[]" placeholder="http://example.com/picture.mp3" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>
                            .addFile{
                                border: 1px solid silver;
                                padding-top: 30px;
                                border-radius: 5px;
                                width: 150px;
                                height: 150px;
                                margin: auto;
                                margin-top: 40px;
                            }
                            .addFile:hover{
                                cursor: pointer;
                                color: black !important;
                                background-color: silver;
                            }
                            </style>
                            <div class="col-sm-6" style="text-align: center">
                                <div class="addFile" style="text-align: center" ng-click="FC.duplicate()">
                                    <i class="fa fa-plus fa-4x"></i>
                                    <br />
                                    Add Another file
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-block btn-lg btn-submit">Next</button>
                    </div>
                </div>
            </section><!--Signup Section Content End-->

        </form>
    </div>
    <!-- Main Content End -->

@endsection

@section('footer_scripts')
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>

    <script src="{{ url('js/summernote.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 500,                 // set editor height
            minHeight: 300
        });

        $('#summernote').on('summernote.keyup', function(we, e) {
            var t = $(this).summernote('code');
            $("#eventDescription").val(t);
        });
        $('#summernote').on('summernote.blur', function(we, e) {
            var t = $(this).summernote('code');
            $("#eventDescription").val(t);
        });

        var s2 = $("#selectEvents").select2({
            placeholder: "Choose event type"
        });

        @if(old("event_type"))
        s2.val(['{!! implode("', '", old('event_type')) !!}']).trigger("change");
        @endif

    });

    </script>
    <script src="{{ url('js/angular.min.js') }}"></script>
    <script>
    angular.module('eventApp', [])
    .controller('formCtrl', function() {
        this.list = [];
        this.num = 0;

        this.list.push(this.num);

        this.duplicate = function(){
            this.num++;
            this.list.push(this.num);
        }
    });
    </script>
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
                    var status = result.status;
                    var loca;
                    if(status == "OK"){
                        loca = result.results[0].geometry.location;
                        console.log("change location on map");
                        map.setCenter(loca);
                        map.setZoom(15);
                        placeMarker(loca);
                        addressComp = true;
                    }else{
                        toastr.info('Couldnt find this plae on the map');
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
@endsection
