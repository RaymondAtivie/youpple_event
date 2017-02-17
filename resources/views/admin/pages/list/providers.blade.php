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
        <span class="sub-title">Service providers of Youpple</span>
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
                                <th></th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Services
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($users))
                                @foreach($users as $user)
                                    @if($user)
                                        <tr class="odd gradeX">
                                            <td>
                                                {{ $user['name'] }}
                                            </td>
                                            <td>
                                                @if($user->info->verified)
                                                    <i style="color: purple" class="fa fa-certificate"></i>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $user->info->user_type }}
                                            </td>
                                            <td>
                                                {{ $user['email'] }}
                                            </td>
                                            <td>
                                                {{ $user['phone'] }}
                                            </td>
                                            <td class="col-sm-3">
                                                @foreach($user->info->event_services as $service)
                                                    {{$service}}<?php if($user->info->event_services[count($user->info->event_services)-1] != $service){echo ", ";} ?>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($user->info->verified)
                                                    <a class="btn btn-sm btn-success"
                                                    title="Unveriy this Provider"
                                                    onclick="return confirm('Are you sure you want to unverify this provider - {{ $user['name'] }}?')"
                                                    href="{{ url('admin/list/provider/'. $user['id'].'/unverify') }}">
                                                    <i class="fa fa-star"></i>
                                                </a>
                                            @else
                                                <a class="btn btn-sm btn-warning"
                                                title="Veriy this Provider"
                                                onclick="return confirm('Are you sure you want to verify this provider - {{ $user['name'] }}?')"
                                                href="{{ url('admin/list/provider/'. $user['id'].'/verify') }}">
                                                <i class="fa fa-star-o"></i>
                                            </a>
                                        @endif
                                        <button class="btn btn-sm btn-info"
                                        data-toggle="modal" data-target="#myModal{{$user['id']}}">
                                        <i class="fa fa-pencil"></i> &nbsp; More Info
                                    </button>
                                    <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user completely? - {{ $user['name'] }}?')"
                                    href="{{ url('admin/provider/'. $user['id'].'/block') }}">
                                    <i class="fa fa-trash"></i> &nbsp; Delete
                                </button>
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
                                            <div class="row">
                                                <div class="col-sm-4 bold">Gender</div>
                                                <div class="col-sm-8">{{$user->info->gender}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Business Name</div>
                                                <div class="col-sm-8">{{$user->info->business_name}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">{{$user->info->id_type}}</div>
                                                <div class="col-sm-8">{{$user->info->id_number}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Date of registration</div>
                                                <div class="col-sm-8">{{$user->info->dor}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Address</div>
                                                <div class="col-sm-8">{{$user->info->address}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Prefered currency</div>
                                                <div class="col-sm-8">
                                                    @if($user->info->currency)
                                                        {{$currObj::find($user->info->currency)->name}}
                                                    @endif
                                                </div>
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
                                                <div class="col-sm-4 bold">Event Services</div>
                                                <div class="col-sm-8">
                                                    @foreach($user->info->event_services as $service)
                                                        {{$service}}<?php if($user->info->event_services[count($user->info->event_services)-1] != $service){echo ", ";} ?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    @endif
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
