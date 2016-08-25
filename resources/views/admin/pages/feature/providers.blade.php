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
                <section class="panel panel-warning">
                    <header class="panel-heading">
                        Featured Providers
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_2">
                            <thead>
                                <tr>
                                    <th>
                                        Title
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
                                @if(!empty($fProviders))
                                    @foreach($fProviders as $provider)
                                        <tr class="odd gradeX">
                                            <td>
                                                {{ $provider['name'] }}
                                            </td>
                                            <td>
                                                {{ $provider['email'] }}
                                            </td>
                                            <td>
                                                {{ $provider['phone'] }}
                                            </td>
                                            <td class="col-sm-3">
                                                @foreach($provider->info->event_services as $service)
                                                    {{$service}}<?php if($provider->info->event_services[count($provider->info->event_services)-1] != $service){echo ", ";} ?>
                                                @endforeach
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info"
                                                data-toggle="modal" data-target="#myModal{{$provider['id']}}">
                                                <i class="fa fa-pencil"></i> &nbsp; More Info
                                            </button>
                                            <a class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to remove this featured provider - {{ $provider['name'] }}?')"
                                            href="{{ url('admin/feature/providers/remove/'. $provider['id']) }}">
                                            <i class="fa fa-star"></i> &nbsp; Remove from Featured
                                        </a>
                                    </td>

                                    <div class="modal fade" id="myModal{{$provider['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{{$provider->name}} - Details</h4>
                                                </div>
                                                <div class="modal-body card-details">
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Full name</div>
                                                        <div class="col-sm-8">{{$provider->name}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Email</div>
                                                        <div class="col-sm-8">{{$provider->email}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Phone</div>
                                                        <div class="col-sm-8">{{$provider->phone}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Gender</div>
                                                        <div class="col-sm-8">{{$provider->info->gender}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Business Name</div>
                                                        <div class="col-sm-8">{{$provider->info->business_name}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">{{$provider->info->id_type}}</div>
                                                        <div class="col-sm-8">{{$provider->info->id_number}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Date of registration</div>
                                                        <div class="col-sm-8">{{$provider->info->dor}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Address</div>
                                                        <div class="col-sm-8">{{$provider->info->address}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Prefered currency</div>
                                                        <div class="col-sm-8">{{$provider->info->currency}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold"><i class="fa fa-twitter"></i> Twitter</div>
                                                        <div class="col-sm-8">{{$provider->info->social_twitter}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold"><i class="fa fa-facebook"></i> Facebook</div>
                                                        <div class="col-sm-8">{{$provider->info->social_facebook}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold"><i class="fa fa-instagram"></i> Instagram</div>
                                                        <div class="col-sm-8">{{$provider->info->social_instagram}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold"><i class="fa fa-bbm"></i> BBM</div>
                                                        <div class="col-sm-8">{{$provider->info->social_bbm}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold"><i class="fa fa-google"></i> Google</div>
                                                        <div class="col-sm-8">{{$provider->info->social_google}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Description</div>
                                                        <div class="col-sm-8">{{$provider->info->description}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Event Services</div>
                                                        <div class="col-sm-8">
                                                            @foreach($provider->info->event_services as $service)
                                                                {{$service}}<?php if($provider->info->event_services[count($provider->info->event_services)-1] != $service){echo ", ";} ?>
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
                            <th>
                                Title
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
                        @if(!empty($providers))
                            @foreach($providers as $provider)
                                <tr class="odd gradeX">
                                    <td>
                                        {{ $provider['name'] }}
                                    </td>
                                    <td>
                                        {{ $provider['email'] }}
                                    </td>
                                    <td>
                                        {{ $provider['phone'] }}
                                    </td>
                                    <td class="col-sm-3">
                                        @foreach($provider->info->event_services as $service)
                                            {{$service}}<?php if($provider->info->event_services[count($provider->info->event_services)-1] != $service){echo ", ";} ?>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info"
                                        data-toggle="modal" data-target="#myModal{{$provider['id']}}">
                                        <i class="fa fa-pencil"></i> &nbsp; More Info
                                    </button>
                                    <a class="btn btn-sm btn-warning"
                                    onclick="return confirm('Are you sure you want to feature this provider - {{ $provider['name'] }}?')"
                                    href="{{ url('admin/feature/providers/add/'. $provider['id']) }}">
                                    <i class="fa fa-star"></i> &nbsp; Add to Featured
                                </a>
                            </td>

                            <div class="modal fade" id="myModal{{$provider['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{{$provider->name}} - Details</h4>
                                        </div>
                                        <div class="modal-body card-details">
                                            <div class="row">
                                                <div class="col-sm-4 bold">Full name</div>
                                                <div class="col-sm-8">{{$provider->name}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Email</div>
                                                <div class="col-sm-8">{{$provider->email}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Phone</div>
                                                <div class="col-sm-8">{{$provider->phone}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Gender</div>
                                                <div class="col-sm-8">{{$provider->info->gender}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Business Name</div>
                                                <div class="col-sm-8">{{$provider->info->business_name}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">{{$provider->info->id_type}}</div>
                                                <div class="col-sm-8">{{$provider->info->id_number}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Date of registration</div>
                                                <div class="col-sm-8">{{$provider->info->dor}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Address</div>
                                                <div class="col-sm-8">{{$provider->info->address}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Prefered currency</div>
                                                <div class="col-sm-8">{{$provider->info->currency}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold"><i class="fa fa-twitter"></i> Twitter</div>
                                                <div class="col-sm-8">{{$provider->info->social_twitter}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold"><i class="fa fa-facebook"></i> Facebook</div>
                                                <div class="col-sm-8">{{$provider->info->social_facebook}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold"><i class="fa fa-instagram"></i> Instagram</div>
                                                <div class="col-sm-8">{{$provider->info->social_instagram}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold"><i class="fa fa-bbm"></i> BBM</div>
                                                <div class="col-sm-8">{{$provider->info->social_bbm}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold"><i class="fa fa-google"></i> Google</div>
                                                <div class="col-sm-8">{{$provider->info->social_google}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Description</div>
                                                <div class="col-sm-8">{{$provider->info->description}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 bold">Event Services</div>
                                                <div class="col-sm-8">
                                                    @foreach($provider->info->event_services as $service)
                                                        {{$service}}<?php if($provider->info->event_services[count($provider->info->event_services)-1] != $service){echo ", ";} ?>
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
