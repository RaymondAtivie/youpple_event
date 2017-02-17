@extends('admin.layout.default')
@section('title')
    Manage Event Types
@stop
@section('main')

    <!-- Slider -->
    <div class="page-head">
        <h3>
            Event Types
        </h3>
        <span class="sub-title">Manage Event types for Youpple</span>
    </div>

    <div class="wrapper">

        <div class="row">
            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
                        Event Types
                    </header>
                    <div class="panel-body">
                        <form action="{{ url("admin/eventtypes/add") }}" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Add a new event type</h4>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="submit" value="Add" class="btn btn-block btn-primary" />
                                </div>
                            </div>
                        </form>

                        <hr />
                        <div class="col-sm-12">
                            <h4>Event Types</h4>
                        </div>

                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Hide</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event_types as $evt)
                                    <tr class="
                                    @if(!$evt->visible)
                                        info
                                    @endif
                                    ">
                                    <td>{{$evt->name}}</td>
                                    <td>
                                        @if($evt->visible)
                                            <a class="btn btn-sm btn-warning"
                                            title="Make it invisible to users"
                                            onclick="return confirm('Are you sure you want to make {{$evt->name}} invisible?')"
                                            href="{{ url('admin/eventtypes/'. $evt->id.'/hide') }}">
                                            <i class="fa fa-eye-slash"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-sm btn-info"
                                        title="Make it Visible to users"
                                        onclick="return confirm('Are you sure you want to make {{$evt->name}} Visible?')"
                                        href="{{ url('admin/eventtypes/'. $evt->id.'/show') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

<div class="col-sm-6">
    <section class="panel">
        <header class="panel-heading">
            Event Services
        </header>
        <div class="panel-body">
            <form action="{{ url("admin/eventtypes/serviceadd") }}" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Add a Major Service</h4>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="name" required class="form-control" />
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" value="Add" class="btn btn-block btn-primary" />
                    </div>
                </div>
            </form>
            <hr />
            <form action="{{ url("admin/eventtypes/servicelistadd") }}" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Add a new Service</h4>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="name" required class="form-control" />
                    </div>
                    <div class="col-sm-6">
                        {{-- {{dd($myservices)}} --}}
                        <select class="form-control" required name="service_id">
                            <option value="">--SELECT A MAJOR--</option>
                            @foreach($myservices as $es)
                                @if(is_object($es))
                                    <option value="{{$es->id}}">{{$es->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-10">
                        <input type="submit" value="Add" class="btn btn-block btn-primary" />
                    </div>
                </div>
            </form>

            <hr />
            @foreach($myservices as $service)
                @if($service)
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>

                                <button data-toggle="collapse" data-target="#box{{$service->id}}" class="btn btn-sm btn-default">
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <b>{{$service->name}}</b>

                                {{-- <a href="#"
                                style="margin-left: 30px;"
                                onclick="return confirm('Are you sure you want to delete this?')"
                                class="btn btn-sm btn-danger"
                                disabled
                                ><i class="fa fa-trash-o"></i></a> --}}
                            </h4>
                        </div>
                    </div>

                    <div class="row collapse"  id="box{{$service->id}}">
                        <div class="col-sm-12">
                            <table class="table table-hover table-condensed table-bordered">
                                <tbody>
                                    @if(count($service->children) < 1)
                                        <tr class="warning">
                                            <td>No services under this major service</td>
                                        </tr>
                                    @endif
                                    @foreach($service->children()->orderBy('name', 'asc')->get() as $evt)
                                        <tr class="
                                        @if(!$evt->visible)
                                            info
                                        @endif
                                        ">
                                        <td>{{$evt->name}}</td>
                                        <td class="col-sm-1">
                                            @if($evt->visible)
                                                <a class="btn btn-sm btn-warning"
                                                title="Make it invisible to users"
                                                onclick="return confirm('Are you sure you want to make {{$evt->name}} invisible?')"
                                                href="{{ url('admin/servicelist/'. $evt->id.'/hide') }}">
                                                <i class="fa fa-eye-slash"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-sm btn-info"
                                            title="Make it Visible to users"
                                            onclick="return confirm('Are you sure you want to make {{$evt->name}} Visible?')"
                                            href="{{ url('admin/servicelist/'. $evt->id.'/show') }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endforeach

</div>
</section>
</div>

</div>

</div>
@stop
@section('styles')
@stop
@section('scripts')
@stop
