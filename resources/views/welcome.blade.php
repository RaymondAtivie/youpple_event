@extends('layouts.app')

@section('content')
<style>
#prevSlide:hover, #nextSlide:hover{
    color: black !important;
}
</style>
<!-- Main Content Start -->
<div class="cp-main-content">
    <!-- Our Experties Start -->
    <section class="cp-Our-experties pd-tb60">
        <div class="container-fluid">
            <div class="row">

                {{-- <div class="col-md-2" style="text-align: center" id="prevSlide">
                <div style="margin-top: 100%">
                <i class="fa fa-5x fa-chevron-left" aria-hidden="true"></i>
            </div>
        </div> --}}

        <div class="col-md-8 col-md-offset-2">

            <div id="owl-test">

                {{-- FIRST SLIDE --}}
                <div class="item">
                    <div class="cp-ex-slider row">

                        @foreach($logos as $logo)
                            <div class="col-md-3 col-sm-6">
                                <!-- Item Start -->
                                <div class="slide">
                                    <div class="cp-thumb">
                                        <img src="{{ url('images/'.$logo['logo']) }}" alt="">
                                    </div>
                                    <div class="cp-ex-title">
                                        <h3><a href="{{$logo['link']}}">{{$logo['name']}}</a></h3>
                                    </div>
                                </div><!-- item end -->
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- FIRST SLIDE END --}}

                @foreach($logos as $key => $logo)
                    {{-- SECOND SLIDE --}}
                    <div class="item">
                        <div class="cp-ex-slider row">
                            <div class="col-md-4 col-md-offset-4">
                                <!-- Item Start -->
                                <div class="slide">
                                    <div class="cp-thumb">
                                        <img src="{{ url('images/'.$logo['logo']) }}" alt="{{$logo['name']}}" />
                                    </div>
                                    <div class="cp-ex-title">
                                        <h3><a href="{{$logo['link']}}">{{$logo['name']}}</a></h3>
                                    </div>
                                </div><!-- item end -->
                            </div>
                        </div>

                        <div class="cp-ex-slider row">
                            <div class="col-md-10 col-md-offset-1">
                                <div style="text-align: center">
                                    @if(isset($logosLinks[$key]))
                                        @foreach($logosLinks[$key] as $btn)
                                            <a href="{{$btn->link}}" class="btn btn-lg btn-primary">{{$btn->title}}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-md-3 col-sm-6">
                            <button class="btn btn-lg btn-block btn-primary">What We Do</button>
                        </div> --}}
                    </div>
                </div>
                {{-- SECOND SLIDE END --}}
            @endforeach

        </div>

    </div>
    {{-- <div class="col-md-2" style="text-align: center;" id="nextSlide">
    <div style="margin-top: 100%">
    <i class="fa fa-5x fa-chevron-right" aria-hidden="true"></i>
</div>
</div> --}}
</div>


{{-- <div class="row">
<div class="col-md-3 col-md-offset-3">
<button class="btn btn-block" id="prevSlide">Previous</button>
</div>
<div class="col-md-3">
<button class="btn btn-block">Next</button>
</div>
</div> --}}
</div>
</section><!-- Our Experties End -->

<hr style="clear: both" />

<div class="container-fluid">
    <div class="row" style="text-align: center;">
        <?php $i = 0; ?>
        @foreach($logos as $logo)
            <div
            class="col-md-1 col-sm-3
            <?php if($i == 0){echo "col-md-offset-2";} ?>
            "
            title="{{$logo['name']}}" style="padding: 20px; cursor: pointer">
            <a class="goSlide" gotoslide="{{$i}}">
                <img class="img-responsive img" src="{{ url('images/'.$logo['logo']) }}" alt="">
            </a>
        </div>
        <?php $i++; ?>
    @endforeach
</div>
</div>

</div>
<!-- Main Content End -->

@endsection


@section('footer_scripts')
    <script>
    $(document).ready(function(){
        var owl = $("#owl-test");
        owl.owlCarousel({
            loop:true,
            singleItem:true,
            navigation : false,
            items : 1,
            itemsDesktop : false,
            itemsDesktopSmall : false,
            itemsTablet: false,
            itemsMobile : false
        });
        var owlCtrl = $("#owl-test").data('owlCarousel');

        $("#prevSlide").click(function(){
            owlCtrl.prev();
        });
        $("#nextSlide").click(function(){
            owlCtrl.next();
        });

        $(".goSlide").click(function(){
            var slideNo = +$(this).attr("gotoslide") + 1;

            owlCtrl.goTo(slideNo);
        })
    });
    </script>
@endsection
