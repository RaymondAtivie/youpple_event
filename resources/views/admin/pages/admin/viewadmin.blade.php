@extends('admin.layout.default')
@section('title')
    Admin Management
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Administrator Management
        </h3>
        <span class="sub-title">Manage admins on Youpple</span>
    </div>

    <div class="wrapper">
        <div class="row">

            <div class="col-sm-12">
                @include("inc/flash")
            </div>

            <div class="col-sm-6 col-sm-offset-3">
                <section class="panel">
                    <header class="panel-heading">
                        Add a new Administrator
                    </header>
                    <div class="panel-body">
                        <form action="{{url('admin/admin/add')}}" method="post" enctype="multipart/form-data">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Full Name</label>
                                        <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="">--SELECT--</option>
                                            <option value="admin">Administrator</option>
                                            <option value="finadmin">Financial Administrator</option>
                                            <option value="superadmin">Super Administrator</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Confrim Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <hr />
                                    <div class="form-group">
                                        <button type="submit" type="button" class="btn btn-info">Add Admin</button>
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
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th class="col-sm-1">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($admins))
                                    @foreach($admins as $a)

                                        <tr class="odd gradeX">
                                            <td>
                                                {{ $a->fullname }}
                                            </td>
                                            <td>
                                                {{ $a->email }}
                                            </td>
                                            <td>
                                                {{ $a->role }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this Admin - {{ $a->fullname }}?')"
                                                href="{{ url('admin/admin/delete/'. $a->id) }}">
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
