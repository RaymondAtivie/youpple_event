@extends('admin.layout.default')
@section('title')
    Featured Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            All Service Providers
        </h3>
        <span class="sub-title">Users of Youpple</span>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Service Providers
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    {{-- <th>
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                </th> --}}
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
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($users))
                                @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td>
                                            {{ $user['name'] }}
                                        </td>
                                        <td>
                                            {{ $user['email'] }}
                                        </td>
                                        <td>
                                            {{ $user['phone'] }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" onclick="return confirm('Are you sure you want to add to Featured events - {{ $user['name'] }}?')" href="{{ url('admin/artisan/add/'. $user['id']) }}">
                                                <i class="fa fa-pencil"></i> &nbsp; More Info
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to add to Featured events - {{ $user['name'] }}?')" href="{{ url('admin/artisan/add/'. $user['id']) }}">
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
