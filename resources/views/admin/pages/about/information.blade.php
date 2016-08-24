@extends('admin.layout.default')
@section('title')
    Change About
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            About Page
        </h3>
        <span class="sub-title">Change about for Youpple</span>
    </div>

    <div class="wrapper">

        <div class="row">
            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-5">
                <section class="panel">
                    <header class="panel-heading">
                        About Page Image
                    </header>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{ url('admin/about/changeAboutImage') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')

                            <div class="col-sm-12">
                                <div class="slim"
                                data-label="Drop your Logo here"
                                data-size="1000,600"
                                data-ratio="10:6" >
                                <img src="{{ url("images/".$aboutImage) }}" alt=""/>
                                <input type="file"  name="image[]" id="slim" /></div>
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

            <div class="col-sm-7">
                <section class="panel">
                    <header class="panel-heading">
                        About Page Info
                    </header>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{ url('admin/about/changeAboutInfo') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Page Header</label>
                                    <input type="text" name="header" class="form-control" value="{{$header}}" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <textarea name="description" class="form-control" id="summernote" placeholder="Write your description" >{{$description}}</textarea>
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

        <div class="row">
            @foreach($logos as $key => $logo)
                <div class="col-sm-4">
                    <section class="panel">
                        <header class="panel-heading">
                            {{$logo['name']}}
                        </header>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{ url('admin/about/changeAboutLogo/'.$key) }}">
                                <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                                @include('partials.errors')
                                @include('partials.messages')
                                <input type="hidden" name="key" class="form-control" value="{{$key}}" >

                                <div class="col-sm-12">
                                    <div class="slim"
                                    data-label="Drop your Logo here"
                                    data-max-file-size="1.5"
                                    data-size="600,600"
                                    data-ratio="6:6" data-will-transform="addWatermark">
                                    <img src="{{ url("images/".$logo['link']) }}" alt=""/>
                                    <input type="file"  name="logo[]" id="slim" /></div>
                                </div>

                                <div class="col-sm-12">
                                    <hr />
                                    <div class="form-group">
                                        <label class="control-label">Caption</label>
                                        <input type="text" name="name" value="{{$logo['name']}}" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Summary</label>
                                        <textarea style="resize: none" rows="4" name="desc" class="form-control">{{$logo['name']}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" type="button" class="btn btn-info">Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            @endforeach
        </div>

    </div>
@stop
@section('styles')
    <link href="{{ url('') }}/assets/summernote/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
@stop
@section('scripts')
    <script src="{{ url('') }}/assets/summernote/summernote.min.js"></script>
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>
@stop
