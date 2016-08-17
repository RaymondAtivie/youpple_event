@extends('admin.layout.default')
@section('title')
    Featured Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            All Events
        </h3>
        <span class="sub-title">View all events of Youpple</span>
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
                                    {{-- <th>
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                </th> --}}
                                <th>
                                    Title
                                </th>

                                <th>
                                    Start date
                                </th>
                                <th>
                                    End date
                                </th>
                                <th>
                                    Delete
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
                                        <td>
                                            {{ $event['datetime']->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $event['datetime_end']->diffForHumans() }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" onclick="return confirm('Are you sure you want to add to Featured events - {{ $event['name'] }}?')" href="{{ url('admin/artisan/add/'. $event['id']) }}">
                                                <i class="fa fa-pencil"></i> &nbsp; More Info
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to add to Featured events - {{ $event['name'] }}?')" href="{{ url('admin/artisan/add/'. $event['id']) }}">
                                                <i class="fa fa-trash"></i> &nbsp; Delete
                                            </button>
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
