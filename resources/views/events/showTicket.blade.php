@extends('layouts.app')

@section('content')
<hr style="clear: both" />
    <div class="container" style="text-align: center; padding: 20px 0px">
        <h2 class="text-success">You have successfully purchased your ticket.</h2>
        <br />
        <h3>Ticket Number: <b>{{$ticket->ticket}}</b></h3>
        <hr />
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <img src="{{ url("userPhotos/".$ticket->event->image) }}" class="img-responsive" />
            </div>
        </div>
        <h1>{{$ticket->event->title}}</h1>
        <div class="post-meta">
            <i class="fa fa-calendar"></i> {{$ticket->event->datetime->format("d M, Y")}} &nbsp;&nbsp;&middot;&nbsp;&nbsp;
            <i class="fa fa-clock-o"></i> {{$ticket->event->datetime->format("h:i a")}} &nbsp;&nbsp;&middot;&nbsp;&nbsp;
            <i class="fa fa-map-marker"></i> {{$ticket->event->venue[0]}}
        </div>
        <hr />

        <?php $pstring = ""; ?>
        @foreach($ticket->getPackages() as $package)
            <?php $pstring .= $package->id.","; ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel" style="border: 1px solid silver; text-align: left">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4>{{$package->package->title}}</h4>
                                    <p>{{$package->package->description}}</p>
                                </div>
                                <div class="col-md-3" style="text-align: right">
                                    <h3>
                                        {{$package->currencyObj()->symbol}} {{number_format($package->amount)}}
                                        <br />
                                        <small>{{$package->name}}</small>
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
                    <p>This ticket belongs to:</p>
                    <div>
                        <h3>{{$ticket->name}}</h3>
                        <h4>{{$ticket->email}}</h4>
                        <h4>{{$ticket->phone}}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3" style="text-align: right; font-weight: lighter">
                <div>
                    Ticket Number: <b>{{$ticket->ticket}}</b>
                    <br /><br />
                    {!! DNS1D::getBarcodeHTML($ticket->ticket, "C39") !!}
                </div>
                <br />

            </div>
        </div>


    </div>

@stop

@section('footer_scripts')
    <script src="{{ url('js/stack.js') }}" ></script>
@stop
