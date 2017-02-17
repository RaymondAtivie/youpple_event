@extends('admin.layout.default')
@section('title')
    Currency Rates
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Currency Rates
        </h3>
        <span class="sub-title">Currency Rates for payments on Youpple</span>
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
                        Currency Rates
                    </header>
                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-md-2">Name</th>
                                    <th class="col-md-2">Short Name</th>
                                    <th class="col-md-1">Symbol</th>
                                    <th class="col-md-1">Rate</th>
                                    <th class="col-md-1"></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currencies as $c)
                                    <tr class="@if(!$c->visible) warning @endif">
                                        <form action="{{url('admin/payments/rates/'.$c->id.'/update')}}" method="POST">
                                            <td>
                                                {{$c->name}}
                                                <input type="text" id="inname{{$c->id}}" class="form-control hidden" name="name" value="{{$c->name}}" />
                                            </td>
                                            <td>
                                                {{$c->short_name}}
                                                <input type="text" id="insname{{$c->id}}" class="form-control hidden" name="short_name" value="{{$c->short_name}}" />
                                            </td>
                                            <td>
                                                {{$c->symbol}}
                                                <input type="text" id="insymbol{{$c->id}}" class="form-control hidden" name="symbol" value="{{htmlentities($c->symbol)}}" />
                                            </td>
                                            <td>
                                                {{$c->rate}}<br />
                                                <input type="number" id="inrate{{$c->id}}" class="form-control hidden" name="rate" value="{{$c->rate}}" />
                                            </td>
                                            <td>
                                                {{-- <input type="number" id="inrate{{$c->id}}" class="form-control hidden" name="rate" value="{{$c->rate}}" /> --}}
                                            </td>
                                            <td>
                                                <button type="submit" id="updatebtn{{$c->id}}" class="btn btn-success hidden">
                                                    Update
                                                </button>
                                                <button type="button" class="btn btn-info editRateBtn" rel="{{$c->id}}">
                                                    <i class="fa fa-pencil"></i> &nbsp; Edit
                                                </button>
                                                @if($c->visible)
                                                    <a id="disablebtn{{$c->id}}" class="btn btn-warning"
                                                        href="{{url('admin/payments/rates/'.$c->id.'/disable')}}">
                                                        Disable
                                                    </a>
                                                @else
                                                    <a id="enablebtn{{$c->id}}" class="btn btn-success"
                                                        href="{{url('admin/payments/rates/'.$c->id.'/enable')}}">
                                                        Enable
                                                    </a>
                                                @endif
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </section>
            </div>

            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add a new currency rate
                    </header>
                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Short Name</th>
                                    <th>Symbol</th>
                                    <th>Rate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="{{url('admin/payments/rates/add')}}" method="POST">
                                        <td>
                                            <input type="text" required class="form-control" name="name" />
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control" name="short_name" />
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control" name="symbol" />
                                        </td>
                                        <td>
                                            <input type="text" required class="form-control" name="rate" />
                                        </td>
                                        <td>
                                            <input type="submit" class="btn btn-primary form-control" value="Add" />
                                        </td>
                                    </form>
                                </tr>
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
    <script>
    $(document).ready(function(){
        $(".editRateBtn").click(function(){
            var cid = $(this).attr("rel");
            console.log(cid);
            $(this).addClass("hidden");
            $("#inrate"+cid).removeClass("hidden");
            $("#insymbol"+cid).removeClass("hidden");
            $("#inname"+cid).removeClass("hidden");
            $("#insname"+cid).removeClass("hidden");
            $("#disablebtn"+cid).addClass("hidden");
            $("#enablebtn"+cid).addClass("hidden");
            $("#updatebtn"+cid).removeClass("hidden");
        })
    });
    </script>
@stop
