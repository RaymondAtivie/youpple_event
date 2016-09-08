@extends('events.layout.default')
@section('title')
    My Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            My Service Orders
        </h3>
        <span class="sub-title">Manage your Service Orders</span>
    </div>

    <div class="wrapper">
        <div class="row">

            <div class="col-sm-12">
                @include('inc/flash')
            </div>

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
                                        Address
                                    </th>
                                    <th>
                                        Services
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
                                        <tr class="odd gradeX">
                                            <td>
                                                {{ $order['event_type'] }}
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

                                                case 'denied':
                                                echo "danger";
                                                break;

                                                case 'approved':
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
                                        <td class="col-sm-2">
                                            <a class="btn btn-sm btn-info disabled"
                                            href="{{ url('events/'. $order['id']) }}"
                                            title="Can't pay until it is approved">
                                            <i class="fa fa-money"></i> &nbsp; Pay
                                        </a>

                                        <a class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to cancel this order?')"
                                        href="{{ url('events/myorders/'. $order['id']."/cancel") }}">
                                        <i class="fa fa-close"></i> &nbsp; Cancel Order
                                    </a>

                                </td>

                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

        </div>
    </section>
</div>
</div>
</div>
@stop
@section('styles')
@stop
@section('scripts')
@stop
