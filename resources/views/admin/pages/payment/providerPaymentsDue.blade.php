@extends('admin.layout.default')
@section('title')
    Featured Events
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            <button class="btn btn-info" data-toggle="modal" data-target="#providerModal">
                <i class="fa fa-user"></i>
            </button>
            @if($provider->info->business_name)
                {{$provider->info->business_name}}
            @else
                {{$provider->name}}
            @endif
            - Payments
        </h3>
        <span class="sub-title">
            Payments made to
            @if($provider->info->business_name)
                {{$provider->info->business_name}}
            @else
                {{$provider->name}}
            @endif
        </span>
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
                        Service Providers Payments
                    </header>
                    <div class="panel-body">
                        <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Complain Message
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Money Transfered
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($lists))
                                    @foreach($lists as $list)
                                        <tr class="odd gradeX">
                                            <td>
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#ownerModal{{$list->owner->id}}">
                                                    <i class="fa fa-user"></i>
                                                </button>
                                                {{ $list->owner->name }}
                                            </td>
                                            <td class="col-sm-1" title="N{{$currObj::find($list->currency)->calcNaira($list->amount)}}">
                                                {{$currObj::find($list->currency)->symbol}}{{number_format($list->amount)}}
                                                <br />&#8358;<b>{{$currObj::find($list->currency)->calcNaira($list->amount)}}</b>
                                            </td>
                                            <td class="<?php
                                            switch ($list->status) {
                                                case 'pending':
                                                echo "warning";
                                                break;

                                                case 'complain':
                                                echo "danger";
                                                break;

                                                case 'confirmed':
                                                echo "success";
                                                break;

                                                default:
                                                echo "warning";
                                                break;
                                            }
                                            ?>">
                                            {{ $list->status }}
                                        </td>
                                        <td>
                                            {{ $list->message }}
                                        </td>
                                        <td class="col-sm-3">
                                            {{ $list->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $list->youpple_pay }}
                                        </td>
                                        <td>
                                            @if($list->youpple_pay == 'no')
                                                <a class="btn btn-sm btn-success"
                                                href="{{ url("admin/payments/due/".$list->id)."/transfer" }}"
                                                onclick="return confirm('Have you indeed transfered the money?')">
                                                <i class="fa fa-money"></i> &nbsp; Confirm Money Transfer
                                            @endif
                                        </a>
                                    </td>

                                    <div class="modal fade" id="ownerModal{{$list->owner->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">
                                                        @if($list->owner->info->business_name)
                                                            {{$list->owner->info->business_name}}
                                                        @else
                                                            {{$list->owner->name}}
                                                        @endif
                                                         - Details
                                                     </h4>
                                                </div>
                                                <div class="modal-body card-details">
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Full name</div>
                                                        <div class="col-sm-8">{{$list->owner->name}}</div>
                                                    </div>
                                                    @if($list->owner->info->business_name)
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Business name</div>
                                                            <div class="col-sm-8">{{$list->owner->info->business_name}}</div>
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Email</div>
                                                        <div class="col-sm-8">{{$list->owner->email}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 bold">Phone</div>
                                                        <div class="col-sm-8">{{$list->owner->phone}}</div>
                                                    </div>
                                                    @if(!$list->owner->info)
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
                                                            <div class="col-sm-8">{{$list->owner->info->gender}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Date of birth</div>
                                                            <div class="col-sm-8">{{$list->owner->info->dob}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Address</div>
                                                            <div class="col-sm-8">{{$list->owner->info->address}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Prefered currency</div>
                                                            @if($list->owner->info->currency)
                                                                <div class="col-sm-8">{{$currObj::find($list->owner->info->currency)->name}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-twitter"></i> Twitter</div>
                                                            <div class="col-sm-8">{{$list->owner->info->social_twitter}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-facebook"></i> Facebook</div>
                                                            <div class="col-sm-8">{{$list->owner->info->social_facebook}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-instagram"></i> Instagram</div>
                                                            <div class="col-sm-8">{{$list->owner->info->social_instagram}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-bbm"></i> BBM</div>
                                                            <div class="col-sm-8">{{$list->owner->info->social_bbm}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold"><i class="fa fa-google"></i> Google</div>
                                                            <div class="col-sm-8">{{$list->owner->info->social_google}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Description</div>
                                                            <div class="col-sm-8">{{$list->owner->info->description}}</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Eye color</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_eye_color}}</div>
                                                            <div class="col-sm-4 bold">Hair color</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_hair_color}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Height</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_height}}</div>
                                                            <div class="col-sm-4 bold">Weight</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_weight}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Sleeve Length</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_sleeve}}</div>
                                                            <div class="col-sm-4 bold">Waist Measurement</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_waist}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Lap</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_lap}}</div>
                                                            <div class="col-sm-4 bold">DL</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_dl}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Back Measurement</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_back}}</div>
                                                            <div class="col-sm-4 bold">Bust Measurement</div>
                                                            <div class="col-sm-2">{{$list->owner->info->desc_bust}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Trouser Length</div>
                                                            <div class="col-sm-8">{{$list->owner->info->desc_trouser}}</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4 bold">Interests</div>
                                                            <div class="col-sm-8">
                                                                @foreach($list->owner->info->intrests as $intrests)
                                                                    {{$intrests}}<?php if($list->owner->info->intrests[count($list->owner->info->intrests)-1] != $intrests){echo ", ";} ?>
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

<div class="modal fade" id="providerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    @if($provider->info->business_name)
                        {{$provider->info->business_name}}
                    @else
                        {{$provider->name}}
                    @endif
                     - Details
                 </h4>
            </div>
            <div class="modal-body card-details">
                <div class="row">
                    <div class="col-sm-4 bold">Full name</div>
                    <div class="col-sm-8">{{$provider->name}}</div>
                </div>
                @if($provider->info->business_name)
                    <div class="row">
                        <div class="col-sm-4 bold">Business name</div>
                        <div class="col-sm-8">{{$provider->info->business_name}}</div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-4 bold">Email</div>
                    <div class="col-sm-8">{{$provider->email}}</div>
                </div>
                <div class="row">
                    <div class="col-sm-4 bold">Phone</div>
                    <div class="col-sm-8">{{$provider->phone}}</div>
                </div>
                @if(!$provider->info)
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
                        <div class="col-sm-8">{{$provider->info->gender}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 bold">Date of birth</div>
                        <div class="col-sm-8">{{$provider->info->dob}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 bold">Address</div>
                        <div class="col-sm-8">{{$provider->info->address}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 bold">Prefered currency</div>
                        @if($provider->info->currency)
                            <div class="col-sm-8">{{$currObj::find($provider->info->currency)->name}}</div>
                        @endif
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
                        <div class="col-sm-4 bold">Eye color</div>
                        <div class="col-sm-2">{{$provider->info->desc_eye_color}}</div>
                        <div class="col-sm-4 bold">Hair color</div>
                        <div class="col-sm-2">{{$provider->info->desc_hair_color}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 bold">Height</div>
                        <div class="col-sm-2">{{$provider->info->desc_height}}</div>
                        <div class="col-sm-4 bold">Weight</div>
                        <div class="col-sm-2">{{$provider->info->desc_weight}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 bold">Sleeve Length</div>
                        <div class="col-sm-2">{{$provider->info->desc_sleeve}}</div>
                        <div class="col-sm-4 bold">Waist Measurement</div>
                        <div class="col-sm-2">{{$provider->info->desc_waist}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 bold">Lap</div>
                        <div class="col-sm-2">{{$provider->info->desc_lap}}</div>
                        <div class="col-sm-4 bold">DL</div>
                        <div class="col-sm-2">{{$provider->info->desc_dl}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 bold">Back Measurement</div>
                        <div class="col-sm-2">{{$provider->info->desc_back}}</div>
                        <div class="col-sm-4 bold">Bust Measurement</div>
                        <div class="col-sm-2">{{$provider->info->desc_bust}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 bold">Trouser Length</div>
                        <div class="col-sm-8">{{$provider->info->desc_trouser}}</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 bold">Interests</div>
                        <div class="col-sm-8">
                            @foreach($provider->info->intrests as $intrests)
                                {{$intrests}}<?php if($provider->info->intrests[count($provider->info->intrests)-1] != $intrests){echo ", ";} ?>
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
@stop

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
@stop
@section('scripts')
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>
    @include('admin.includes.datatable')
@stop
