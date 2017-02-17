@extends('layouts.app')

{{-- @section('pageTitle', '{$event->title} | @parent') --}}
@section("pageTitle")
    {{$event->title}}
@endsection
@section("pageDescription")
    {{$event->venue[0]}} - {{$event->title}}
@endsection
@section("pageImage")
    {{url("userPhotos/".$event->image)}}
@endsection

@section("addThis")
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57fa2382afccb91a"></script>
@endsection

@section('content')
    <link rel="stylesheet" href="{{ url('css/audio-player.css') }}" />
    {{-- {{ Request::path() }} --}}
    @if (Request::path() == 'events/preview')
        <hr style="clear: both" />
        <div class="alert alert-info" style="text-align: center; margin: 20px">
            <p>Your Event is ready to be published</p><br />
            <a class="btn btn-default" href="{{ url("events/create/package") }}">Edit</a>
            <a class="btn btn-danger" href="{{ url("events/create/package") }}">Delete</a>
            <a class="btn btn-primary" href="{{ url("events/publish") }}">Publish</a>
        </div>
    @endif

    <style>
    .cp-inner-banner{
        background: url("{{ url("userPhotos/".$event->image) }}") center center no-repeat;
        background-size: cover;
    }
    #clockdiv .timerbox{
        margin-top: 20px;
        border: 2px solid white;
        padding: 10px 20px;
    }
    #clockdiv .days,#clockdiv .hours,#clockdiv .minutes,#clockdiv .seconds, .smalltext{
        color: white;
        font-weight: bold;
        font-size: 20px;
    }
    </style>

    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>{{$event->title}}</h2>
                <h3 style="color: white">
                    <i class="fa fa-calendar"></i> &nbsp; {{$event->datetime->format("d F, Y")}} &nbsp; &nbsp; &nbsp;
                    <i class="fa fa-clock-o"></i> &nbsp; {{$event->datetime->format("h:i a")}} &nbsp; &nbsp; &nbsp;
                    <i class="fa fa-map-marker"></i> &nbsp; {{$event->venue[0]}} &nbsp; &nbsp; &nbsp;
                    {{-- <i class="fa fa-map-marker"></i> &nbsp; {{unserialize($event->venue)[1]}} --}}
                </h3>

                @if($event->datetime->timestamp > \Carbon\Carbon::now()->timestamp)
                    <div id="clockdiv">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4 timerbox">
                                <div class="row">
                                    <div class="col-xs-3">
                                        {{-- {{\Carbon\Carbon::now()->timestamp - $event->datetime->timestamp}} --}}
                                        <span class="days"></span>
                                        <div class="smalltext">Days</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <span class="hours"></span>
                                        <div class="smalltext">Hours</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <span class="minutes"></span>
                                        <div class="smalltext hidden-xs">Minutes</div>
                                        <div class="smalltext visible-xs">Mins</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <span class="seconds"></span>
                                        <div class="smalltext hidden-xs">Seconds</div>
                                        <div class="smalltext visible-xs">Secs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- Inner Banner End -->
    <style>
    #eventMap{
        width: 100%;
        height: 400px;
        text-align: center;
    }
    #eventMap img{
        margin: auto;
        width: 100%;
    }
    </style>

    <!-- Main Content Start -->
    <div class="cp-main-content">
        <!-- Up Coming Events Start -->
        <section class="cp-upcoming-events pd-tb60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @include('inc/flash')
                        <!-- Blog Item Start -->
                        <div class="cp-blog-item cp-blog-detail">
                            <!--Events Thumb Start-->
                            <figure class="cp-thumb">
                                {{-- <img src="/images/events-thumb-img1.jpg" alt="" style="margin-bottom: 10px"> --}}
                                <!--Events Flickr Box Start-->
                                <div class="cp-events-flickr-box">
                                    {{-- <div class="row">
                                    @foreach($event->media->groupBy('type')['image'] as $media)
                                    @if($media->url != "" && $media->link != "")
                                    <div class="col-md-4 col-sm-4">
                                    <figure class="cp-thumb">
                                    <img src="{{$media->file}}" alt="">
                                </figure>
                            </div>
                        @endif
                    @endforeach
                </div> --}}
            </div><!--Events Flickr Box End-->
        </figure><!--Events Thumb End-->
        <div class="cp-text">
            <h3>{{$event->title}}</h3>
            <ul class="post-meta">
                <li><i class="fa fa-calendar"></i> {{$event->datetime->format("d M, Y")}}</li>
                <li><i class="fa fa-clock-o"></i> {{$event->datetime->format("h:i a")}}</li>
                <li><i class="fa fa-map-marker"></i> {{$event->venue[0]}}</li>
            </ul>
            <p>{!! $event->description !!}</p>

            @if($event->media->groupBy('type')->has("video"))
                <!--Events Flickr Box Start-->
                <div class="cp-events-flickr-box">
                    <h3>Event Videos</h3>
                    <div class="row">
                        @foreach($event->media->groupBy('type')['video'] as $media)
                            <div class="col-md-6 col-sm-12">
                                <div align="center" class="embed-responsive embed-responsive-16by9">
                                    <video controls class="embed-responsive-item">
                                        <source src="{{$media->file}}" type="video/mp4"></source>
                                    </video>
                                </div>
                                <div class="text">{{$media->title}}</div>
                            </div>
                        @endforeach
                    </div>
                </div><!--Events Flickr Box End-->
            @endif

            <hr style="clear: both; margin-bottom: 50px" />
            <br />

            @if($event->media->groupBy('type')->has("audio"))
                <!--Events Flickr Box Start-->
                <div class="cp-events-flickr-box">
                    <h3>Event Audio</h3>
                    <div class="row">
                        @foreach($event->media->groupBy('type')['audio'] as $media)
                            <div class="col-md-12 col-sm-12">
                                <h3 style="font-weight: lighter">{{$media->title}}</h3>
                                <audio controls>
                                    <source src="{{$media->file}}" type="audio/mpeg" />
                                        <a href="#">{{$media->title}}</a>
                                        An html5-capable browser is required to play this audio.
                                    </audio>
                                </div>
                            @endforeach
                        </div>
                    </div><!--Events Flickr Box End-->

                @endif

                @if($event->lat)
                    <div class="row" style="margin-bottom: 50px">
                        <div class="col-md-10 col-md-offset-1">
                            <div id="eventMap" style="height: 300px">
                                {{-- <img class="img-responsive" src="https://maps.googleapis.com/maps/api/staticmap?zoom=13&size=900x300&markers={{$event->lat}},{{$event->lng}}&key=AIzaSyAiyFQLOKpaCO39ybQVoxy63dzbdvtSXd8" /> --}}
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($event->packages) > 0)
                    <hr style="clear: both" />

                    <!--Form Box Start-->
                    <div class="cp-form-box">
                        <h2>Register for this event</h2>
                        <form action="{{ url("events/apply") }}" method="post">
                            {{-- {{print_r($isLoggedIn)}} --}}
                            <input type="hidden" name="event_id" value="{{$event->id}}" />

                            @if(!$isLoggedIn)
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="inner-holder">
                                            <input type="text" placeholder="Your Name" name="name" required pattern="[a-zA-Z ]+">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="inner-holder">
                                            <input type="text" placeholder="Your Email" name="email" required pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="inner-holder">
                                            <input type="text" placeholder="Phone" name="phone" required pattern="[0-9 ]+">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-12 col-sm-12">
                                    <h3><u>Select Package</u></h3>
                                    <div class="inner-holder">
                                        @foreach($event->packages->chunk(2) as $chunk)
                                            <div class="row">
                                                @foreach($chunk as $package)
                                                    <div class="col-md-6" style="margin-bottom: 20px">
                                                        {{-- <div class="col-md-1">
                                                        <input type="checkbox" name="packages[]" value="{{$package->id}}" />
                                                    </div> --}}
                                                    <div class='col-md-11'>
                                                        <span style="font-size: 18px; color: black">
                                                            {{$package->title}} &middot;
                                                            <i>{{$package->fee_type}}</i>
                                                        </span>
                                                        <p style="font-weight: lighter; margin-bottom: 0px;">{{$package->description}}</p>
                                                        <hr />
                                                        @foreach($package->packs as $pp)
                                                            <label class="row" style="display: block">
                                                                <div class="col-sm-1">
                                                                    <input type="checkbox" name="packages[]" value="{{$pp->id}}" />
                                                                </div>
                                                                <div class="col-sm-10">
                                                                    <div style="font-weight: lighter">
                                                                        <b style="font-size: 18px; color: black">
                                                                            {{$pp->currencyObj()->symbol}}
                                                                            {{number_format(intval($pp->amount))}}
                                                                        </b>
                                                                        &nbsp; &middot; &nbsp;
                                                                        <i>{{$pp->name}}</i>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="inner-holder cp-btn-holder">
                                    <button type="submit" class="btn-submit" value="Submit" name="submit2">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!--Form Box End-->
            @endif
            <br style="clear: both" />
            <hr style="clear: both" />

            <div style="padding-top: 20px">
                @if(count($event->awards) > 0)
                    <h2><i class="fa fa-trophy"></i> Awards</h2>
                @endif
                <!-- Events Listing Start -->
                <ul class="cp-events-listing" style="margin-top: 20px">
                    @foreach($event->awards as $award)
                        <li class="col-md-12 col-sm-12">
                            <!--Events Box Start-->
                            <div class="cp-events-box">
                                <div class="cp-text">
                                    <div class="cp-event-content">
                                        <h3>{{$award->title}}</h3>
                                        <p>{{$award->description}}</p>
                                    </div>
                                    <div class="row">
                                        @if($award->enable_registration == "true")
                                            <button class="btn btn-lg btn-default col-md-2" data-toggle="modal" data-target="#myModalReg{{$award->id}}">Register</button>
                                            <div class="col-md-1"></div>
                                        @endif
                                        <button class="btn btn-lg btn-submit col-md-3" data-toggle="modal" data-target="#myModal{{$award->id}}">View Contestants</button>
                                    </div>
                                    <!-- Voting Modal -->
                                    <div class="modal fade" id="myModal{{$award->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Contestants for <b>{{$award->title}}</b></h4>
                                                </div>
                                                <div class="modal-body" style="padding: 0px">
                                                    @if($award->votingActive())
                                                        <div class="alert alert-info" style="text-align: center; margin-bottom: 0px">
                                                            Voting would end <span style="font-weight: bold" title="{{ $award->voting_end_date->format("d-M-Y h:i a")}}">{{$award->voting_end_date->diffForHumans()}}</span>
                                                        </div>
                                                    @else
                                                        <div class="alert alert-warning" style="text-align: center; margin-bottom: 0px">
                                                            Voting has ended for this award
                                                        </div>
                                                    @endif
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th></th>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th></th>
                                                        </tr>

                                                        @foreach($award->contestants->sortByDesc('vote') as $con)
                                                            <tr>
                                                                <td>
                                                                    <img style="width: 50px; border-radius: 50%" src="{{ url($con->image) }}" />
                                                                </td>
                                                                <td>{{$con->name}}</td>
                                                                <td><small>{{$con->description}}</small></td>
                                                                <td>
                                                                    @if($award->enable_voting == "true")
                                                                        @if($award->votingActive())
                                                                            <div class="label hidden award{{$award->id}} label-info">{{$con->votingPercentage()}}%</div>
                                                                            <button class="btn btn-small voteButton vAward{{$award->id}}" rel="{{$con->id}}" award="{{$award->id}}">Vote</button>
                                                                        @else
                                                                            <div class="label label-info">{{$con->votingPercentage()}}%</div>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-------->

                                    <!-- Registration Modal -->
                                    <div class="modal fade" id="myModalReg{{$award->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Register for this award: <b>{{$award->title}}</b></h4>
                                                </div>
                                                <form>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Full Name</label>
                                                            <input type="email" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Description</label>
                                                            <textarea name="description" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Your Picture</label>
                                                            <input type="file">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Register</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-------->
                                </div>
                            </div>

                            <!--Events Box End-->
                        </li>
                    @endforeach
                </ul>
            </div>

            <hr style="clear: both" />

            @if(count($event->sponsors) > 0)
                <!-- Creative Content Start-->
                <section class="cp-creative-section pd-tb60">
                    <div class="container">
                        <div class="cp-section-title">
                            <h2>Partners</h2>
                            <strong>Partners for this event</strong>
                            {{-- {{$event->sponsors}} --}}
                        </div>
                        <div class="row" style="text-align: center">
                            @foreach($event->sponsors as $sp)
                                <div class="col-md-3 col-sm-6" style="padding: 10px">
                                    <a href="http://{{$sp->link}}" target="_blank">
                                        <img style="width: 150px" src="{{$sp->logo}}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section><!-- Creative Content End-->
            @endif

            <!-- Creative Content Start-->
            <section class="cp-creative-section pd-tb60">
                <div class="container">
                    <div class="cp-section-title">
                        <!--<h2>Sponsors</h2>-->
                        <strong>Powered by Youpple</strong>
                    </div>
                    <div class="row" style="text-align: center">
                        <?php for($i=1;$i<=6;$i++){ ?>
                            <div class="col-md-2 col-xs-4" style="padding: 10px">
                                <img style="height: inherit;" class="img-responsive" src="{{ url('images/logos/small_'.$i.'.png') }}" />
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section><!-- Creative Content End-->
            </div>

            <!-- Blog Item End -->

        </div>

    </div>
</section><!-- Up Coming Events Start -->
</div>
<!-- Main Content End -->
@endsection

@section('footer_scripts')
    <script src="{{ url('js/audio-player.js') }}"></script>
    <script>
    function initMap() {
        var myLatLng = {lat: {{$event->lat}}, lng: {{$event->lng}}};

        var map = new google.maps.Map(document.getElementById('eventMap'), {
            zoom: 14,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: '{{$event->title}}'
        });
    }
    initMap();

    $(".voteButton").click(function(){
        var con = $(this).attr("rel");
        var award = $(this).attr("award");

        $(".award"+award).removeClass("hidden");
        $(".vAward"+award).addClass("hidden");

        $.ajax({
            url: '{{ url('api/vote') }}/'+con,
            success: function(con){
                console.log(con);
                toastr.options = {
                    "positionClass": "toast-bottom-right",
                }
                toastr.success('Successfully voted for <b>'+ con.name+'</b>');
            },
            dataType: 'json'
        });
    });

    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var dt = "{{$event->datetime->format('Y-m-d H:i:s')}}";
    console.log(dt);
    var deadline = new Date(Date.parse(dt));
    console.log(deadline);
    initializeClock('clockdiv', deadline);
    </script>
@endsection
