@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ url('css/bootstrap-nav.css') }}" />
    <link rel="stylesheet" href="{{ url('css/summernote.css') }}" />
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
    .help{
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
    }
    </style>

    <!-- Main Content Start -->
    <div class="cp-main-content">
        <form action="{{ url('events/create') }}" method="POST">

            <!--Signup Content Start-->
            <section class="cp-signup-section pd-tb60">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="nav nav-wizard">
                            <li class="active"><a href="#">Basic information</a></li>
                            <li><a href="#">Packages</a></li>
                            <li><a href="#">Media</a></li>
                            <li><a href="#">Awards</a></li>
                            <li><a href="#">Partners</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row pd-tb60">
                    <div class="col-md-6 col-md-offset-3">
                        @include('inc/flash')

                        <h2>Basic information</h2>
                        <hr />

                        <div class="form-group">
                            <label>Event Title</label>
                            <input type="text" name="title"  value="{{ old('title') }}"  class="form-control" placeholder="Event Title">
                            @if($errors->has('title'))
                                {!! $errors->first('title', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Event Description</label>
                            <div id="summernote">{{ old('description') }}</div>
                            <input type="hidden" id="eventDescription" value="{{ old('description') }}" name="description" />
                            @if($errors->has('description'))
                                {!! $errors->first('description', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Event Type</label>
                            {!! Form::select('event_type[]', $eTypes, null, ['class'=>'form-control', 'id'=>'selectEvents', 'multiple']) !!}
                            {{-- <div class="cOptions">
                                <div class="row">
                                    <select multiple name="event_type[]" class="form-control" id="selectEvents">
                                        @foreach ($eTypes as $type)
                                            <option>{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            @if($errors->has('event_type'))
                                {!! $errors->first('event_type', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>If others, Specify</label>
                            <input type="text" class="form-control" name="others" {{ old('others') }}  placeholder="Specify Others">
                        </div>
                        <div class="form-group">
                            <label>Event Venue</label>
                            <input type="text" class="form-control"  name="venue[]" value="{{ old('venue')[0] }}" placeholder="Venue 1">
                            <input type="text" class="form-control" name="venue[]"  value="{{ old('venue')[1] }}"  placeholder="Venue 2">
                            @if($errors->has('venue.0'))
                                <p class='text-danger help'>At least one venue is needed</p>
                            @endif
                        </div>
                        {{-- {{ var_dump($request->all()) }} --}}
                        {{-- {{ var_dump($errors) }} --}}
                        <div class="form-group">
                            <label>Event Date and Time (Start)</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' name="datetime" value="{{ old('datetime') }}" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            @if($errors->has('datetime'))
                                {!! $errors->first('datetime', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                            <br /><br />
                            <label>Event Date and Time (End)</label>
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' name="datetime_end" value="{{ old('datetime_end') }}" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            @if($errors->has('datetime_end'))
                                {!! $errors->first('datetime_end', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-block btn-lg btn-submit">Next</button>
                    </div>
                </div>
            </section><!--Signup Section Content End-->

        </form>
    </div>
    <!-- Main Content End -->

@endsection

@section('footer_scripts')
    <script src="{{ url('js/summernote.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 500,                 // set editor height
            minHeight: 300
        });

        $('#summernote').on('summernote.keyup', function(we, e) {
            var t = $(this).summernote('code');
            $("#eventDescription").val(t);
        });
        $('#summernote').on('summernote.blur', function(we, e) {
            var t = $(this).summernote('code');
            $("#eventDescription").val(t);
        });

        var s2 = $("#selectEvents").select2({
            placeholder: "Choose event type"
        });

        @if(old("event_type"))
            s2.val(['{!! implode("', '", old('event_type')) !!}']).trigger("change");
        @endif

    });
    </script>
@endsection
