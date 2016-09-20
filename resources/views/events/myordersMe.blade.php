@extends('events.layout.default')
@section('title')
    My Service Orders
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Service Orders made to Me
        </h3>
        <span class="sub-title">Manage Service Orders made to you</span>
    </div>

    <div class="wrapper">
        <div class="row">

            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            @if(count($orders) < 1)
                <div class="col-sm-12">
                    <div class="alert alert-info">
                        <h3>No one has ordered your services yet
                        </h3>
                    </div>
                </div>
            @else
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            All My Service Orders ({{count($orders)}})
                        </header>
                        <div class="panel-body">
                            <table class="table convert-data-table data-table"  id="sample_1">
                                <thead>
                                    <tr>
                                        <th>
                                            Event Type
                                        </th>
                                        <th>
                                            Message
                                        </th>
                                        <th>
                                            Address/Services
                                        </th>
                                        <th>
                                            Budget
                                        </th>
                                        <th>
                                            Created
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Updated
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($orders))
                                        @foreach($orders as $order)
                                            <tr class="odd gradeX
                                            @if($order->status == 'cancelled')
                                                danger
                                            @elseif($order->status == 'paid')
                                                success
                                            @endif
                                            ">
                                            <td>
                                                {{ $order['event_type'] }}
                                            </td>
                                            <td class="col-sm-2">
                                                {{$order->comment}}
                                            </td>
                                            <td class="col-sm-2">
                                                <b>{{$order->address}}</b><br />

                                                <small>
                                                    @foreach($order->event_services as $s)
                                                        {{$s}},
                                                    @endforeach
                                                </small>
                                            </td>
                                            <td class="col-sm-1">
                                                {{number_format($order->budget)}} {{$order->currency}}
                                            </td>
                                            <td title="{{$order['created_at']}}">
                                                <small>{{ $order['created_at']->diffForHumans() }}</small>
                                            </td>
                                            <td class="<?php
                                            switch ($order['status']) {
                                                case 'pending':
                                                echo "warning";
                                                break;

                                                case 'declined':
                                                echo "danger";
                                                break;

                                                case 'accepted':
                                                echo "success";
                                                break;

                                                case 'paid':
                                                echo "success";
                                                break;

                                                default:
                                                echo "warning";
                                                break;
                                            }
                                            ?>" >
                                            {{ UCFirst($order['status']) }}
                                        </td>
                                        <td title="{{$order['updated_at']}}">
                                            <small>{{ $order['updated_at']->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            @if($order['status'] != "cancelled" && $order['status'] != "declined" && $order['status'] != "paid")
                                                <a class="btn btn-sm btn-success"
                                                onclick="return confirm('Are you sure you want to accept this order?')"
                                                href="{{ url('events/list/orders/'. $order['id']."/accept") }}">
                                                <i class="fa fa-check"></i> &nbsp; Accept
                                            </a>

                                            <button class="btn btn-sm btn-warning"
                                            data-toggle="modal" data-target="#counterModal{{$order['id']}}">
                                            <i class="fa fa-money"></i> &nbsp; Counter
                                        </button>

                                        <a class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to reject this order?')"
                                        href="{{ url('events/list/orders/'. $order['id']."/decline") }}">
                                        <i class="fa fa-close"></i> &nbsp; Decline
                                    </a>
                                @endif

                                <button class="btn btn-sm btn-info"
                                data-toggle="modal" data-target="#userModal{{$order['id']}}">
                                <i class="fa fa-user"></i>
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="counterModal{{$order['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Counter this Offer</h4>
                                        </div>
                                        <div class="modal-body">

                                            <h3>Offer History</h3>
                                            <div class="row form-group" style="border-bottom: 1px solid silver">
                                                <div class="col-sm-2">
                                                    <h4><b>Made By</b></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><b>Budget</b></h4>
                                                </div>
                                                <div class="col-sm-5">
                                                    <h4><b>Message</b></h4>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h4><b>Date / Time</b></h4>
                                                </div>
                                            </div>

                                            @foreach($order->history as $h)
                                                <div class="row form-group" style="border-bottom: 1px solid silver">
                                                    <div class="col-sm-2">
                                                        <h4>{{$h['made_by']}}</h4>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <h4>{{number_format($h['budget'])}}</h4>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <h4><small>{{$h['message']}}</small></h4>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h4><small>{{$h['datetime']}}</small></h4>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <br /><hr />
                                            <form method="POST" action="{{url("events/list/orders/".$order['id']."/counter")}}">
                                                <div class="row form-group">
                                                    <div class="col-sm-4">
                                                        <h4>Counter Offer: </h4>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="budget" value="{{$order->budget}}" class="form-control">
                                                        <input type="hidden" name="made_by" value="{{$user->name}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-4">
                                                        <h4>Comment/Message: </h4>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <textarea name="message" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Make Offer</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- USER MODAL --}}
                            <div class="modal fade" id="userModal{{$order['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Owner of this Offer</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-rounded" src="{{url('userPhotos/'.$order->owner->info->picture)}}" style="width: 100px" />
                                            <h3>{{$order->owner->name}}</h3>
                                            <h3>{{$order->owner->email}}</h3>
                                            <h3>{{$order->owner->phone}}</h3>

                                            <hr />

                                            <h3>Offer History</h3>
                                            <div class="row form-group" style="border-bottom: 1px solid silver">
                                                <div class="col-sm-2">
                                                    <h4><b>Made By</b></h4>
                                                </div>
                                                <div class="col-sm-2">
                                                    <h4><b>Budget</b></h4>
                                                </div>
                                                <div class="col-sm-5">
                                                    <h4><b>Message</b></h4>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h4><b>Date / Time</b></h4>
                                                </div>
                                            </div>
                                            <?php //$order->history = json_decode($order->history) ?>
                                            @foreach($order->history as $h)
                                                <div class="row form-group" style="border-bottom: 1px solid silver">
                                                    <div class="col-sm-2">
                                                        <h4>{{$h['made_by']}}</h4>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <h4>{{number_format($h['budget'])}}</h4>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <h4><small>{{$h['message']}}</small></h4>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h4><small>{{$h['datetime']}}</small></h4>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>

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
