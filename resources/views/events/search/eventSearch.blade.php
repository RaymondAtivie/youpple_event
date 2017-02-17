@extends('layouts.app')

@section("content")
    <div class="row" style="height: 50px"></div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="min-height: 350px">
            @include("inc/search", ['num' => "22"])
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="text-align: left; padding-bottom: 50px;">
            @if($search['type'] != 'provider')
                <h3>({{count($events)}}) Search result(s) for event:</h3>
            @else
                <h3>({{count($providers)}}) Search result(s) for provider:</h3>
            @endif

            <br />
            @if($search['title'])
                <div>Title: <b>{{$search['title']}}</b></div>
            @endif
            @if($search['name'])
                <div>Name: <b>{{$search['name']}}</b></div>
            @endif
            @if($search['event_type']!="")
                <div>Event Type: <b>{{$search['event_type']}}</b></div>
            @endif
            @if($search['datebefore'])
                <div>Before Date: <b>{{$search['datebefore']}}</b></div>
            @endif
            @if($search['dateafter'])
                <div>After Date: <b>{{$search['dateafter']}}</b></div>
            @endif
            @if($search['country'])
                <div>Country: <b>{{$search['country']}}</b></div>
            @endif
        </div>
    </div>
    <hr />

    @if($search['type'] != 'provider')
        <div class="row serviceList">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    @foreach($events->chunk(4) as $nevents)
                        <div class="row">
                            @foreach($nevents as $event)
                                <div class="col-sm-3" style="margin-bottom: 30px;">
                                    <div>
                                        <small title="{{$event->datetime->format("d M Y H:i a")}}">
                                            <i class="fa fa-calendar"></i>
                                            {{$event->datetime->diffForHumans()}}
                                        </small>
                                        <br />
                                        <small>
                                            <i class="fa fa-map-marker"></i>
                                            {{$event->venue[0]}}
                                        </small>
                                    </div>
                                    <a href="{{ url("events/".$event->id) }}">
                                        <div class="eventBox">
                                            <img class="img-responsive img-rounded" src="{{url('userPhotos/'.$event->image)}}" />
                                            <p><span>{{$event->title}}</span></p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach(collect($providers)->chunk(4) as $pss)
                    <div class="row">
                        @foreach($pss as $p)
                            <a href="{{ url("events/view/service/".$p->user->id) }}">
                                <div class="col-sm-3 padding-5" style="text-align: center">
                                    <div style="text-align: center;">
                                        <img src="{{url("userPhotos/".$p->picture)}}" class="img-responsive img-rounded" style="margin: auto; width: 100%" />
                                    </div>
                                    <div style="margin-top: 5px">
                                        <a tabindex="0" href="#"
                                        data-toggle="popover"
                                        data-trigger="hover"
                                        data-placement="bottom"
                                        data-content="
                                        @foreach($p->event_services as $value)
                                            {{$value}},
                                        @endforeach
                                        ">
                                        <h3>
                                            @if($p->verified)
                                                <span style="color: purple; padding-right: 10px" title="Verified by Youpple">
                                                    <i class="fa fa-certificate"></i>
                                                </span>
                                            @endif
                                            @if($p->user_type == 'Business')
                                                {{$p->business_name}}
                                            @else
                                                {{$p->user->name}}
                                            @endif
                                        </h3>
                                    </a>
                                    {{-- <small>
                                        @foreach($p->event_services as $value)
                                            {{$value}},
                                        @endforeach
                                    </small> --}}
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @if(count($providers) < 1)
                        <div class="alert alert-info" style="text-align: center">
                            <h3>Nothing to see here</h3>
                        </div>
                    @endif
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@endif

@endsection
