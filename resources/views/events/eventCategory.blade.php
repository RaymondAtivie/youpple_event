@extends("events.fEvent")

@section("eventBody")

    <div class="row serviceList">

        <div class="col-sm-12">
            @foreach($intrests as $intrest)
                <h3 style="margin-bottom: 10px">{{UCFirst($intrest)}}
                    <small><a href="{{ url("events/list/".str_replace(" ", "-", strtolower($intrest))) }}">view all</a></small>
                </h3>
                <div class="row">
                    @foreach($events as $event)
                        @if(in_array($intrest, $event->eventTypes->lists("name")->toArray()))
                            <div class="col-sm-2 padding-5">
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
                        @endif
                    @endforeach
                </div>
                <hr /><br />
            @endforeach
        </div>


        <hr />

    </div>
@endsection
