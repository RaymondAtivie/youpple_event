@extends('layouts.app')

@section('content')
    <!-- Main Content Start -->
    <div class="cp-main-content">
        <!-- Page 404 Content Start-->
        <section class="cp-error-section pd-t60">
            <div class="container">
                <!--Error Inner Start-->
                <div class="cp-error-inner">
                    <strong class="cp-error-title">404</strong>
                    <h2>Page Not Found!</h2>
                    <p>The requested page cannot be found!</p>
                    <a class="btn btn-lg btn-submit" href="{{ URL::previous() }}">GO BACK</a>
                </div>
            </div>
        </section><!-- Page 404 Content End-->

    </div>
    <!-- Main Content End -->

@endsection
