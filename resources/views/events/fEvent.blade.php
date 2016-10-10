@extends('layouts.app')

@section('content')

<style>
.dropbtn {
    cursor: pointer;
}

.topmenu .dropdown {
    position: relative;
    display: block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    z-index: 1000;
    min-width: 650px;
    padding: 10px;
    box-shadow: 0px 10px 13px 0px rgba(0,0,0,0.2);
}
.topmenu .dropdown-content {
    left: 100%;
    top: -5%;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: small;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
    color: purple;
}

.dropdown:hover .dropdown-content {
    display: block;
}
.topmenu .dropdown:hover{
    background-color: #eee;
}

#owl-demo .item img{
    display: block;
    width: 100%;
    height: auto;
}
.row.no-margin > div{
    padding: 0px;
}
</style>

<style>
.eventBox{
    position: relative;
    width: 100%;
}
.eventBox p {
    position: absolute;
    bottom: 20px;
    left: 0;
    width: 100%;
}
.eventBox p span {
    color: white;
    font-weight: 100;
    letter-spacing: -1px;
    background: rgb(0, 0, 0); /* fallback color */
    background: rgba(0, 0, 0, 0.2);
    padding: 10px;
}
.eventBox:hover p span{
    background: rgba(0, 0, 0, 0.7);
}
</style>


<!-- Main Content Start -->
<div class="cp-main-content">

    <div class="container">
        <hr style="clear:both" />

        @include('inc/flash')

        <div class="row no-margin">
            <div class="col-sm-2">
                <div class="list-group topmenu">

                    @foreach($services as $key => $rest)
                        <div class="list-group-item dropdown dropbtn">
                            <div class="">
                                <small>{{UCFirst($key)}}</small>
                            </div>
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
                    @endforeach
                </div>
            </div>
            <div class="col-sm-7">
                <div id="owl-demo" class="owl-carousel owl-theme">

                    @foreach($fEvents as $event)
                        <a href="{{ url("events/".$event->id) }}">
                            <div class="item eventBox" style="height: 380px; background-color: #f1f1f1; background: url('{{ url("userPhotos/".$event->image) }}') center center no-repeat; background-size: cover">
                                {{-- <img src="{{ url("userPhotos/".$event->image) }}" alt="{{$event->title}}"> --}}
                                <p><span>{{$event->title}}</span></p>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
            <div class="col-sm-3" style="padding-left: 10px">
                <div class="owl-carousel owl-theme" id="owl-vert">
                    @foreach($fProviders as $p)
                        <div class="item" style="text-align: center; height: 380px;">
                            <img style="height: 250px" src="{{url("userPhotos/".$p->picture)}}">
                            <hr />
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
                            <br />
                            <a href="{{ url("events/view/service/".$p->user->id) }}"
                                class="btn btn-lg btn-primary btn-link">HIRE</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <hr />
            <style>
            .padding-5{
                padding-left: 5px;
                padding-right: 5px;
            }
            </style>

            @yield('eventBody')

        </div>
    </div>
    <!-- Main Content End -->
@endsection

@section("footer_scripts")
    <script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : false, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            autoPlay: true,
            stopOnHover: true,
            pagination: true,
            singleItem:true
        });

        $("#owl-vert").owlCarousel({
            autoPlay: true,
            singleItem : true,
            stopOnHover: true,
            transitionStyle : "slideDown"
        });

    });
    </script>
@endsection
