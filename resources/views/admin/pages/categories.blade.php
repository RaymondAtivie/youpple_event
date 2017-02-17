@extends('admin.layout.default')
@section('title')
     Vendor Categories
@stop
@section('main')
    <div class="page-head">
        <h3>
            {{ count($categories) }} Vendor Categories
        </h3>
        <span class="sub-title">All Vendor Categories</span>

    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All  Vendor Categories
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
                                        Parent
                                    </th>

                                    <th>
                                       Image
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($categories))
                                    @foreach($categories as $category)

                                            <tr class="odd gradeX">

                                                <td>
                                                  {{ $category->name }}
                                                </td>
                                                <td>
                                                  {{ $category->parent() }}
                                                </td>
                                                <td>
                                                  <img src="{{ url('') }}/{{ $category->image }}" alt="" width="40px">
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
