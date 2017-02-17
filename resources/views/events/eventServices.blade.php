@extends("events.fEvent")
@section("eventBody")
    <br style="margin-bottom: 200px; clear: both" />

    <div style="text-align: center">
        <h2>{{ucwords($category)}}</h2>
    </div>

    <hr />
    <style>
    .padding-5{
        padding: 20px;
    }
    </style>

    <div class="row">
        @foreach($providers as $p)
            <a href="{{ url("events/view/service/".$p->user->id) }}">
                <div class="col-sm-3 padding-5" style="text-align: center">
                    <div style="text-align: center;">
                        <img src="{{url("userPhotos/".$p->picture)}}" class="img-responsive img-rounded" style="margin: auto" />
                    </div>
                    <div style="margin-top: 5px">
                        <h3>
                            @if($p->user_type == 'Business')
                                {{$p->business_name}}
                            @else
                                {{$p->user->name}}
                            @endif
                        </h3>
                        <small>
                            @foreach($p->event_services as $value)
                                {{$value}},
                            @endforeach
                        </small>
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
@endsection
