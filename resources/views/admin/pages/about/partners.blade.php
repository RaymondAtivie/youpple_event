@extends('admin.layout.default')
@section('title')
    Change Patners
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Partners
        </h3>
        <span class="sub-title">Change the partners for Youpple</span>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-6 col-sm-offset-3">
                <section class="panel">
                    <header class="panel-heading">
                        Change Partners tagline
                    </header>
                    <div class="panel-body">
                        <form action="{{url('admin/about/changeTagline')}}" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Tagline</label>
                                        <textarea name="tagline" class="form-control">{{$tagline}}</textarea>
                                        <input type="hidden" name="name" value="partners" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" type="button" class="btn btn-info">Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

            <div class="col-sm-6 col-sm-offset-3">
                <section class="panel">
                    <header class="panel-heading">
                        Add a new Partners
                    </header>
                    <div class="panel-body">
                        <form action="{{url('admin/about/partners')}}" method="post" enctype="multipart/form-data" class="avatar">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="slim"
                                    data-label="Drop the logo here"
                                    data-size="360,400"
                                    data-ratio="1:1">
                                    <input type="file" name="image" /></div>
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
                                    <div class="form-group">
                                        <label class="control-label">Link</label>
                                        <input type="text" name="link" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Summary</label>
                                        <textarea style="resize: none" rows="4" class="form-control" name="summary"></textarea>
                                        {{-- <input type="text" name="link" class="form-control" /> --}}
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
                        All Partners
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Link
                                </th>
                                <th>
                                    Summary
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($partners))
                                @foreach($partners as $partner)

                                    <tr class="odd gradeX">
                                        <td>
                                            <img src="{{ url("images/".$partner->image) }}" class="img-round img-responsive" style="width: 50px" />
                                        </td>
                                        <td>
                                            {{ $partner->name }}
                                        </td>
                                        <td>
                                            {{ $partner->link }}
                                        </td>
                                        <td>
                                            {{ $partner->summary }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this partner {{ $partner->name }}?')"
                                            href="{{ url('admin/about/partners/remove/'. $partner->id) }}">
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
