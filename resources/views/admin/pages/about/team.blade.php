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

            <div class="col-sm-12">
                @include("inc/flash")
            </div>

            <div class="col-sm-6 col-sm-offset-3">
                <section class="panel">
                    <header class="panel-heading">
                        Add a new Team member
                    </header>
                    <div class="panel-body">
                        <form action="{{url('admin/about/team')}}" method="post" enctype="multipart/form-data" class="avatar">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="slim"
                                    data-label="Drop your avatar here"
                                    data-size="360,400"
                                    data-ratio="1:1">
                                    <input type="file" name="image" id="slim" /></div>
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
                                        <textarea style="resize: none" rows="4" name="summary" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-google"></i>
                                        </span>
                                        <input type="text" class="form-control" name="google" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-twitter"></i>
                                        </span>
                                        <input type="text" class="form-control" name="twitter" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-facebook"></i>
                                        </span>
                                        <input type="text" class="form-control" name="facebook" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="fa fa-linkedin"></i>
                                        </span>
                                        <input type="text" class="form-control" name="linkedin" aria-describedby="basic-addon1">
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
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Position
                                    </th>
                                    <th class="col-sm-4">
                                        Summary
                                    </th>
                                    <th>
                                        Socials
                                    </th>
                                    <th class="col-sm-1">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($team))
                                    @foreach($team as $t)

                                        <tr class="odd gradeX">
                                            <td>
                                                <img src="{{ url("images/".$t->image) }}" class="img-round img-responsive" style="width: 50px" />
                                            </td>
                                            <td>
                                                {{ $t->name }}
                                            </td>
                                            <td>
                                                {{ $t->position }}
                                            </td>
                                            <td>
                                                {{ $t->summary }}
                                            </td>
                                            <td>
                                                <i class="fa fa-facebook"></i> - <a href="{{ $t->facebook }}">{{ $t->facebook }}</a><br />
                                                <i class="fa fa-twitter"></i> - <a href="{{ $t->twitter }}">{{ $t->twitter }}</a><br />
                                                <i class="fa fa-google"></i> - <a href="{{ $t->google }}">{{ $t->google }}</a><br />
                                                <i class="fa fa-linkedin"></i> - <a href="{{ $t->linkedin }}">{{ $t->linkedin }}</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this team member - {{ $t->name }}?')"
                                                href="{{ url('admin/about/team/remove/'. $t->id) }}">
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
    <link href="{{ url('') }}/assets/summernote/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
@stop
@section('scripts')
    <script src="{{ url('') }}/assets/summernote/summernote.min.js"></script>
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>
    {{-- @include('admin.includes.datatable') --}}

@stop
