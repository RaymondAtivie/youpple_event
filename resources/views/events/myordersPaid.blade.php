@extends('events.layout.default')
@section('title')
    My Service Orders
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Paid Service Orders
        </h3>
        <span class="sub-title">Manage Service Orders that you have paid for</span>
    </div>

    <div class="wrapper">
        <div class="row">

            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            @if(count($orders) < 1)
                <div class="col-sm-12">
                    <div class="alert alert-info">
                        <h3>You have not paid for a service order &nbsp; &nbsp;
                            <a href="{{ url("events/order") }}" class="btn btn-primary">Order Event Service</a>
                        </h3>
                    </div>
                </div>
            @else
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            All My Paid Service Orders ({{count($orders)}})
                        </header>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table convert-data-table data-table"  id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>
                                                Event Type
                                            </th>
                                            <th>
                                                Provider
                                            </th>
                                            <th>
                                                Address
                                            </th>
                                            <th>
                                                Services
                                            </th>
                                            <th>
                                                Amount
                                            </th>
                                            <th>
                                                Paid
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Days Left
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($orders))
                                            @foreach($orders as $order)
                                                <tr class="odd gradeX">
                                                    <td>
                                                        @foreach($order->event_type as $s)
                                                            {{$s}},
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($order->provider->info->user_type == "Business")
                                                            {{ $order->provider->info->business_name }}
                                                        @else
                                                            {{ $order->provider->name }}
                                                        @endif
                                                    </td>
                                                    <td class="col-sm-2">
                                                        {{$order->address}}
                                                    </td>
                                                    <td class="col-sm-2">
                                                        <small>
                                                            @foreach($order->event_services as $s)
                                                                {{$s}},
                                                            @endforeach
                                                        </small>
                                                    </td>
                                                    <td class="col-sm-1" title="N{{$currObj::find($order->currency)->calcNaira($order->budget)}}">
                                                        {{$currObj::find($order->currency)->symbol}}{{number_format($order->budget)}}
                                                    </td>
                                                    <td title="{{$order->paymentDetails['created_at']}}">
                                                        <small>{{ $order->paymentDetails['created_at']->diffForHumans() }}</small>
                                                    </td>
                                                    <td class="<?php
                                                    switch ($order->checkHistoryStatus()) {
                                                        case 'pending':
                                                        echo "warning";
                                                        break;

                                                        case 'complain':
                                                        echo "danger";
                                                        break;

                                                        case 'confirmed':
                                                        echo "success";
                                                        break;

                                                        default:
                                                        echo "warning";
                                                        break;
                                                    }
                                                    ?>" >
                                                    {{ UCFirst($order->checkHistoryStatus()) }}
                                                </td>
                                                <td title="{{$order->paymentDetails['created_at']}}" style="text-align: center">
                                                    @if($order->checkHistoryStatus() != 'pending')
                                                        -
                                                    @else
                                                        <small>
                                                            {{ $order->paymentDetails['created_at']->diffInDays($order->paymentDetails['created_at']->copy()->addMonth()) }}
                                                        </small>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($order->checkHistoryStatus() != 'confirmed')
                                                        <a href="{{ url("events/myorders/paid/".$order->paymentDetails->id."/confirm") }}"
                                                            onclick="return confirm('You are about to confirm that this service was delivered to you')"
                                                            class="btn btn-sm btn-success">
                                                            <i class="fa fa-check"></i> Confirm Delivery
                                                        </a>
                                                    @endif
                                                    @if($order->checkHistoryStatus() == 'pending')
                                                        <button data-toggle="modal" data-target="#complainModal{{$order['id']}}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fa fa-close"></i> Complain
                                                    </button>
                                                @endif
                                            </td>

                                            <div class="modal danger fade" id="complainModal{{$order['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header danger">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Make a Complain</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form method="POST" action="{{ url("events/myorders/paid/".$order->paymentDetails->id."/complain") }}">
                                                                <div class="row form-group">
                                                                    <div class="col-sm-12">
                                                                        <h4>What complain do you have?</h4>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <textarea name="message" rows="3" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Submit</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
        </div>
    @endif

</div>
</div>
@stop
@section('styles')
@stop
@section('scripts')
    <script src="{{ url('js/stack-order.js') }}" ></script>
@stop
