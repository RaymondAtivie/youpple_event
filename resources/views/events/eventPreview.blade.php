@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ url('css/audio-player.css') }}" />

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

            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Main Content Start -->
    <div class="cp-main-content">
        <!-- Up Coming Events Start -->
        <section class="cp-upcoming-events pd-tb60">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!-- Blog Item Start -->
                        <div class="cp-blog-item cp-blog-detail">
                            <!--Events Thumb Start-->
                            <figure class="cp-thumb">
                                {{-- <img src="/images/events-thumb-img1.jpg" alt="" style="margin-bottom: 10px"> --}}
                                <!--Events Flickr Box Start-->
                                <div class="cp-events-flickr-box">
                                    <div class="row">
                                        @foreach($event->media->groupBy('type')['image'] as $media)
                                            <div class="col-md-4 col-sm-4">
                                                <figure class="cp-thumb">
                                                    <img src="{{ url($media->file) }}" alt="">
                                                </figure>
                                            </div>
                                        @endforeach
                                    </div>
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
                                                            <source src="{{ url($media->file) }}" type="video/mp4"></source>
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
                                                        <source src="{{ url($media->file) }}" type="audio/mpeg" />
                                                            <a href="#">{{$media->title}}</a>
                                                            An html5-capable browser is required to play this audio.
                                                        </audio>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div><!--Events Flickr Box End-->

                                    @endif

                                    <hr style="clear: both" />

                                    <!--Form Box Start-->
                                    <div class="cp-form-box">
                                        <h2>Register for this event</h2>
                                        <form action="form3.php" method="post">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="inner-holder">
                                                        <input type="text" placeholder="Your Name" name="name2" required pattern="[a-zA-Z ]+">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="inner-holder">
                                                        <input type="text" placeholder="Your Email" name="email2" required pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="inner-holder">
                                                        <input type="text" placeholder="Phone" name="phone" required pattern="[0-9 ]+">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <h3><u>Select Package</u></h3>
                                                    <div class="inner-holder">
                                                        @foreach($event->packages->chunk(2) as $chunk)
                                                            <div class="row">
                                                                @foreach($chunk as $package)
                                                                    <label class="col-md-6" style="margin-bottom: 20px">
                                                                        <div class="col-md-1">
                                                                            <input type="checkbox"  />
                                                                        </div>
                                                                        <div class='col-md-11'>
                                                                            <span style="font-size: 18px; color: black">
                                                                                {{$package->title}} &middot;
                                                                                <i>{{$package->packageFeeTypes->first()['name']}}</i>
                                                                            </span>
                                                                            <p style="font-weight: lighter; margin-bottom: 0px;">{{$package->description}}</p>
                                                                            <span style="font-weight: lighter;"><b style="font-size: 18px; color: black">
                                                                                {{$package->fee_currency}} {{number_format($package->fee_amount)}}</b>  &nbsp; &middot; &nbsp; <i>{{$package->fee_style}}</i>
                                                                            </span>
                                                                        </div>
                                                                    </label>
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

                                    <br style="clear: both" />
                                    <hr style="clear: both" />

                                    <div style="padding-top: 20px">
                                        <h2><i class="fa fa-trophy"></i> Awards</h2>

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
                                                                                            <img style="width: 50px; border-radius: 50%" src="{{$con->image}}" />
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
                                    <!-- Creative Content Start-->
                                    <section class="cp-creative-section pd-tb60">
                                        <div class="container">
                                            <div class="cp-section-title">
                                                <h2>Sponsors</h2>
                                                <strong>Sponsors for this event</strong>
                                                {{-- {{$event->sponsors}} --}}
                                            </div>
                                            <div class="row" style="text-align: center">
                                                @foreach($event->sponsors as $sp)
                                                    <div class="col-md-3 col-sm-6" style="padding: 10px">
                                                        <a href="{{$sp->link}}" target="_blank">
                                                            <img style="height: inherit" src="{{$sp->logo}}" />
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </section><!-- Creative Content End-->
                                    
                                @endsection

                                @section('footer_scripts')
                                    <script src="{{ url('js/audio-player.js') }}"></script>
                                    <script>
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
                                    })
                                    </script>
                                @endsection
