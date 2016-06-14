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
    <form action="/events/create/sponsors" method="POST">

        <!--Signup Content Start-->
        <section class="cp-signup-section pd-tb60" ng-controller="formCtrl as FC" >


            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="nav nav-wizard">
                        <li><a href="#">Basic information</a></li>
                        <li><a href="#">Packages</a></li>
                        <li><a href="#">Media</a></li>
                        <li><a href="#">Awards</a></li>
                        <li class="active"><a href="#">Partners</a></li>
                    </ul>
                </div>
            </div>

            <div class="row pd-tb60">

                <div class="col-md-6 col-md-offset-3" ng-repeat="i in FC.list" style="margin-bottom: 50px !important">

                    <h2>Partners Logo @{{i + 1}} </h2>
                    <hr />
                    <div style="padding-left: 30px">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Partner Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="URL to partner">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Upload Media</label>
                                    <input type="file" class="form-control" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-3">
                    <button type="button" ng-click="FC.duplicate()" class="btn btn-block btn-lg btn-default">Add another Logo</button>
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
