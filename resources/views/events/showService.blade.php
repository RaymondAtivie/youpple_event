@extends('layouts.app')

@if($provider->info->user_type == "Individual")
    @section("pageTitle")
        {{$provider->name}} - Service Provider
    @endsection
@else
    @section("pageTitle")
        {{$provider->info->business_name}} - Service Provider
    @endsection
@endif

@section("pageDescription")
    {{$provider->info->description}}
@endsection
@section("pageImage")
    {{ url("userPhotos/".$provider->info->picture) }}
@endsection

@section("addThis")
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57fa2382afccb91a"></script>
@endsection


@section('content')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- Main Content Start -->
    <div class="cp-main-content">
        <!-- Up Coming Events Start -->
        <section class="cp-upcoming-events pd-tb60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @include('inc/verify')
                        @include('inc/flash')
                        <!-- Blog Item Start -->
                        <div class="cp-blog-item cp-blog-detail">

                            <div class="row">
                                <div class="col-sm-3" style="text-align: center">
                                    <img class="img-responsive" style="width: 100%" src="{{ url("userPhotos/".$provider->info->picture) }}" />
                                </div>
                                <div class="col-sm-3">
                                    <h3>
                                        @if($provider->info->verified)
                                            <span style="color: purple; padding-right: 10px" title="Verified by Youpple">
                                                <i class="fa fa-certificate"></i>
                                            </span>
                                        @endif
                                        @if($provider->info->user_type == "Individual")
                                            {{$provider->name}}
                                        @else
                                            {{$provider->info->business_name}}
                                        @endif
                                    </h3>

                                    <br />
                                    <p>{{$provider->info->description}}</p>

                                    <hr />

                                    @if($user && !$user->verify)
                                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#noModal">HIRE</button>
                                    @else
                                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                            @if($provider->info->user_type == "Individual")
                                                HIRE ME
                                            @else
                                                HIRE US
                                            @endif
                                        </button>
                                    @endif
                                </div>
                                @if(count($provider->info->event_services) > 0)
                                    <div class="col-sm-3" style="text-align: right">
                                        <h4>
                                            @if($provider->info->user_type == "Individual")
                                                What i do
                                            @else
                                                What we do
                                            @endif
                                        </h4>
                                        <br />
                                        <ul>
                                            @foreach($provider->info->event_services as $intrest)
                                                <li>{{$intrest}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(count($provider->info->intrests) > 0)
                                    <div class="col-sm-3">
                                        <h4>
                                            @if($provider->info->user_type == "Individual")
                                                What i am interested in
                                            @else
                                                What we are interested in
                                            @endif
                                        </h4>
                                        <br />
                                        <ul>
                                            @foreach($provider->info->intrests as $intrest)
                                                <li>{{$intrest}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <hr />

                            <div class="row grid">
                                @foreach($provider->info->dPicture as $pic)
                                    <div class="col-sm-4 thumb">
                                        <a class="fancybox" rel="ligthbox" href="{{ url("userPhotos/".$pic) }}">
                                            <img class="img-responsive" style="padding: 5px 0px;" src="{{ url("userPhotos/".$pic) }}" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>


                            <div class="cp-text">

                                <br style="clear: both; margin-bottom: 20px" />

                                <!-- Creative Content Start-->
                                <section class="cp-creative-section pd-tb60">
                                    <div class="container">
                                        <div class="cp-section-title">
                                            <!--<h2>Sponsors</h2>-->
                                            <strong>Powered by Youpple</strong>
                                        </div>
                                        <div class="row" style="text-align: center">
                                            <?php for($i=1;$i<=6;$i++){ ?>
                                                <div class="col-md-2 col-xs-4" style="padding: 10px">
                                                    <img style="height: inherit;" class="img-responsive" src="{{ url('images/logos/small_'.$i.'.png') }}" />
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </section><!-- Creative Content End-->
                                </div>

                                <!-- Blog Item End -->

                            </div>

                        </div>
                    </section><!-- Up Coming Events Start -->
                </div>
                <!-- Main Content End -->

                {{-- no modal --}}
                <div class="modal fade" id="noModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                                <div class="modal-body">
                                    <div class="alert alert-warning" style="text-align: center">
                                        <h3>Oops! You cannot order until you have verified your account</h3>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">About your event</h4>
                            </div>
                            <form action="{{ url('events/order') }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div>
                                        <input type="hidden" name="provider_id" value="{{$provider->id}}" />
                                        <div class="row pd-tb20">
                                            <div class="col-md-10 col-md-offset-1">
                                                @include('inc/flash')

                                                <div class="form-group">
                                                    <label>Type of event</label>
                                                    <div class="row">
                                                        @foreach($intrests as $in)
                                                            <div class="col-sm-4">
                                                                <label style="font-weight: 100">
                                                                    <input type="radio" required name="event_type" value="{{$in}}" />
                                                                    {{$in}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Number of guests</label>
                                                    <input type="number" name="guests" required value="{{ old('guests') }}"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Event Address</label>
                                                    <textarea name="address" rows="3" required style="resize: none"  class="form-control">{{ old('title') }}</textarea>
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
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-9">
                                                        <label>Budget</label>
                                                        <input type="number" name="budget" required value="{{ old('budget') }}"  class="form-control col-sm-9">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Currency</label>
                                                        <select name="currency" required class="form-control col-sm-3">
                                                            <option>Naira</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-lg btn-submit">Send Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection

            @section("footer_scripts")
                <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
                <script>
                $(function(){
                    var m = new Masonry($('.grid').get()[0], {
                        itemSelector: ".thumb"
                    });
                });

                $(document).ready(function(){

                    $(".fancybox").fancybox();
                });
                </script>
            @endsection
