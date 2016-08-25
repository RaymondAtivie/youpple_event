@extends('events.layout.default')
@section('title')
    My Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            My Events
        </h3>
        <span class="sub-title">Manage Your Events</span>
    </div>

    <div class="wrapper">
        <div class="row">

            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All My Events ({{count($events)}})
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Address
                                    </th>

                                    <th>
                                        Start
                                    </th>
                                    <th>
                                        End
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($events))
                                    @foreach($events as $event)
                                        <tr class="odd gradeX">
                                            <td>
                                                {{ $event['title'] }}
                                            </td>
                                            <td class="col-sm-2">
                                                @foreach($event->venue as $venue)
                                                    {{$venue}}<?php if($event->venue[count($event->venue)-1] != $venue){echo " / ";} ?>
                                                @endforeach
                                            </td>
                                            <td title="{{$event['datetime']}}">
                                                {{ $event['datetime']->diffForHumans() }}
                                            </td>
                                            <td title="{{$event['datetime_end']}}">
                                                {{ $event['datetime_end']->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ url('events/'. $event['id']) }}" target="_blank">
                                                    <i class="fa fa-pencil"></i> &nbsp; Event Details
                                                </a>
                                                <a class="btn btn-sm btn-warning" href="{{ url('events/myevent/'. $event['id'])."/tickets" }}" target="_blank">
                                                    <i class="fa fa-tag"></i> &nbsp; Tickets
                                                </a>

                                                <a class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this event - {{ $event['title'] }}?')"
                                                href="{{ url('events/myevent/'. $event['id']."/remove") }}">
                                                <i class="fa fa-trash"></i> &nbsp; Delete
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal{{$event['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">{{$event->owner->name}}</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <h3>Name</h3>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <h3>{{$event->owner->name}}</h3>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <h3>Email</h3>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <h3>{{$event->owner->email}}</h3>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <h3>Phone</h3>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <h3>{{$event->owner->phone}}</h3>
                                                                </div>
                                                            </div>

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
