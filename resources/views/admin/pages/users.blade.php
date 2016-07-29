@extends('admin.layout.default')
@section('title')
    Site Users
@stop
@section('main')
    <div class="page-head">
        <h3>
            {{ count($users) }} Customers
        </h3>
        <span class="sub-title">All Users of the website</span>

    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Customers
                    </header>
                    <div class="panel-body">
                         <table class="table convert-data-table data-table"  id="sample_1">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    </th> -->
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                       Joined
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($users))
                                    @foreach($users as $user)

                                            <tr class="odd gradeX">
                                                <!--<td>
                                                    <input type="checkbox" class="checkboxes" value="<?= md5($user->user_id); ?>" />
                                                </td>-->
                                                <td>
                                                  {{ $user->fullname }}
                                                </td>
                                                <td>
                                                  {{ $user->email }}
                                                </td>
                                                <td>
                                                   {{ $user->created_at }}
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

@stop
@include('admin.includes.datatable')
