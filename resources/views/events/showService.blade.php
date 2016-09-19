@extends('layouts.app')

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
                        @include('inc/flash')
                        <!-- Blog Item Start -->
                        <div class="cp-blog-item cp-blog-detail">

                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3" style="text-align: center">
                                    <img src="{{ url("userPhotos/".$provider->info->picture) }}" />
                                </div>
                            </div>
                            <br />
                            <div class="row" style="text-align: center">
                                <div class="col-sm-8 col-sm-offset-2">
                                    @if($provider->info->user_type == "Individual")
                                        <h3>{{$provider->name}}</h3>
                                    @else
                                        <h3>{{$provider->info->business_name}}</h3>
                                    @endif
                                    <p>{{$provider->info->description}}</p>
                                </div>
                            </div>
                            <br />
                            <div class="row" style="text-align: center">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn btn-primary btn-lg">
                                        @if($provider->info->user_type == "Individual")
                                            HIRE ME
                                        @else
                                            HIRE US
                                        @endif
                                    </button>
                                </div>
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

                            <hr />

                            <div class="row">
                                @if(count($provider->info->event_services) > 0)
                                    <div class="col-sm-6">
                                        <h4><u>
                                            @if($provider->info->user_type == "Individual")
                                                What i do
                                            @else
                                                What we do
                                            @endif
                                        </u></h4>
                                        <ul>
                                            @foreach($provider->info->event_services as $intrest)
                                                <li>{{$intrest}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(count($provider->info->intrests) > 0)
                                    <div class="col-sm-6">
                                        <h4><u>
                                            @if($provider->info->user_type == "Individual")
                                                What i am intrested in
                                            @else
                                                What we are intrested in
                                            @endif
                                        </u></h4>
                                        <ul>
                                            @foreach($provider->info->intrests as $intrest)
                                                <li>{{$intrest}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

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
                                                <div class="col-md-2 col-xs-6" style="padding: 10px">
                                                    <img style="height: inherit; width: 100px" src="{{ url('images/logos/small_'.$i.'.png') }}" />
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
