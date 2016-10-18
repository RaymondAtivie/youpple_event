@extends('layouts.app')

@section('content')
    <!-- Inner Banner Start -->
    <div class="cp-inner-banner">
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
    </div>
    <!-- Inner Banner End -->

    <style>
    .has-error input{
        border-bottom-color: red;
    }
    .btn-default{
        background-color: #7c246d;
        border-color: #7c246d;
        color: white !important;
    }
    .btn-default:hover, .btn-default.active, .btn-default.active:hover{
        background-color: #681c5b;
        border-color: #681c5b;
    }
    .btn-default:active{
        background-color: #681c5b;
        border-color: #681c5b;
    }
    .btn-default:focus{
        background-color: #681c5b;
        border-color: #122b40;
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

                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('events/register') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="slim"
                                    data-label="Click to upload picture"
                                    data-size="360,400"
                                    data-ratio="1:1">
                                    <input type="file" name="picture" /></div>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />

                        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" name="name" value="{{ old('name') }}">
                                    <label>Full Name</label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="email" name="email" value="{{ old('email') }}">
                                    <label>Email</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-phone prefix"></i>
                                    <input type="text" name="phone" value="{{ old('phone') }}">
                                    <label>Phone</label>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label>
                                    <i class="fa fa-calendar"></i> Date of Birth
                                </label>
                                <div class="input-field">

                                    <input type="date" name="dob" value="{{ old('dob') }}">
                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label>Gender</label>

                                <div class="btn-group" data-toggle="buttons" style="margin-left: 20px;">
                                    <label class="btn btn-default
                                    @if(old('gender') == "male") active @endif
                                    ">
                                        <input type="radio" name="gender" value="male"
                                        @if(old('gender') == "male") checked @endif
                                         required> &nbsp; Male &nbsp;
                                    </label>
                                    <label class="btn btn-default
                                    @if(old('gender') == "female") active @endif
                                    " >
                                        <input type="radio" name="gender" value="female"
                                        @if(old('gender') == "female") checked @endif
                                         required> &nbsp; Female &nbsp;
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br /><br />

                        <div class="row form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-file-o prefix"></i>
                                    <input type="number" name="zipcode" value="{{ old('zipcode') }}">
                                    <label>Zip Code</label>
                                    @if ($errors->has('zipcode'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <textarea name="address" requied>{{ old('address') }}</textarea>
                                    <label>
                                        <i class="fa fa-compass"></i> Address
                                    </label>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('lga') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-map-marker prefix"></i>
                                    <input type="text" name="lga" requied value="{{ old('lga') }}">
                                    <label>LGA / County</label>
                                    @if ($errors->has('lga'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('lga') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-map-marker prefix"></i>
                                    <input type="text" name="state" requied value="{{ old('state') }}">
                                    <label>State / Province</label>
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label>
                                    <i class="fa fa-globe prefix"></i>
                                    Country
                                </label>
                                <div class="input-field">
                                    <select name="country" required class="form-control">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon" selected>Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Yugoslavia">Yugoslavia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" name="password" value="">
                                    <label>Password</label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" name="password_confirmation" value="">
                                    <label>Confirm password</label>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong class="danger">{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label>Register as?</label>

                                <div class="btn-group btn-group-justified" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="user_type" value="customer" checked required> Customer
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="user_type" value="provider" required> Service Provider
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br />

                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <label>
                                        <input type="checkbox" required name="terms" value="yes">
                                        I Accept Youpple <a target="_blank" href="{{url("terms-and-conditions")}}">Terms and Condition</a>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="input-field btn-holder">
                                <input type="submit" class="btn-submit" value="Register" />
                                {{-- <button type="submit" class="btn-submit" value="Submit">Register</button> --}}
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
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/slim/slim.min.css" />
    <script src="{{ url('') }}/assets/slim/slim.kickstart.min.js" type="text/javascript"></script>
@stop
