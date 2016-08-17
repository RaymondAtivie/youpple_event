@extends('admin.layout.default')
@section('title')
    Change Team
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Team
        </h3>
        <span class="sub-title">Change the team for Youpple</span>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <section class="panel">
                    <header class="panel-heading">
                        Add a new Team member
                    </header>
                    <div class="panel-body">
                        <form action="post.php" method="post" enctype="multipart/form-data" class="avatar">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="slim"
                                    data-label="Drop your avatar here"
                                    data-size="240,240"
                                    data-ratio="1:1">
                                    <input type="file" name="slim[]" required /></div>
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
                                        <label class="control-label">Position</label>
                                        <input type="text" name="position" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Summary</label>
                                        <textarea style="resize: none" rows="4" name="name" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-google"></i>
                                        </span>
                                        <input type="text" class="form-control" value="" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-twitter"></i>
                                        </span>
                                        <input type="text" class="form-control" value="" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-facebook"></i>
                                        </span>
                                        <input type="text" class="form-control" value="" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-linkedin"></i>
                                        </span>
                                        <input type="text" class="form-control" value="" aria-describedby="basic-addon1">
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
                        All Team Members
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
                                    Position
                                </th>
                                <th>
                                    Summary
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($testimonials))
                                @foreach($testimonials as $testimonial)

                                    <tr class="odd gradeX">
                                        <td>
                                            <img src="{{ url("images/".$testimonial['image']) }}" class="img-round img-responsive" style="width: 50px" />
                                        </td>
                                        <td>
                                            {{ $testimonial['name'] }}
                                        </td>
                                        <td>
                                            {{ $testimonial['position'] }}
                                        </td>
                                        <td>
                                            {{ $testimonial['description'] }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete Artisan {{ $testimonial['name'] }}?')" href="{{ url('admin/artisan/delete/'. $testimonial['name']) }}">
                                                <i class="fa fa-trash"></i> Delete
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
