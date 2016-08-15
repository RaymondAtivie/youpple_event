@extends('admin.layout.default')
@section('title')
    Change Privacy Policy
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Privacy Policy
        </h3>
        <span class="sub-title">Change the privacy policy of Youpple</span>
    </div>

    <div class="wrapper">
        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">
                <section class="panel">
                    <header class="panel-heading">
                        Privacy Policy
                    </header>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{ url('admin/home/changePP/') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="description" class="form-control summernote" placeholder="Write your Provacy policy" ></textarea>
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
    <link href="{{ url('') }}/assets/css/tabs_home.css" rel="stylesheet">
@stop
@section('scripts')
    <script src="{{ url('') }}/assets/summernote/summernote.min.js"></script>
    <script src="{{ url('') }}/assets/js/tabs.js"></script>
    <script>
    // $(document).ready(function() {
    //     $('#summernote').summernote({
    //         height: 600,
    //     });
    // });
    new CBPFWTabs(document.getElementById('tabs'));

    </script>
@stop
