@extends('admin.layout.default')
@section('title')
    Change Featured Providers
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Featured Providers
        </h3>
        <span class="sub-title">Change the featured providers for Youpple</span>
    </div>

    <div class="wrapper">

        <div class="row">
            <div class="col-sm-12">
                <section class="panel panel-warning">
                    <header class="panel-heading">
                        Featured Providers
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_2">
                            <thead>
                                <tr>
                                    {{-- <th>
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                </th> --}}
                                <th>
                                    Title
                                </th>

                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($fEvents))
                                @foreach($fEvents as $event)

                                    <tr class="odd gradeX">
                                        <td>
                                            {{ $event['title'] }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to add to remove Featured events - {{ $event['name'] }}?')" href="{{ url('admin/artisan/add/'. $event['id']) }}">
                                                <i class="fa fa-star-o"></i> Remove from Featured
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

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    All Providers
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
                                Featured
                            </th>
                            {{-- <th>
                                Delete
                            </th> --}}
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
                                        <button class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to add to Featured events - {{ $event['name'] }}?')" href="{{ url('admin/artisan/add/'. $event['id']) }}">
                                            <i class="fa fa-star"></i> Add to Featured
                                        </button>
                                    </td>
                                    {{-- <td>
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete Artisan {{ $event['name'] }}?')" href="{{ url('admin/artisan/delete/'. $event['id']) }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td> --}}
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
