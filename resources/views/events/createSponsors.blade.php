@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ url('css/bootstrap-nav.css') }}" />
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Create an Event</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('events') }}">Events</a></li>
                    <li class="active">Create</li>
                </ul><!--Breadcrumb End-->
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <style>
    .form-group{
        margin-bottom: 30px
    }
    .cOptions label{
        font-weight: normal;
    }
    </style>

    <!-- Main Content Start -->
    <div class="cp-main-content">

        <!--Signup Content Start-->
        <section class="cp-signup-section pd-tb60" ng-controller="formCtrl as FC" >

            @include('inc/chips', ['page'=>'sponsors'])

            <div class="row pd-tb60">

                <div class="col-md-6 col-md-offset-3" style="margin-bottom: 50px !important">
                    @include('inc/flash')

                    <p>Add your partners for <b>{{ session('event')->title }}</b></p>

                    @foreach($sponsors as $sponsor)
                        <h3 ng-init="aBox{{$sponsor->id}} = false"> {{$sponsor->name}} -
                            <button type="button" class="btn btn-link" ng-click="aBox{{$sponsor->id}} = !aBox{{$sponsor->id}}">view</button>
                        </h3>
                        <div class="row" style="border: 2px solid #7c246d; padding: 25px 20px; margin-bottom: 20px; margin-top: 10px" ng-show="aBox{{$sponsor->id}}">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{$sponsor->logo}}" class="img-responsive" />
                                    </div>
                                    <div class="col-md-5">
                                        <div><b>Partner Name</b></div>
                                        <div>{{$sponsor->name}}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div><b>Partner Link</b></div>
                                        {{$sponsor->link}}
                                    </div>
                                </div>

                                <br />
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{url('events/delete/sponsor/'.$sponsor->id)}}" 
                                        onclick="return confirm('Are you sure you want to delete this partner?')"
                                        class="btn btn-danger">DELETE THIS PARTNER</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr />

                    <form action="{{ url('events/create/sponsors') }}" method="POST" enctype="multipart/form-data">
                        <div style="padding-left: 30px" ng-repeat="i in FC.list">
                            <h3>Partners Logo @{{i + 1}} </h3>
                            <div style="border: 2px dotted #7c246d; padding: 35px 20px; margin-bottom: 40px; margin-top: 10px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Partner Name</label>
                                            <input type="text" name="name[]" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Link to partner website</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">http://</span>
                                                <input type="text" name="link[]" class="form-control" placeholder="URL to partner">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Upload Media</label>
                                            <input type="file" name="file[]" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="button" ng-click="FC.duplicate()" class="btn btn-block btn-lg btn-default">Add another Partner</button>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-block btn-lg btn-submit">Next</button>
                    </div>
                </div>
            </section><!--Signup Section Content End-->

        </form>
    </div>
    <!-- Main Content End -->
@endsection

@section('footer_scripts')
    <script src="{{ url('js/angular.min.js') }}"></script>

    <script>
    angular.module('eventApp', [])
    .controller('formCtrl', function() {
        this.list = [];
        this.num = 0;

        this.list.push(this.num);

        this.duplicate = function(){
            this.num++;
            this.list.push(this.num);
        }
    });
    </script>
@endsection
