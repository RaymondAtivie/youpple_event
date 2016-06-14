@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/bootstrap-nav.css" />
<!-- Inner Banner Start -->
<div class="cp-inner-banner">
    <div class="container">
        <div class="cp-inner-banner-outer">
            <h2>Create an Event</h2>
            <!--Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/events">Events</a></li>
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
    <form action="/events/create/media" method="POST">

    <!--Signup Content Start-->
    <section ng-controller="formCtrl as FC" class="cp-signup-section pd-tb60">


        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="nav nav-wizard">
                    <li><a href="#">Basic information</a></li>
                    <li class="active"><a href="#">Packages</a></li>
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Awards</a></li>
                    <li><a href="#">Partners</a></li>
                </ul>
            </div>
        </div>

        <div class="row pd-tb60">

            <div class="col-md-6 col-md-offset-3">

                <div style="padding-left: 30px" ng-repeat="i in FC.list">
                <h2>Package @{{i + 1}}</h2>
                <hr />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Package Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Package Description</label>
                        <textarea class="form-control" placeholder="Description" rows="3" style="resize: none; border: 0px; border-bottom: 2px solid silver; "></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Package Fee Type</label>
                        <select class="form-control">
                            <option>Booth Fee</option>
                            <option>Exhibition Fee</option>
                            <option>Runway Fee</option>
                            <option>Entrance Fee</option>
                            <option>Partnership/Sponsorship Fee</option>
                            <option>Advert Fee</option>
                            <option>Training Fee</option>
                            <option>Participation Fee</option>
                            <option>Seminar Fee</option>
                            <option>Workshop Fee</option>
                            <option>Conference Fee</option>
                            <option>Modelling Fee</option>
                            <option>Contest Fee</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Package Fee</label>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option>Naira</option>
                                    <option>Safer</option>
                                    <option>US Dollars</option>
                                    <option>Cedi</option>
                                    <option>Euro</option>
                                    <option>GB Pound</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="amount">
                            </div>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option>Free</option>
                                    <option>Early Bird</option>
                                    <option>Late Bird</option>
                                    <option>On Start Date</option>
                                </select>
                            </div>
                        </div>
                        <br />
                        <hr />
                    </div>
                    <!------ -->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-3">
                <button type="button" ng-click="FC.duplicate()" class="btn btn-block btn-lg btn-default">Add another package</button>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-block btn-lg btn-submit">Next</button>
            </div>
        </div>
    </section><!--Signup Section Content End-->

    </form>
</div>
<!-- Main Content End -->

<script src="/js/angular.min.js"></script>
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
