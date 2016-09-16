@extends('layouts.app')

@section('content')

    @include('inc/flash')
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


    <!-- Main Content Start -->
    <div class="cp-main-content">
        {{-- <div class="dropdown">
        <button class="dropbtn">Dropdown</button>
        <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
    </div>
</div>


<div class="dropdown">
<button class="dropbtn">Dropdown</button>
<div class="dropdown-content">
<a href="#">Link 1</a>
<a href="#">Link 2</a>
<a href="#">Link 3</a>
</div>
</div> --}}
<div class="container">
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
                                        <a href="#">{{$link}}</a>
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

                @for($i=1; $i < 4; $i++)
                    <div class="item" style="height: 400px; background-color: #f1f1f1">
                        <img src="{{ url("images/fullimage".$i.".jpg") }}" alt="The Last of us">
                    </div>
                @endfor

            </div>
        </div>
        <div class="col-sm-3">
            <div class="owl-carousel owl-theme" id="owl-vert">
                @for($i=1; $i < 4; $i++)
                    <div class="item" style="text-align: center; height: 400px; background-color: #f1f1f1">
                        <img class="img-responsive" src="http://placehold.it/300">
                        <h3>Raymond Ativie</h3>
                        <h4>Model</h4>
                        <button class="btn btn-sm btn-primary">Hire</button>
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

        <div class="col-sm-9">
            @foreach($services as $key => $rest)
                <div style="margin-bottom: 100px">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-sm-5">
                            <div class="dropdown">
                                <h3>{{UCFirst($key)}} <span class="dropbtn"></span></h3>
                                <div class="dropdown-content">
                                    <div class="row">
                                        @foreach($rest as $link)
                                            <div class="col-sm-4">
                                                <a href="#">{{$link}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @for($i=0;$i<4;$i++)
                            <div class="col-sm-3 padding-5">
                                <img src="http://placehold.it/300x400" class="img-responsive" />
                                <p>Raymond Ativie</p>
                            </div>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>

        {{-- EVENTS --}}
        <div class="col-sm-3">

            @for($i=0; $i < 5; $i++)
                <div class="row">
                    <div style="text-align: right" class="col-sm-12">
                        <small>
                            <i class="fa fa-calendar"></i>
                            24 Aug 2016, 8:00pm
                        </small>
                    </div>
                    <div class="col-sm-12">
                        <img class="img-responsive" src="http://placehold.it/300" />
                    </div>
                    <div style="text-align: center; margin-top: 5px" class="col-sm-12">
                        <h3>This is a sample event</h3>
                    </div>
                </div>
                <hr />
            @endfor


        </div>
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
