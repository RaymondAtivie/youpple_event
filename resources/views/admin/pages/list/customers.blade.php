@extends('admin.layout.default')
@section('title')
    Featured Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            All Users
        </h3>
        <span class="sub-title">Users of Youpple</span>
    </div>

    <style>
    .bold{
        font-weight: bold;
    }
    .card-details{
        padding-top: 0px;
    }
    .card-details .row{
        border-bottom: 1px solid #eee;
        padding: 15px;
    }
    </style>

    <div class="wrapper">
        <div class="row">

            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Users ({{count($users)}})
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
                                    Type
                                </th>
                                <th>
                                    Actions
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
                                            @if($user->info)
                                                {{ UCfirst($user->info->user_type) }}
                                            @else
                                                Customer
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal{{$user['id']}}">
                                                <i class="fa fa-pencil"></i> &nbsp; More Info
                                            </button>
                                            <a class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this customer? {{ $user['name'] }}?')"
                                            href="{{ url('admin/list/customers/remove/'. $user['id']) }}">
                                            <i class="fa fa-trash"></i> &nbsp; Delete
                                        </a>
                                    </td>

                                    <div class="modal fade" id="myModal{{$user['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{{$user->name}} - Details</h4>
                                                </div>
                                                <div class="modal-body card-details">
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Full name</div>
                                                        <div class="col-sm-8">{{$user->name}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Email</div>
                                                        <div class="col-sm-8">{{$user->email}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Phone</div>
                                                        <div class="col-sm-8">{{$user->phone}}</div>
                                                    </div>
                                                    @if(!$user->info)
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="alert alert-info" style="text-align: center">
                                                                    This user hasn't completed thier full profile
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Gender</div>
                                                            <div class="col-sm-8">{{$user->info->gender}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Date of birth</div>
                                                            <div class="col-sm-8">{{$user->info->dob}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Address</div>
                                                            <div class="col-sm-8">{{$user->info->address}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Prefered currency</div>
                                                            @if($user->info->currency)
                                                                <div class="col-sm-8">{{$currObj::find($user->info->currency)->name}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-twitter"></i> Twitter</div>
                                                            <div class="col-sm-8">{{$user->info->social_twitter}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-facebook"></i> Facebook</div>
                                                            <div class="col-sm-8">{{$user->info->social_facebook}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-instagram"></i> Instagram</div>
                                                            <div class="col-sm-8">{{$user->info->social_instagram}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-bbm"></i> BBM</div>
                                                            <div class="col-sm-8">{{$user->info->social_bbm}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-google"></i> Google</div>
                                                            <div class="col-sm-8">{{$user->info->social_google}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Description</div>
                                                            <div class="col-sm-8">{{$user->info->description}}</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Eye color</div>
                                                            <div class="col-sm-2">{{$user->info->desc_eye_color}}</div>
                                                            <div class="col-sm-4 bold">Hair color</div>
                                                            <div class="col-sm-2">{{$user->info->desc_hair_color}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Height</div>
                                                            <div class="col-sm-2">{{$user->info->desc_height}}</div>
                                                            <div class="col-sm-4 bold">Weight</div>
                                                            <div class="col-sm-2">{{$user->info->desc_weight}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Sleeve Length</div>
                                                            <div class="col-sm-2">{{$user->info->desc_sleeve}}</div>
                                                            <div class="col-sm-4 bold">Waist Measurement</div>
                                                            <div class="col-sm-2">{{$user->info->desc_waist}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Lap</div>
                                                            <div class="col-sm-2">{{$user->info->desc_lap}}</div>
                                                            <div class="col-sm-4 bold">DL</div>
                                                            <div class="col-sm-2">{{$user->info->desc_dl}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Back Measurement</div>
                                                            <div class="col-sm-2">{{$user->info->desc_back}}</div>
                                                            <div class="col-sm-4 bold">Bust Measurement</div>
                                                            <div class="col-sm-2">{{$user->info->desc_bust}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Trouser Length</div>
                                                            <div class="col-sm-8">{{$user->info->desc_trouser}}</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Interests</div>
                                                            <div class="col-sm-8">
                                                                @foreach($user->info->intrests as $intrests)
                                                                    {{$intrests}}<?php if($user->info->intrests[count($user->info->intrests)-1] != $intrests){echo ", ";} ?>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
