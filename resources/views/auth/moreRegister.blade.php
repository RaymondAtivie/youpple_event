@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
    {{-- <div class="cp-inner-banner">
    <div class="container">
    <div class="cp-inner-banner-outer">
    <h2>Register for Your Account</h2>
    <!--Breadcrumb Start-->
    <ul class="breadcrumb">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('events') }}">Events</a></li>
    <li class="active">Register</li>
</ul><!--Breadcrumb End-->
</div>
</div>
</div> --}}
<!-- Inner Banner End -->

<style>
.has-error input{
    border-bottom-color: red;
}
</style>

<!-- Main Content Start -->
<div class="cp-main-content">
    <!--Signup Content Start-->
    <section class="cp-signup-section pd-tb60">
        <div class="container">
            <!--Signup Form Start-->
            <div class="cp-signup-form">

                @include('inc/flash')

                <form class="form-horizontal" role="form" method="POST" action="{{ url('events/auth/moreReg') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-field">
                                <input type="text" name="name" value="">
                                <label>Business Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <select class="form-control">
                                    <option>CAC Registraion Number</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <input type="text" name="name" value="">
                                <label>Identification Number</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <label>
                                    <input type="radio" name="gender" value="male"> Male
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <label>
                                    <input type="radio" name="gender" value="female"> Female
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-field">
                                <input type="text" name="name" value="">
                                <label>Contact Address</label>
                            </div>
                        </div>
                    </div>

                    <h3>Socail Media</h3>
                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-field">
                                <i class="fa fa-twitter prefix"></i>
                                <input type="text" name="name" value="">
                                <label>Twitter</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-field">
                                <i class="fa fa-facebook prefix"></i>
                                <input type="text" name="name" value="">
                                <label>Facebook</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-field">
                                <i class="fa fa-blackberry prefix"></i>
                                <input type="text" name="name" value="">
                                <label>BBM</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-field">
                                <i class="fa fa-instagram prefix"></i>
                                <input type="text" name="name" value="">
                                <label>Instagram</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-field">
                                <i class="fa fa-google prefix"></i>
                                <input type="text" name="name" value="">
                                <label>Google</label>
                            </div>
                        </div>
                    </div>

                    <h3>Self Description</h3>
                    <hr />

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-twitter prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Eye Color</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-facebook prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Hair Color</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-blackberry prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Height</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-instagram prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Weight</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-google prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Sleeve Length</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-google prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Waist Measurement</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-google prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Lap</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-google prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>DL</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-google prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Back Measurement</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-google prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Bust Measurement</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                {{-- <i class="fa fa-google prefix"></i> --}}
                                <input type="text" name="name" value="">
                                <label>Trouser Length</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="input-field">
                                <label>Short Description</label>
                                <textarea placeholder="About you/company"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field">
                            <div>Intrests</div>
                            {!! Form::select('intrests[]', $intrests, null, ['class'=>'form-control', 'id'=>'selectIntrest', 'multiple']) !!}
                        </div>
                    </div>

                    <h3>Event Service Options <small>Service providers only</small></h3>
                    <hr />

                    @foreach($services as $key => $list)
                        <br />
                        <h4>{{ucfirst($key)}}</h4>
                        <br />
                        <div class="row">
                            @foreach($list as $value)
                                <div class="col-md-6">
                                    <label>
                                        <input type="checkbox" name="" />
                                        {{$value}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach


                    <hr />
                    <div class="col-md-12 col-sm-12">
                        <div class="input-field btn-holder">
                            <button type="submit" class="btn-submit" value="Submit">Register</button>
                        </div>
                    </div>
                </form>
            </div><!--Signup Form End-->
        </div>
    </section><!--Signup Section Content End-->

</div>
<!-- Main Content End -->
@endsection

@section('footer_scripts')
    <script>
    $(document).ready(function(){
        $("#selectIntrest").select2({
            placeholder: "Select your intrests"
        });
    });
    </script>
@endsection
