@extends('admin.layout.default')
@section('title')
    Featured Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            <button class="btn btn-info">
                <i class="fa fa-user"></i>
            </button>
            {{$provider->name}} - Payments
        </h3>
        <span class="sub-title">Payments made to {{$provider->name}}</span>
    </div>
    <style>
    .bold{
        font-weight: bold;
    }
    .card-details{
        padding-top: 0px;
    }
    .card-details .row{
        border-bottom: 1px solid #eee;
        padding: 15px;
    }
    </style>

    <div class="wrapper">
        <div class="row">

            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Service Providers Payments
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Complain Message
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Money Transfered
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($lists))
                                    @foreach($lists as $list)
                                        <tr class="odd gradeX">
                                            <td>
                                                <button class="btn btn-sm btn-info">
                                                    <i class="fa fa-user"></i>
                                                </button>
                                                {{ $list->owner->name }}
                                            </td>
                                            <td>
                                                {{ number_format($list->amount) }}
                                            </td>
                                            <td class="<?php
                                            switch ($list->status) {
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
                                            ?>">
                                            {{ $list->status }}
                                        </td>
                                        <td>
                                            {{ $list->message }}
                                        </td>
                                        <td class="col-sm-3">
                                            {{ $list->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $list->youpple_pay }}
                                        </td>
                                        <td>
                                            @if($list->youpple_pay == 'no')
                                                <a class="btn btn-sm btn-success"
                                                href="{{ url("admin/payments/due/".$list->id)."/transfer" }}"
                                                onclick="return confirm('Have you indeed transfered the money?')">
                                                <i class="fa fa-money"></i> &nbsp; Confirm Money Transfer
                                            @endif
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
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
@stop
@section('scripts')
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>
    @include('admin.includes.datatable')
@stop
