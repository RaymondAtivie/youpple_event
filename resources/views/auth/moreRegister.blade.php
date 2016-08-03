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
.cp-signup-form{
    width: 700px
}
.servicesList label{
    font-weight: normal;
}
</style>

<!-- Main Content Start -->
<div class="cp-main-content" ng-controller="regmore as RM">
    <!--Signup Content Start-->
    <section class="cp-signup-section pd-tb60">
        <div class="container">
            <!--Signup Form Start-->
            <div class="cp-signup-form">

                @include('inc/flash')

                <div class="row" style="text-align: center">
                    <h1>Which one are you?</h1>
                    <br />
                    <div class="col-md-4 col-md-offset-2">
                        <button class="btn btn-block btn-default" ng-click="RM.toCustomer()">Customer</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-default" ng-click="RM.toProvider()">Service Provider</button>
                    </div>
                    <br />
                </div>
                <br style="clear: both" />
                <hr />

                <form ng-hide="RM.mode == false" class="form-horizontal" role="form"
                enctype="multipart/form-data" method="POST" action="{{ url('events/auth/moreReg') }}">
                {{ csrf_field() }}


                <div class="row">
                    <div class="col-md-3">
                        <label>Display Picture</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" name="name" value="">
                    </div>
                </div>
                <br />

                <div class="row"  ng-show="RM.mode == 'p'">
                    <div class="col-md-12">
                        <div class="input-field">
                            <input type="text" name="name" value="">
                            <label>Business Name</label>
                        </div>
                    </div>
                </div>
                <div class="row"  ng-show="RM.mode == 'p'">
                    <div class="col-md-6">
                        <div class="input-field">
                            <select class="form-control">
                                <option>CAC Registraion Number</option>
                                <option>TIN</option>
                                <option>Driver’s License</option>
                                <option>International Passport Number</option>
                                <option>National ID</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6"  ng-show="RM.mode == 'p'">
                        <div class="input-field">
                            <input type="text" name="name" value="">
                            <label>Identification Number</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label ng-show="RM.mode == 'c'">CV</label>
                        <label ng-show="RM.mode == 'p'">Company Profile</label>
                    </div>
                    <div class="col-md-7">
                        <input type="file" name="name" value="">
                    </div>
                </div>

                <br />
                <div class="row" ng-show="RM.mode == 'c'">
                    <div class="col-md-2"><label>Gender:</label></div>
                    <div class="col-md-3">
                        <div class="input-field">
                            <label>
                                <input type="radio" name="gender" value="male"> Male
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-field">
                            <label>
                                <input type="radio" name="gender" value="female"> Female
                            </label>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <div class="col-md-8">
                        <label ng-show="RM.mode == 'c'">Date of birth</label>
                        <label ng-show="RM.mode == 'p'">Date of Registration</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="datetime" value="{{ old('datetime') }}" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <br /><br /><br />
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-field">
                            <input type="text" name="name" value="">
                            <label>Contact Address</label>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <div class="col-md-5"><label>Currency Prefrence:</label></div>
                    <div class="col-md-5">
                        <select class="form-control">
                            <option>Naira</option>
                            <option>Dollar</option>
                        </select>
                    </div>
                </div>

                <h3>Socail Media</h3>
                <hr />

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-field">
                            <i class="fa fa-twitter prefix"></i>
                            <input type="text" name="name" value="">
                            <label>Twitter</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <i class="fa fa-facebook prefix"></i>
                            <input type="text" name="name" value="">
                            <label>Facebook</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <i class="fa fa-blackberry prefix"></i>
                            <input type="text" name="name" value="">
                            <label>BBM</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <i class="fa fa-instagram prefix"></i>
                            <input type="text" name="name" value="">
                            <label>Instagram</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <i class="fa fa-google prefix"></i>
                            <input type="text" name="name" value="">
                            <label>Google</label>
                        </div>
                    </div>
                </div>

                <div  ng-show="RM.mode == 'c'">
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

                </div>

                <div class="row" >
                    <div class="col-md-12">
                        <div class="input-field">
                            <label>Short description about
                                <span ng-show="RM.mode == 'c'">you</span>
                                <span ng-show="RM.mode == 'p'">your company</span>
                            </label>
                            <textarea></textarea>
                        </div>
                    </div>
                </div>

                <div class="row" ng-show="RM.mode == 'c'">
                    <div class="input-field">
                        <div>Intrests</div>
                        {!! Form::select('intrests[]', $intrests, null, ['class'=>'form-control', 'id'=>'selectIntrest', 'multiple']) !!}
                    </div>
                </div>

                <div  class="row" ng-show="RM.mode == 'p'">
                    <h3>Event Service Options</h3>
                    <hr />

                    @foreach($services as $key => $list)
                        <br />
                        <h4>{{ucfirst($key)}}</h4>
                        <hr />
                        <div class="row servicesList">
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
                </div>

                <br />

                <div  class="row" ng-show="RM.mode == 'p'">
                    <h3>More pictures</h3>
                    <hr />

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Upload Pictures</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0;$i<10;$i++)
                                <tr>
                                    <td>
                                        <input type="file" name="dPicture[]" />
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>


                <hr />
                <div class="col-md-12 col-sm-12">
                    <div class="input-field btn-holder">
                        <button type="submit" class="btn-submit" value="Submit">Submit</button>
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
    <script src="{{ url('js/angular.min.js') }}"></script>
    <script>
    angular.module('eventApp', [])
    .controller('regmore', function() {
        this.mode = false;

        this.toCustomer = function(){
            this.mode = "c";
        }
        this.toProvider = function(){
            this.mode = "p";
        }
    });
    </script>
@endsection
