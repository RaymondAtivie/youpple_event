@extends('events.fEvent')

@section('eventBody')
    <div class="row serviceList">

        <div class="col-sm-9">
            @foreach($services as $key => $rest)
                <?php $cp = 0; ?>
                <div style="margin-bottom: 100px">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-sm-5">
                            <div class="dropdown">
                                <h3>{{UCFirst($key)}} <span class="dropbtn"></span></h3>
                                <div class="dropdown-content">
                                    <div class="row">
                                        @foreach($rest as $link)
                                            <div class="col-sm-4">
                                                <a href="{{ url("events/services/".str_replace(" ", "-", strtolower($link))) }}">{{$link}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <?php $i=0; foreach($providers as $p){
                            $AI = array_intersect($rest, $p->event_services);?>
                            <?php if(count($AI) > 0){ $cp++; ?>
                                <a href="{{ url("events/view/service/".$p->user->id) }}">

                                    <div class="col-sm-3 padding-5">
                                        <img src="{{ url("userPhotos/".$p->picture) }}" style="width: 100%" class="img-responsive img-rounded" />
                                        <div style="text-align: center; margin-top: 5px">
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

                                    </div>
                                </div>
                            </a>
                            <?php if($i == "3"){break;} ?>
                            <?php $i++; } ?>
                                <?php } ?>

                                @if($cp == 0)
                                    <div class="alert alert-info col-sm-10 padding-5">
                                   No service providers under this category
                               </div>
                                @endif


                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- EVENTS --}}
                <div class="col-sm-3">

                    @foreach($events as $event)
                        <div class="row">
                            <div style="text-align: right" class="col-sm-12">
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
                            <div class="col-sm-12">
                                <a href="{{ url("events/".$event->id) }}">
                                    <div class="eventBox">
                                        <img class="img-responsive img-rounded" src="{{url('userPhotos/'.$event->image)}}" />
                                        <p><span>{{$event->title}}</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <hr />
                    @endforeach
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ url("events/list") }}" class="btn btn-default btn-lg btn-block">VIEW MORE EVENTS</a>
                        </div>
                    </div>
                </div>

            </div>
        @endsection
