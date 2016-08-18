@extends('admin.layout.default')
@section('title')
    Change Advertising Partners
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Advertising Partners
        </h3>
        <span class="sub-title">Change advert partners for Youpple</span>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Advertising Policy
                    </header>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{ url('admin/home/changeAd/') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="advert" id="summernote" class="form-control" placeholder="Write your Advertisment policy" >{{$ad}}</textarea>
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
    <link href="{{ url('') }}/assets/summernote/summernote.css" rel="stylesheet">
@stop
@section('scripts')
    <script src="{{ url('') }}/assets/summernote/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 600,
        });
    });
    </script>
@stop
