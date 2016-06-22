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
        <form action="{{ url('events/create/awards') }}" method="POST" enctype="multipart/form-data">

            <!--Signup Content Start-->
            <section class="cp-signup-section pd-tb60" ng-controller="formCtrl as FC">

                @include('inc/chips', ['page'=>'awards'])

                <div class="row pd-tb60">

                    <div class="col-md-8 col-md-offset-2" style="margin-bottom: 40px">
                        @include('inc/flash')

                        <p>Add awards for <b>{{ session('event')->title }}</b></p>
                        <hr />

                        <div style="padding-left: 30px" ng-repeat="i in FC.list track by $index">
                            <h2>Award @{{i.id +1}}</h2>
                            <hr />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Award Title</label>
                                        <input name="title[]" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Award Description</label>
                                        <textarea name="description[]" style="resize: none; border: 0px; border-bottom: 2px solid silver; " class="form-control"></textarea>
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
                                            <input type="file" name="cFile_@{{ $parent.$index }}[]" class="form-control">
                                        </td>
                                        <td class="col-md-3">
                                            <input type="text" name="cName_@{{ $parent.$index }}[]" class="form-control" placeholder="Name">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="cDesc_@{{ $parent.$index }}[]"  placeholder="Description">
                                        </td>
                                    </tr>
                                    <input type="hidden" name="cNum_@{{ $index }}" value="@{{i.contestants.length}}" />
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" ng-if="!i.reg">
                                        <button type="button" ng-click="FC.addContestant($index)" class="btn btn-default btn-lg">Add another contestant</button>
                                    </div>
                                    <p ng-if="i.reg">Users would be able to register on this award</p>
                                </div>

                                <div class="col-md-6" style="text-align: right">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="button" ng-click="FC.hideContestants($index)">
                                            <span ng-show="!i.reg">Registration only?</span>
                                            <span ng-show="i.reg">Upload contestants</span>
                                        </button>

                                        <input type="hidden" name="enable_registration[]" value="@{{ i.reg }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="enable_voting[]" /> &nbsp; Enable Voting
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Voting End Date
                                            @{{$index}}</label>
                                            <div class='input-group date' id='datetimepicker@{{$index}}'>
                                                <input type='text' name="voting_end_date[]" class="form-control" />
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
        <script src="{{ url('js/angular.min.js') }}"></script>

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

                    var f = $("input[type=hidden]").val();
                    console.log(f);
                }
            }

            this.duplicate = function(){
                this.num++;

                var p = jQuery.extend({}, this.p);
                p.id = this.num;
                p.contestants = [0];

                this.list.push(p);

                $('#datetimepicker'+this.num).datetimepicker();
                console.log(this.num);
            }
        });
        </script>
    @endsection
