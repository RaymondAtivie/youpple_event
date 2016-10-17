@extends('admin.layout.default')
@section('title')
    Change Logos
@stop
@section('main')
    <!-- Slider -->
    <div class="page-head">
        <h3>
            Logo Page
        </h3>
        <span class="sub-title">Change the Logos for Youpple</span>
    </div>

    <div class="wrapper">

        <div class="row">
            <div class="col-sm-12">
                @include('inc/flash')
            </div>

            @foreach($logos as $key => $logo)
                <div class="col-sm-4">
                    <section class="panel">
                        <header class="panel-heading">
                            {{$logo['name']}}
                        </header>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{ url('admin/home/changeLogo/'.$key) }}">
                                <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                                @include('partials.errors')
                                @include('partials.messages')
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="{{$logo['name']}}" >
                                        <input type="hidden" name="key" class="form-control" value="{{$key}}" >
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="orda" class="form-control" value="{{$logo['orda']}}" >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="slim"
                                    data-label="Drop your Logo here"
                                    data-max-file-size="1.5"
                                    data-size="600,600"
                                    data-ratio="6:6" data-will-transform="addWatermark">
                                    <img src="{{ url("images/".$logo['logo']) }}" alt=""/>
                                    <input type="file" name="logo[]" id="slim" /></div>
                                </div>
                                <div class="col-sm-12">
                                    <hr />
                                    <div class="form-group">
                                        <button type="submit" type="button" class="btn btn-primary">Change</button>
                                        <button type="button" type="button"
                                        data-toggle="modal" data-target="#{{$key}}Modal"
                                        class="btn btn-info pull-right">Inner Buttons</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="{{$key}}Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Inner Buttons for {{$logo['name']}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                @if(isset($logosLinks[$key]))
                                                    @foreach($logosLinks[$key] as $btn)
                                                        <tr>
                                                            <td>{{$btn->title}}</td>
                                                            <td>{{$btn->link}}</td>
                                                            <td>
                                                                <a onclick="return confirm('Are you sure you want to remove this button?')"
                                                                href="{{ url('admin/home/removeLogoButton/'.$btn->id) }}"
                                                                class="btn btn-danger btn-xs">Remove</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </table>
                                            <form method="post" action="{{ url('admin/home/addLogoButton/'.$key) }}">
                                                <input type="hidden" name="name" value="{{$key}}" />
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <input type="text" name="title" required class="form-control" placeholder="Title" />
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="link" required class="form-control" placeholder="http://example.com" />
                                                    </div>
                                                </div>
                                                <br />
                                                <input type="submit" value="Add New Button" class="btn btn-primary btn-sm" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            @endforeach

        </div>

    </div>
@stop
@section('styles')
    <link href="{{ url('') }}/assets/css/tabs_home.css" rel="stylesheet">
@stop
@section('scripts')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>

    <script src="{{ url('') }}/assets/js/tabs.js"></script>
    <script>
    new CBPFWTabs(document.getElementById('tabs'));
    </script>
@stop
