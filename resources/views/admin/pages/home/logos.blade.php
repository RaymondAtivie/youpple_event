@extends('admin.layout.default')
@section('title')
    Change Logos
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Logo Page
        </h3>
        <span class="sub-title">Change the Logos for Youpple</span>
    </div>

    <div class="wrapper">

        <div class="row">

            @foreach($logos as $key => $logo)
                <div class="col-sm-4">
                    <section class="panel">
                        <header class="panel-heading">
                            {{$logo['name']}}
                        </header>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{ url('admin/home/changeLogo/'.$key) }}">
                                <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                                @include('partials.errors')
                                @include('partials.messages')
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{-- <label class="control-label">Name</label> --}}
                                        <input type="text" name="name" class="form-control" value="{{$logo['name']}}" >
                                    </div>
                                </div>
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
    <link href="{{ url('') }}/assets/css/tabs_home.css" rel="stylesheet">
@stop
@section('scripts')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>

    <script src="{{ url('') }}/assets/js/tabs.js"></script>
    <script>
    new CBPFWTabs(document.getElementById('tabs'));
    </script>
@stop
