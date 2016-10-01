@extends('admin.layout.default')
@section('title')
    Featured Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Service Providers Payment
        </h3>
        <span class="sub-title">Service providers payment details of Youpple</span>
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
                <section class="panel">
                    <header class="panel-heading">
                        Service Providers Payments
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Amount Made
                                    </th>
                                    <th>
                                        Amount Paid
                                    </th>
                                    <th>
                                        Amount Due
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
                                                {{ $list['provider']->name }}
                                            </td>
                                            <td>
                                                {{ $list['provider']->info->user_type }}
                                            </td>
                                            <td>
                                                {{ $list['amount'] }}
                                            </td>
                                            <td>
                                                {{ $list['amount'] }}
                                            </td>
                                            <td class="col-sm-3">

                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                href="{{ url("admin/payments/due/".$list['provider']->id) }}">
                                                <i class="fa fa-list"></i> &nbsp; Details
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
