@extends('events.layout.default')
@section('title')
    My Profile
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            My Profile
        </h3>
        <span class="sub-title">Manage Your Profile</span>
    </div>
    <style>
    .detailsBody .row, .row.social .col-md-6{
        margin-bottom: 35px
    }
    </style>
    <div class="wrapper" ng-app="eventApp">
        <div class="row" ng-controller="profile as RM">

            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-4">
                <section class="panel">
                    <header class="panel-heading">
                        My Display Picture
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="slim"
                                    data-label="Drop your display picture here"
                                    data-service="{{url('events/myprofile/uploadDP')}}"
                                    data-size="200,200"
                                    data-ratio="1:1">
                                    <img src="{{url('userPhotos/'.$user->picture)}}" alt=""/>
                                    <input type="file" name="picture"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <div class="col-sm-8">

                <section class="panel panel-info">

                    <div class="panel-body detailsBody">
                        <form action="{{url('events/myprofile/updateProfile')}}" method="POST">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" name="name" value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <label>Email</label>
                                        <input class="form-control" disabled type="text" name="name" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-lg btn-primary" value="Update"/>
                                </div>
                            </div>

                        </form>

                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
@stop
