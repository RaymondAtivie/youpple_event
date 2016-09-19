@extends('layouts.app')

@section('content')

    @include('inc/flash')

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
            
            <div class="row no-margin">
                <div class="col-sm-10 col-sm-offset-1">
                    <div id="owl-demo" class="owl-carousel owl-theme">

                        @for($i=1; $i < 4; $i++)
                            <div class="item" style="height: 400px; background-color: #f1f1f1">
                                <img src="{{ url("images/fullimage".$i.".jpg") }}" alt="The Last of us">
                            </div>
                        @endfor

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
            <div class="row serviceList">

                <div class="col-sm-12">
                    @foreach($intrests as $intrest)
                        <h3 style="margin-bottom: 10px">{{UCFirst($intrest)}}
                            <small><a href="{{ url("events/list/".str_replace(" ", "-", strtolower($intrest))) }}">view all</a></small>
                        </h3>
                        <div class="row">
                            @for($i=0;$i<6;$i++)
                                <div class="col-sm-2 padding-5">
                                    <div>
                                        <small>
                                            <i class="fa fa-calendar"></i>
                                            24 Aug, 8:00pm
                                        </small>
                                    </div>
                                    <a href="#">
                                        <div class="eventBox">
                                            <img class="img-responsive" src="http://placehold.it/300x400" />
                                            <p><span>This is a sample event</span></p>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        </div>
                        <hr /><br />
                    @endforeach
                </div>


                <hr />

            </div>
        </div>




    </div>
    <!-- Main Content End -->
@endsection

@section("footer_scripts")
    <script>
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
            transitionStyle : "slideDown"
        });

    });
    </script>
@endsection
