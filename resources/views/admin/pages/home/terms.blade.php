@extends('admin.layout.default')
@section('title')
    Change Terms and Conditions
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Terms and conditions
        </h3>
        <span class="sub-title">Change the terms and conditions for Youpple</span>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Terms and Condition
                    </header>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{ url('admin/home/changeTerms/') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="terms" id="summernote" class="form-control" placeholder="Write your Terms and conditions" >{{$terms}}</textarea>
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
    <script src="{{ url('') }}/assets/summernote/summernote2.js"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 600,
        });
    });
    </script>
@stop
