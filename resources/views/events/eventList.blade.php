@extends('events.fEvent')

@section('eventBody')

    <br style="margin-bottom: 200px; clear: both" />

    <div style="text-align: center">
        <h2>{{UCFirst($category)}}</h2>
    </div>

    <hr />
    <style>
    .padding-5{
        padding: 20px;
    }
    </style>

    <div class="row">
        @foreach($events as $event)
            <div class="col-sm-3 padding-5">
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
        @if(count($events) < 1)
            <div class="alert alert-info" style="text-align: center">
                <h3>Nothing to see here</h3>
            </div>
        @endif
    </div>

@endsection
