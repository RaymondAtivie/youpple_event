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
        <form action="{{ url('events/create/media') }}" method="POST" enctype="multipart/form-data">

            <!--Signup Content Start-->
            <section class="cp-signup-section pd-tb60" ng-controller="formCtrl as FC">


                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="nav nav-wizard">
                            <li><a href="#">Basic information</a></li>
                            <li><a href="#">Packages</a></li>
                            <li class="active"><a href="#">Media</a></li>
                            <li><a href="#">Awards</a></li>
                            <li><a href="#">Partners</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row pd-tb60">

                    <div class="col-md-6 col-md-offset-3" style="margin-bottom: 40px">
                        @include('inc/flash')

                        <p>Add media (pictures, audio, video) for <b>{{ session('event')->title }}</b></p>
                        <hr />
                        <div style="padding-left: 30px; padding-bottom: 30px"  ng-repeat="i in FC.list">
                            <h2>Media @{{i + 1}}</h2>
                            <hr />
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Media Title</label>
                                        <input type="text" name="title[]" class="form-control" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Media Type</label>
                                        <select class="form-control" name="type[]">
                                            <option>Image</option>
                                            <option>Audio</option>
                                            <option>Video</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload Media</label>
                                        <input type="file" name="file[]" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-2" style="text-align: center; padding-top: 20px"><h3>OR</h3></div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Add Url</label>
                                        <input type="text" name="url[]" class="form-control" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-3">
                        <button type="button" ng-click="FC.duplicate()" class="btn btn-block btn-lg btn-default">Add another Media</button>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-block btn-lg btn-submit">Next</button>
                    </div>
                </div>
            </section><!--Signup Section Content End-->

        </form>
    </div>
    <!-- Main Content End -->

    <script src="{{ url('js/angular.min.js') }}"></script>
@endsection

@section('footer_scripts')
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
