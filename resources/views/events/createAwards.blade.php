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
        <form action="{{ url('events/create/sponsors') }}" method="POST">

            <!--Signup Content Start-->
            <section class="cp-signup-section pd-tb60" ng-controller="formCtrl as FC">


                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="nav nav-wizard">
                            <li><a href="#">Basic information</a></li>
                            <li><a href="#">Packages</a></li>
                            <li><a href="#">Media</a></li>
                            <li class="active"><a href="#">Awards</a></li>
                            <li><a href="#">Partners</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row pd-tb60">

                    <div class="col-md-8 col-md-offset-2" style="margin-bottom: 40px" ng-repeat="i in FC.list track by $index">

                        <h2>Award @{{i.id +1}}</h2>
                        <hr />
                        <div style="padding-left: 30px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Award Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Award Description</label>
                                        <textarea style="resize: none; border: 0px; border-bottom: 2px solid silver; " class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h3>Award Contestants</h3>
                                <table class="table table-bordered" ng-if="!i.reg">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                    </tr>
                                    <tr ng-repeat="c in i.contestants">
                                        <td class="col-md-3">
                                            <input type="file" class="form-control">
                                        </td>
                                        <td class="col-md-3">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" ng-if="!i.reg">
                                        <button type="button" ng-click="FC.addContestant($index)" class="btn btn-default btn-lg">Add another contestant</button>
                                    </div>
                                    <p ng-if="i.reg">Users would be able to register on the event</p>
                                </div>

                                <div class="col-md-6" style="text-align: right">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="button" ng-click="FC.hideContestants($index)">
                                            <span ng-show="!i.reg">Registration only?</span>
                                            <span ng-show="i.reg">Upload contestants</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox"  /> &nbsp; Enable Voting
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Voting End Date</label>
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-3">
                        <button type="button" ng-click="FC.duplicate()" class="btn btn-block btn-lg btn-default">Add another Award</button>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-block btn-lg btn-submit">Next</button>
                    </div>
                </div>

            </section><!--Signup Section Content End-->

        </form>
    </div>
    <!-- Main Content End -->
@endsection

@section('footer_scripts')
    <script src="/js/angular.min.js"></script>

    <script>
    angular.module('eventApp', [])
    .controller('formCtrl', function() {
        this.p = {contestants: [0], id: 0, reg: false};
        this.list = [];
        this.num = 0;

        this.list.push(this.p);

        this.addContestant = function(index){
            var count = this.list[index].contestants.length;
            this.list[index].contestants.push(count++);
        }

        this.hideContestants = function(index){
            var reg = this.list[index].reg;
            var con = true;

            if(!reg){
                con = confirm("Are you sure you want this award to be registration only");
            }
            if(con){
                this.list[index].reg = !reg;
            }
        }

        this.duplicate = function(){
            this.num++;

            var p = jQuery.extend({}, this.p);
            p.id = this.num;
            p.contestants = [0];

            this.list.push(p);
        }
    });
    </script>
@endsection
