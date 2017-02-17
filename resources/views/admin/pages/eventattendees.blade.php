@extends('admin.layout.default')
@section('title')
    {{ $event->title }}  Attendees
@stop
@section('main')
    <div class="page-head">
        <h3>
            {{ count($attendees) }} Attendees
        </h3>
        <span class="sub-title">All   {{ $event->title }}  Attendees</span>

    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                          {{ $event->title }}  Attendees
                    </header>
                    <div class="panel-body">
                         <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    </th> -->
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Code
                                    </th>
                                    <th>
                                        Ticket
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                       Joined
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($attendees))
                                    @foreach($attendees as $attendee)

                                            <tr class="odd gradeX">
                                                <td>
                                                  {{ $attendee->name }}
                                                </td>
                                                <td>
                                                  {{ $attendee->code }}
                                                </td>
                                                <td>
                                                  {{ $attendee->ticket->name }}
                                                </td>
                                                <td>
                                                  {{ $attendee->email }}
                                                </td>
                                                <td>
                                                   {{ $attendee->created_at }}
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
@include('admin.includes.datatable')
