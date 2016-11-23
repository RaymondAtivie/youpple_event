@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ url('css/bootstrap-nav.css') }}" />
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
        <div class="container">
            <div class="cp-inner-banner-outer">
                <h2>Create an Event</h2>
                <!--Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('events') }}">Events</a></li>
                    <li class="active">Create</li>
                </ul><!--Breadcrumb End-->
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <style>
    .form-group{
        margin-bottom: 30px
    }
    .cOptions label{
        font-weight: normal;
    }
    .strike{
        background-color: #eaeaea;
    }
    </style>

    <!-- Main Content Start -->
    <div class="cp-main-content">

        <!--Signup Content Start-->
        <section ng-controller="formCtrl as FC" class="cp-signup-section pd-tb60">

            @include('inc/chips', ['page'=>'packages'])

            <div class="row pd-tb60">

                <div class="col-md-6 col-md-offset-3">
                    @include('inc/flash')

                    <p>Create package(s) for <b>{{ session('event')->title }}</b></p>
                    <hr />
                    <?php $i = 0;?>
                    @foreach($packs as $pack)
                        <h3 ng-init="pBox{{$pack->id}} = false">{{$pack->title}} - <button class="btn btn-link" ng-click="pBox{{$pack->id}} = !pBox{{$pack->id}}">edit</button></h3>
                        <div class="row" style="border: 2px solid #7c246d; padding: 35px 20px; margin-bottom: 40px; margin-top: 10px" ng-show="pBox{{$pack->id}}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-field">
                                        <input type="text" name="opack[{{$i}}][title]" value="{{$pack->title}}" required>
                                        <label>Package Title</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-field">
                                        <textarea required name="opack[{{$i}}][description]" requied row="2" style="height: 60px">{{$pack->description}}</textarea>
                                        <label>Package Description</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label style="font-weight: normal">Fee type</label>
                                    <div class="input-field" style="margin-bottom: 20px;">
                                        <select required name="opack[{{$i}}][fee_type]" class="form-control">
                                            <option>{{$pack->fee_type}}</option>
                                            <option value="">--SELECT--</option>
                                            <option>Booth Fee</option>
                                            <option>Exhibition Fee</option>
                                            <option>Runway Fee</option>
                                            <option>Entrance Fee</option>
                                            <option>Partnership/Sponsorship Fee</option>
                                            <option>Advert Fee</option>
                                            <option>Training Fee</option>
                                            <option>Participation Fee</option>
                                            <option>Seminar Fee</option>
                                            <option>Workshop Fee</option>
                                            <option>Conference Fee</option>
                                            <option>Modelling Fee</option>
                                            <option>Contest Fee</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <label style="cursor: pointer" @if($pack->free) ng-init="ofreeP{{$i}} = true" @endif>
                                            <input type="checkbox" name="opack[{{$i}}][free]" ng-model="ofreeP{{$i}}" />
                                            This package is free
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <br />
                            <div class="row" ng-if="!ofreeP{{$i}}">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed">
                                        <tbody>
                                            <tr ng-class="{strike: oearlyB{{$i}} }">
                                                <td>Early bird</td>
                                                <td>
                                                    <input required type="number" value="{{$pack->early_amount}}" ng-if="!oearlyB{{$i}}" placeholder="amount" pattern="\d*" name="opack[{{$i}}][early_amount]" />
                                                </td>
                                                <td>
                                                    <select ng-if="!oearlyB{{$i}}" name="opack[{{$i}}][early_currency]" class="form-control">
                                                        <option>Naira</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <label style="cursor: pointer; font-weight: normal" @if(!$pack->early_amount) ng-init="oearlyB{{$i}} = true" @endif>
                                                        <input type="checkbox" ng-model="oearlyB{{$i}}" />
                                                        does not apply
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr ng-class="{strike: olateB{{$i}} }">
                                                <td>Late bird</td>
                                                <td>
                                                    <input required type="number" ng-if="!olateB{{$i}}" placeholder="amount" value="{{$pack->late_amount}}" pattern="\d*" name="opack[{{$i}}][late_amount]" />
                                                </td>
                                                <td>
                                                    <select ng-if="!olateB{{$i}}" name="opack[{{$i}}][late_currency]" class="form-control">
                                                        <option>Naira</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <label style="cursor: pointer; font-weight: normal" @if(!$pack->late_amount) ng-init="olateB{{$i}} = true" @endif>
                                                        <input type="checkbox" ng-model="olateB{{$i}}" />
                                                        does not apply
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr ng-class="{strike: ostartD{{$i}} }">
                                                <td>On Start date</td>
                                                <td>
                                                    <input required type="number" ng-if="!ostartD{{$i}}" placeholder="amount" pattern="\d*" value="{{$pack->startdate_amount}}" name="opack[{{$i}}][startdate_amount]" />
                                                </td>
                                                <td>
                                                    <select ng-if="!ostartD{{$i}}" name="opack[{{$i}}][startdate_currency]" class="form-control">
                                                        <option>Naira</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <label style="cursor: pointer; font-weight: normal" @if(!$pack->startdate_amount) ng-init="ostartD{{$i}} = true" @endif>
                                                        <input type="checkbox" ng-model="ostartD{{$i}}" />
                                                        does not apply
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <?php $i++; ?>
                    @endforeach

                    <hr />

                    <div class="col-sm-12" style="border: 2px dotted #7c246d; padding: 20px; margin-bottom: 20px">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="font-size: larger">How many packages do you want to add?</p>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <form action="">
                                <div class="col-md-2">
                                    <select name="pnum" class="form-control">
                                        @for($j=1;$j<=10;$j++)
                                            <option>{{$j}}</option>
                                        @endfor
                                    </select>
                                    {{-- <input type="number" name="pnum" value="1" /> --}}
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" value="Add" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <hr style="background-color: blue; border: 1px solid black" />

                    <form action="{{ url('events/create/package') }}" method="POST">
                        @if($pnum >= 1)
                            @for($i=1;$i<=$pnum;$i++)
                                <h3>Package {{$i}}</h3>
                                <div class="row" style="border: 2px dotted #7c246d; padding: 35px 20px; margin-bottom: 40px; margin-top: 10px">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <input type="text" name="pack[{{$i}}][title]" value="" required>
                                                <label>Package Title</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <textarea required name="pack[{{$i}}][description]" requied row="2" style="height: 60px"></textarea>
                                                <label>Package Description</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label style="font-weight: normal">Fee type</label>
                                            <div class="input-field" style="margin-bottom: 20px;">
                                                <select required name="pack[{{$i}}][fee_type]" class="form-control">
                                                    <option value="">--SELECT--</option>
                                                    <option>Booth Fee</option>
                                                    <option>Exhibition Fee</option>
                                                    <option>Runway Fee</option>
                                                    <option>Entrance Fee</option>
                                                    <option>Partnership/Sponsorship Fee</option>
                                                    <option>Advert Fee</option>
                                                    <option>Training Fee</option>
                                                    <option>Participation Fee</option>
                                                    <option>Seminar Fee</option>
                                                    <option>Workshop Fee</option>
                                                    <option>Conference Fee</option>
                                                    <option>Modelling Fee</option>
                                                    <option>Contest Fee</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-field">
                                                <label style="cursor: pointer">
                                                    <input type="checkbox" name="pack[{{$i}}][free]" ng-model="freeP{{$i}}" />
                                                    This package is free
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="row" ng-if="!freeP{{$i}}">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-condensed">
                                                <tbody>
                                                    <tr ng-class="{strike: earlyB{{$i}} }">
                                                        <td>Early bird</td>
                                                        <td>
                                                            <input required type="number" ng-if="!earlyB{{$i}}" placeholder="amount" pattern="\d*" name="pack[{{$i}}][early_amount]" />
                                                        </td>
                                                        <td>
                                                            <select ng-if="!earlyB{{$i}}" name="pack[{{$i}}][early_currency]" class="form-control">
                                                                <option>Naira</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label style="cursor: pointer; font-weight: normal">
                                                                <input type="checkbox" ng-model="earlyB{{$i}}" />
                                                                does not apply
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr ng-class="{strike: lateB{{$i}} }">
                                                        <td>Late bird</td>
                                                        <td>
                                                            <input required type="number" ng-if="!lateB{{$i}}" placeholder="amount" pattern="\d*" name="pack[{{$i}}][late_amount]" />
                                                        </td>
                                                        <td>
                                                            <select ng-if="!lateB{{$i}}" name="pack[{{$i}}][late_currency]" class="form-control">
                                                                <option>Naira</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label style="cursor: pointer; font-weight: normal">
                                                                <input type="checkbox" ng-model="lateB{{$i}}" />
                                                                does not apply
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr ng-class="{strike: startD{{$i}} }">
                                                        <td>On Start date</td>
                                                        <td>
                                                            <input required type="number" ng-if="!startD{{$i}}" placeholder="amount" pattern="\d*" name="pack[{{$i}}][startdate_amount]" />
                                                        </td>
                                                        <td>
                                                            <select ng-if="!startD{{$i}}" name="pack[{{$i}}][startdate_currency]" class="form-control">
                                                                <option>Naira</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label style="cursor: pointer; font-weight: normal">
                                                                <input type="checkbox" ng-model="startD{{$i}}" />
                                                                does not apply
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            @endfor
                            {{-- <div style="padding-left: 30px" ng-repeat="i in FC.list">
                            <h3>Package <%i + 1%></h3>
                            <hr />
                            <div class="form-group">
                            <label for="exampleInputEmail1">Package Title</label>
                            <input type="text" class="form-control" name="title[]" placeholder="Title">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Package Description</label>
                        <textarea class="form-control" name="description[]" placeholder="Description" rows="3" style="resize: none; border: 0px; border-bottom: 2px solid silver; "></textarea>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Package Fee Type</label>
                    <select class="form-control" name="fee_type[]">
                    <option>Booth Fee</option>
                    <option>Exhibition Fee</option>
                    <option>Runway Fee</option>
                    <option>Entrance Fee</option>
                    <option>Partnership/Sponsorship Fee</option>
                    <option>Advert Fee</option>
                    <option>Training Fee</option>
                    <option>Participation Fee</option>
                    <option>Seminar Fee</option>
                    <option>Workshop Fee</option>
                    <option>Conference Fee</option>
                    <option>Modelling Fee</option>
                    <option>Contest Fee</option>
                    <option>Others</option>
                </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Package Fee</label>
            <div class="row">
            <div class="col-md-4">
            <select class="form-control" name="fee_currency[]">
            <option>Naira</option>
            <!--<option>CFA</option>
            <option>USD</option>
            <option>Cedi</option>
            <option>Euro</option>
            <option>GBP</option>
            <option>SAR</option>
            <option>Yuan</option>-->
        </select>
    </div>
    <div class="col-md-4">
    <input type="number" name="fee_amount[]" class="form-control" placeholder="amount">
</div>
<div class="col-md-4">
<select class="form-control" name="fee_style[]">
<option>Free</option>
<option>Early Bird</option>
<option>Late Bird</option>
<option>On Start Date</option>
</select>
</div>
</div>
<br />
<hr />
</div>
</div> --}}
@endif
</div>
</div>
<div class="row">
    {{-- <div class="col-md-2 col-md-offset-3">
    <button type="button" ng-click="FC.duplicate()" class="btn btn-block btn-lg btn-default">Add another package</button>
</div> --}}
<div class="col-md-4 col-md-offset-4">
    <button type="submit" class="btn btn-block btn-lg btn-submit">Next</button>
</div>
</form>
</div>
</section><!--Signup Section Content End-->

</div>
<!-- Main Content End -->

<script src="{{ url('js/angular.min.js') }}"></script>
@endsection

@section('footer_scripts')
    <script>
    angular.module('eventApp', [])
    .config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');

    })
    .controller('formCtrl', function() {

        this.list = [];
        this.num = 0;
        this.list.push(this.num);

        this.duplicate = function(){
            this.num++;
            this.list.push(this.num);
        }
    });
    </script>
@endsection
