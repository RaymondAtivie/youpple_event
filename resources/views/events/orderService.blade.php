@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ url('css/bootstrap-nav.css') }}" />
    <link rel="stylesheet" href="{{ url('css/summernote.css') }}" />
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Order an Event Service</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('events') }}">Events</a></li>
                    <li class="active">Order a Service</li>
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
        <form action="{{ url('events/order') }}" method="POST" enctype="multipart/form-data">

            <!--Signup Content Start-->
            <section class="cp-signup-section pd-tb60">

                <div class="row pd-tb60">
                    <div class="col-md-8 col-md-offset-2">
                        @include('inc/flash')

                        <h2>About your event</h2>
                        <hr />

                        <div class="form-group">
                            <label>Type of event</label>
                            <div class="row">
                                @foreach($intrests as $in)
                                    <div class="col-sm-4">
                                        <label style="font-weight: 100">
                                            <input type="checkbox" name="event_type[]" value="{{$in}}" />
                                            {{$in}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Number of guests</label>
                            <input type="number" name="guests"  value="{{ old('guests') }}"  class="form-control">
                            @if($errors->has('guests'))
                                {!! $errors->first('guests', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Event Address</label>
                            <textarea name="address" rows="3" required style="resize: none"  class="form-control">{{ old('title') }}</textarea>
                            @if($errors->has('address'))
                                {!! $errors->first('address', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Event Service Options</label>
                            @foreach($services as $sName => $service)
                                <br />
                                <label>{{UCFirst($sName)}}</label>
                                <div class="row">
                                    @foreach($service as $s)
                                        <div class="col-sm-4">
                                            <label style="font-weight: 100">
                                                <input type="checkbox" name="event_services[]" value="{{$s}}" />
                                                {{$s}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Event Service Description (Message / Comment)</label>
                            <textarea name="comment" rows="3" required style="resize: none"  class="form-control">{{ old('comment') }}</textarea>
                            @if($errors->has('comment'))
                                {!! $errors->first('comment', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-9">
                                <label>Budget</label>
                                <input type="number" name="budget" required value="{{ old('budget') }}"  class="form-control col-sm-9">
                            </div>
                            <div class="col-sm-3">
                                <label>Currency</label>
                                <select name="currency" class="form-control col-sm-3">
                                    @foreach($currs as $curr)
                                        <option value="{{$curr->id}}">{{$curr->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('budget'))
                                {!! $errors->first('budget', "<p class='text-danger help'>:message</p>") !!}
                            @endif
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-block btn-lg btn-submit">Send Order</button>
                    </div>
                </div>
            </section><!--Signup Section Content End-->

        </form>
    </div>
    <!-- Main Content End -->

@endsection

@section('footer_scripts')

@endsection
