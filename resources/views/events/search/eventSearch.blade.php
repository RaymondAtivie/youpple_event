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
            <h3>({{count($events)}}) Search result(s) for event:</h3>
            <br />
            @if($search['title'])
                <div>Title: <b>{{$search['title']}}</b></div>
            @endif
            @if($search['event_type'])
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
    <div class="row serviceList">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
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
@endsection
