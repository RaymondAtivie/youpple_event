@extends('admin.layout.default')
@section('title')
    Add Commission Setting
@stop
@section('main')
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Commission Setting
                    </header>
                    <div class="panel-body">
                        <form method="POST"  autocomplete="off" class="add_userform" action="{{ url('admin/addcsetting') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Lower Price</label>
                                  <input type="number" name="lower" class="form-control" placeholder="Lower Price" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="control-label">Higher Price</label>
                                  <input type="number" name="higher" class="form-control" placeholder="Higher Price">
                              </div>

                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">Percentage(%)</label>
                                  <input type="text" name="percentage" class="form-control" placeholder="Percentage(%)" >
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">Extra Charge (₦)</label>
                                  <input type="text" name="extra" class="form-control" placeholder="Extra Charge (₦)" >
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label class="control-label">Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Code">


                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <button type="submit" type="button" class="btn btn-info">Add Commission Setting</button>

                              </div>
                            </div>

                        </form>

                    </div>
                </section>
            </div>
          </div>



    </div>

@stop
@section('styles')

@stop
@section('ascripts')


@stop
