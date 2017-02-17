@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
<div class="cp-inner-banner">
<div class="container">
    <div class="cp-inner-banner-outer">
    <h2>{{$title}}</h2>
        <!--Breadcrumb Start-->
        <ul class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">{{$title}}</li>
        </ul><!--Breadcrumb End-->
    </div>
    </div>
</div>
<!-- Inner Banner End -->


  <!-- Main Content Start -->
  <div class="cp-main-content">

    <!-- About Content Start-->
    <section class="cp-about-section pd-tb60">
      <div class="container">
          {!!$body!!}
      </div>
    </section><!-- About Content End-->



  </div>
  <!-- Main Content End -->
@endsection
