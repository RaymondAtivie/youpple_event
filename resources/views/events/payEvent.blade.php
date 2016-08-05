@extends('layouts.app')

@section('content')

    <div class="container" style="text-align: center; padding: 20px 0px">
        <h2>Thank you for registering</h2>
        <hr />
        <h1>{{$event->title}}</h1>
        <div class="post-meta">
            <i class="fa fa-calendar"></i> {{$event->datetime->format("d M, Y")}} &nbsp;&nbsp;&middot;&nbsp;&nbsp;
            <i class="fa fa-clock-o"></i> {{$event->datetime->format("h:i a")}} &nbsp;&nbsp;&middot;&nbsp;&nbsp;
            <i class="fa fa-map-marker"></i> {{$event->venue[0]}}
        </div>
        <hr />

        <?php $pstring = ""; ?>
        @foreach($packages as $package)
            <?php $pstring .= $package->id.","; ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel" style="border: 1px solid silver; text-align: left">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4>{{$package->title}}</h4>
                                    <p>{{$package->description}}</p>
                                </div>
                                <div class="col-md-3" style="text-align: right">
                                    <h3>
                                        {{$package->fee_currency}} {{number_format($package->fee_amount)}}
                                        <br />
                                        <small>{{$package->fee_style}}</small>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-5 col-md-offset-2" style="text-align: left">
                <div style="text-align: center; display: inline-block">
                    <p>This ticket would be for:</p>
                    <div>
                        <h3>{{$owner['name']}}</h3>
                        <h4>{{$owner['email']}}</h4>
                        <h4>{{$owner['phone']}}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3" style="text-align: right; font-weight: lighter">
                <div>
                    Total Fee: <b>₦ {{number_format($total)}}</b>
                </div>
                <br />
                @if($total < 1)
                    <a href="#">Get Tickets</a>
                @else
                    <form>
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <button
                        data-event="{{$event->id}}"
                        data-packages="{{$pstring}}"
                        data-total="{{$total}}"
                        data-name="{{$owner['name']}}"
                        data-email="{{$owner['email']}}"
                        data-phone="{{$owner['phone']}}"
                        data-sendurl="{{url('events/ticket/save')}}"
                        style="display: none"
                        type="button"
                        class="btn btn-primary btn-lg"
                        id="payButton"
                        autocomplete="off">Pay Now</button>
                    </form>
                @endif
            </div>
        </div>


    </div>

@stop

@section('footer_scripts')
    <script src="{{ url('js/stack.js') }}" ></script>

@stop
