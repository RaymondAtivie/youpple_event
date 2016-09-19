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
            <hr style="clear: both" />
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
                @for($i=0;$i<34;$i++)
                    <div class="col-sm-3 padding-5">
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
