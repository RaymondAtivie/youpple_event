@extends('admin.layout.default')
@section('title')
    Add Vendor Category
@stop
@section('main')
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Vendor Category
                    </header>
                    <div class="panel-body">
                        <form method="POST"  autocomplete="off" class="add_userform" action="{{ url('admin/addcategory') }}">
                            <input type="hidden" name="_token" value="{{ Session::getToken() }}"/>
                            @include('partials.errors')
                            @include('partials.messages')
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Category Name</label>
                                  <input type="text" name="name" class="form-control" placeholder="Category Name" required>
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Category Suffix ('Vendors etc.')</label>
                                  <input type="text" name="suffix" class="form-control" placeholder="Category Name">
                              </div>

                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label class="control-label">Description</label>
                                  <input type="text" name="description" class="form-control" placeholder="Category Name" >
                              </div>
                              <div class="form-group">
                                <label class="control-label" for="town">Parent Category</label>
                                <select class="form-control" name="parent_id">
                                  <option value="0" selected>- None -</option>

                                  @if(!empty($categories))
                                    @foreach($categories as $category)
                                      <option value="{{ $category->category_id }}" class="subc">{{ $category->name }}</option>
                                    @endforeach
                                  @endif
                                </select>

                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="form-group">
                                <label class="control-label" for="town">Select Image</label>
                                <select class="image-picker show-html" name="image" required>
                                  <option value="0" selected>- None -</option>

                                  @if(!empty($images))
                                    @foreach($images as $image)
                                      <option data-img-src="{{ url('') }}/{{ $image }}" value="{{ $image }}">  Image Name </option>

                                    @endforeach
                                  @endif
                                </select>


                              </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" type="button" class="btn btn-info">Add Vendor Category
                                </button>
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
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/image-picker/image-picker.css">
<script src="{{ url('') }}/assets/image-picker/image-picker.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(".show-html").imagepicker();
</script>
<style>
.carousel-inner > .item > a > img, .carousel-inner > .item > img, .img-responsive, .thumbnail a > img, .thumbnail > img {
  display: block;
  height: 50px;
  max-width: 100%;
}
</style>
@stop
