 @extends('admin.layout.default')
@section('title')
    Change Clients
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Clients
        </h3>
        <span class="sub-title">Change the clients of Youpple</span>
    </div>

    <div class="wrapper">
        <div class="row">
            <div>
                @include("inc/flash")
            </div>

            <div class="col-sm-6 col-sm-offset-3">
                <section class="panel">
                    <header class="panel-heading">
                        Add a new Client
                    </header>
                    <div class="panel-body">
                        <form action="{{url('admin/about/clients')}}" method="post" enctype="multipart/form-data" class="avatar">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="slim"
                                    data-label="Drop your avatar here"
                                    data-size="240,240"
                                    data-ratio="1:1">
                                    <input type="file" name="image" required /></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <hr />
                                    <div class="form-group">
                                        <button type="submit" type="button" class="btn btn-info">Add</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Clients
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    {{-- <th>
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                </th> --}}
                                <th>
                                    Image
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($clients))
                                @foreach($clients as $client)

                                    <tr class="odd gradeX">
                                        <td>
                                            <img src="{{ url("images/".$client->image) }}" class="img-round img-responsive" style="width: 50px" />
                                        </td>
                                        <td>
                                            {{ $client->name }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this client - {{ $client->name }}?')"
                                            href="{{ url('admin/about/clients/remove/'. $client->id) }}">
                                                <i class="fa fa-trash"></i> Delete
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
    {{-- @include('admin.includes.datatable') --}}
@stop
