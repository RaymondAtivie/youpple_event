@extends('admin.layout.default')
@section('title')
    Change Social Links
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Social Links Page
        </h3>
        <span class="sub-title">Change the social links for Youpple</span>
    </div>

    <style>
        .socials div.col-sm-12{
            margin-bottom: 10px;
        }
    </style>

    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-8">
                <section class="panel">
                    <header class="panel-heading">
                        Social Links
                    </header>
                    <div class="panel-body socials">
                        <form method="POST" autocomplete="off" action="{{ url('admin/home/changeSocial') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-facebook"></i>
                                    </span>
                                    <input type="text" name="social_facebook" class="form-control" value="{{$socials['facebook']}}" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-twitter"></i>
                                    </span>
                                    <input type="text" name="social_twitter" class="form-control" value="{{$socials['twitter']}}" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-google"></i>
                                    </span>
                                    <input type="text" name="social_google" class="form-control" value="{{$socials['google']}}" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-instagram"></i>
                                    </span>
                                    <input type="text"  name="social_instagram" class="form-control" value="{{$socials['instagram']}}" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-google-plus"></i>
                                    </span>
                                    <input type="text" name="social_google_plus" class="form-control" value="{{$socials['google_plus']}}" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-pinterest"></i>
                                    </span>
                                    <input type="text" name="social_pinterest" class="form-control" value="{{$socials['pinterest']}}" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-youtube"></i>
                                    </span>
                                    <input type="text" name="social_youtube" class="form-control" value="{{$socials['youtube']}}" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-linkedin"></i>
                                    </span>
                                    <input type="text" name="social_linkedin" class="form-control" value="{{$socials['linkedin']}}" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <hr />
                                <div class="form-group">
                                    <button type="submit" type="button" class="btn btn-info">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

        </div>
    </div>
@stop
@section('styles')
    <link href="{{ url('') }}/assets/css/tabs_home.css" rel="stylesheet">
@stop
@section('scripts')
    <script src="{{ url('') }}/assets/js/tabs.js"></script>
    <script>
    new CBPFWTabs(document.getElementById('tabs'));
    </script>
@stop
