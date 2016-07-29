@extends('admin.layout.default')
@section('title')
    All Events
@stop
@section('main')
    <div class="page-head">
        <h3>
            {{ count($events) }} Customers
        </h3>
        <span class="sub-title">All Users of the website</span>

    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Events
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
                                        Organiser
                                    </th>
                                    <th>
                                        Tickets
                                    </th>
                                    <th>
                                       Created
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($events))
                                    @foreach($events as $event)

                                            <tr class="odd gradeX">
                                                <td>
                                                  {{ $event->title }}
                                                </td>
                                                <td>
                                                  {{ $event->organiser->name }}
                                                </td>
                                                <td>
                                                  {{ count($event->tickets) }}
                                                </td>
                                                <td>
                                                   {{ $event->created_at }}
                                                </td>
                                                <td>
                                                  <a class="label label-success"
                                                      href="{{ url('admin/artisan/'. $event->event_id) }}">
                                                       <i class="fa fa-eye"></i> View
                                                   </a>
                                                   <a class="label label-primary"
                                                       href="{{ url('admin/event/attendees/'. $event->event_id) }}">
                                                        <i class="fa fa-eye"></i> Attendees
                                                    </a>
                                                   <a class="label label-danger" onclick="return confirm('Are you sure you want to delete Artisan {{ $event->title }}?')"
                                                      href="{{ url('admin/artisan/delete/'. $event->event_id) }}">
                                                       <i class="fa fa-trash"></i> Delete
                                                   </a>
                                                   <a class="label label-warning"
                                                      href="{{ url('admin/artisan/edit/'. $event->event_id) }}">
                                                       <i class="fa fa-edit"></i> Edit
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
@include('admin.includes.datatable')
