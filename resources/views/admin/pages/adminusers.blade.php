@extends('admin.layout.default')
@section('title')
    Admin Users
@stop
@section('main')
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
                        Add Admin User
                    </header>
                    <div class="panel-body">
                        <form method="POST"  autocomplete="off" class="add_userform" action="{{ url('admin/addadmin') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')

                            <div class="form-group">
                                <label class="control-label">Fullname</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Fullname" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" type="button" class="btn btn-info">Add
                                </button>
                            </div>

                        </form>

                    </div>
                </section>
            </div>
            <div class="col-sm-6">
                <div class="dashboard-stat2" id="FORMUI2">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-yellow-casablanca"> <i class="icon-user"></i>{{ count($adminusers) }}</h3>
                            <small>Registered users</small>
                        </div>
                        <div class="icon">

                        </div>
                    </div>
                    <ul class="list-group">
                        @if(!empty($adminusers))
                            @foreach($adminusers as $user)
                                @if($user->username != \Auth::guard('admin')->user()->username)
                                    <li class="list-group-item">
                                         {{ $user->username }}
                                        <a class="btn default btn-xs red confirm_booking"  code="{{ $user->username }} ">
                                            <i class="fa  fa-trash-o"></i> Delete </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                </div>
            </div>
        </div>



    </div>

@stop
@section('styles')

@stop
@section('ascripts')
    <script type="text/javascript">
    $('.confirm_booking').click(function (){
        code = $(this).attr('code');
        confirm_statement = "Are you sure you want to delete "+code +" ?";
        if (confirm(confirm_statement)){
            $.ajax({
                url: '{{ url("admin/deleteadmin/") }}/'+code,
                type:'post',
                data: {
                    '_token':$('meta[name="csrf_token"]').attr('content'),
                },
                success: function(data){
                    if (data.result == 'success') {
                        location.reload();
                    }

                }
            });

        };

    });
</script>

@stop
