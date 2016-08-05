@extends('admin.layout.default')
@section('title')
    Add Commission Setting
@stop
@section('main')
    <div class="wrapper">
        <div class="row">
          <div class="col-sm-7">
              <section class="panel">
                  <header class="panel-heading">
                      Add Commission Setting
                  </header>
                  <div class="panel-body">
                      <form method="POST"  autocomplete="off" class="add_userform" action="{{ url('admin/addcsetting') }}">
                          <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                          @include('partials.errors')
                          @include('partials.messages')
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Lower Price</label>
                                <input type="number" name="lower" class="form-control" placeholder="Lower Price" required>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="companyname">Vendor Profile Description<span class="required">*</span></label>
                                <textarea rows="5"  name="description" class="form-control summernote" id="" placeholder="Write your message" ></textarea>

                              </div>
                          </div>
                          <div class="col-sm-12">
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
                              <label class="control-label">Upload</label>
                              <input type="file"  name="slim[]" id="slim" />



                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label" for="phone">Images</label>
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="slim"
                                         data-label='Select your featured(main) profile image<span class="required">*</span>'
                                         data-max-file-size="1.5" data-max-file-size="1.5"
                                         data-size="1000,600"
                                         data-ratio="10:6" data-will-transform="addWatermark">
                                        <input type="file"  name="slim[]" id="slim" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="slim"
                                        data-label="Drop your Gallery Image"
                                        data-max-file-size="1.5" data-max-file-size="1.5"
                                        data-size="1000,600"
                                        data-ratio="10:6" data-will-transform="addWatermark">
                                       <input type="file"  name="slim[]" id="slim" />
                                   </div>
                               </div>
                            </div>
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
          <div class="col-sm-5">
              <section class="panel">
                  <header class="panel-heading">
                      Add Commission Setting
                  </header>
                  <div class="panel-body">
                      <form method="POST"  autocomplete="off" class="add_userform" action="{{ url('admin/addcsetting') }}">
                          <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                          @include('partials.errors')
                          @include('partials.messages')
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Lower Price</label>
                                <input type="text" name="lower" class="form-control" placeholder="Lower Price" required>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="companyname">Vendor Profile Description<span class="required">*</span></label>
                                <select class="form-control" name="parent_id">
                                  <option value="0" selected>- None -</option>
                                  <option value="0" selected>- None -</option>
                                  <option value="0" selected>- None -</option>
                                  <option value="0" selected>- None -</option>

                                  @if(!empty($rcategories))
                                    @foreach($rcategories as $category)
                                      <option value="{{ $category->category_id }}" class="subc">{{ $category->name }}</option>
                                    @endforeach
                                  @endif
                                </select>
                              </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Percentage(%)</label>
                                <textarea rows="5"  name="description" class="form-control" id="" placeholder="Write your message" ></textarea>
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
                              <label class="control-label">Upload</label>
                              <input type="file"  name="slim[]" id="slim" />



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
@section('scripts')
<link href="{{ url('') }}/assets/summernote/summernote.css" rel="stylesheet">
<script src="{{ url('') }}/assets/summernote/summernote.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css">
<script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>

@stop
