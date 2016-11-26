@extends('events.layout.default')
@section('title')
    Tickets for {{$event->title}}
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Tickets for <b>{{$event->title}}</b>
        </h3>
        <span class="sub-title">View tickets for your <b>{{$event->title}}</b> event on Youpple</span>
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
                        All Paid Tickets for <b>{{$event->title}}</b> ({{count($event->tickets)}})
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Transaction Ref
                                    </th>
                                    <th>
                                        Ticket No
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>

                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Packages
                                    </th>
                                    <th>
                                        Total Price
                                    </th>
                                    <th>
                                        Paid
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event->tickets as $ticket)
                                    <tr class="odd gradeX <?php if($ticket->revoked){ echo "warning";} ?>">
                                        <td>
                                            {{ $ticket->transaction_ref }}
                                        </td>
                                        <td>
                                            {{ $ticket->ticket }}
                                        </td>
                                        <td>
                                            {{ $ticket->name }}
                                        </td>
                                        <td class="col-sm-2">
                                            {{ $ticket->email }}
                                        </td>
                                        <td>
                                            {{ $ticket->phone }}
                                        </td>
                                        <td>
                                            {{ count($ticket->packages) }}
                                        </td>
                                        <td>
                                            N{{ number_format($ticket->total) }}
                                        </td>
                                        <td title="{{$ticket->created_at}}">
                                            {{$ticket->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ url('events/'. $event['id']) }}" target="_blank">
                                                <i class="fa fa-pencil"></i> &nbsp; Event Details
                                            </a>

                                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal{{$ticket->id}}">
                                                View Packages
                                            </button>

                                            @if(!$ticket->revoked)
                                                <a class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to revoke this ticket - {{ $ticket->ticket }}?')"
                                                href="{{ url('events/myevent/ticket/revoke/'. $ticket->id) }}">
                                                <i class="fa fa-close"></i> &nbsp; Revoke
                                            @else
                                                <a class="btn btn-sm btn-warning"
                                                onclick="return confirm('Are you sure you want to unrevoke this ticket - {{ $ticket->ticket }}?')"
                                                href="{{ url('events/myevent/ticket/unrevoke/'. $ticket->id) }}">
                                                <i class="fa fa-check"></i> &nbsp; Unrevoke
                                            @endif
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">{{$ticket->ticket}} - {{$ticket->name}}</h4>
                                                    </div>
                                                    <div class="modal-body card-details">
                                                        @foreach($ticket->getPackages() as $package)
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <b>{{$package->package->title}}</b>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    {{$package->package->description}}
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <b title="N{{$package->calcNaira()}}">
                                                                        {{$package->currencyObj()->symbol}} {{number_format($package->amount)}}
                                                                    </b>
                                                                    <br />
                                                                    <small>{{$package->name}}</small>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <div>
                                                            <div class="col-sm-9">
                                                                <h3>TOTAL</h3>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <h3>N{{number_format($ticket->total)}}</h3>
                                                            </div>
                                                        </div>
                                                        <hr style="clear: both" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

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
