@extends('employer.layout.app') 
@section('title', 'HRBD Jobs | Employer Register') 
@section('content')
<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Employer Signup</h3>
                            <!-- <span>Keep up to date with the latest news</span> -->
                        </div>
                        <!-- <div class="page-breacrumbs">
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li><a href="#" title="">Pages</a></li>
                                <li><a href="#" title="">Login</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block remove-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-popup-area signin-popup-box static">
                        {{--
                        <div class="profile-title">
                            <div class="steps-sec">
                                <div class="step active">
                                    <p><i class="la la-info"></i></p>
                                    <span>Information</span>
                                </div>
                                <div class="step">
                                    <p><i class="la la-cc-mastercard"></i></p>
                                    <span>Package & Payments</span>
                                </div>
                                <div class="step">
                                    <p><i class="la  la-check-circle"></i></p>
                                    <span>Done</span>
                                </div>
                            </div>
                        </div> --}}
                        <div class="account-popup signup ">
                            <form class="mb-50" role="form" method="POST" action="{{ url('/employer/register') }}">
                                {{ csrf_field() }}

                                <!-- account info -->
                                <h1>Account Info</h1>
                                <div class="cfield col-sm-12 {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <input type="text" placeholder="Username" name="username" />
                                    <i class="la la-user"></i> @if ($errors->has('username'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span> @endif
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="password" placeholder="Password" name="password" />
                                    <i class="la la-key"></i> @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                                    <i class="la la-key"></i>
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="Your First Name" name="fname" />
                                    <i class="la la-user"></i> @if ($errors->has('fname'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('fname') }}</strong>
                                            </span> @endif
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="Your Last Name" name="lname" />
                                    <i class="la la-user"></i> @if ($errors->has('lname'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('lname') }}</strong>
                                            </span> @endif
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="Person Designation" name="person_designation" />
                                    <i class="la la-certificate"></i> @if ($errors->has('person_designation'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('person_designation') }}</strong>
                                            </span> @endif
                                </div>


                                <div class="cfield col-sm-6">
                                    <input type="email" placeholder="Person Email" name="person_email" />
                                    <i class="la la-envelope"></i> @if ($errors->has('person_email'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('person_email') }}</strong>
                                            </span> @endif
                                </div>


                                <!-- company details -->
                                <h1>Company Details</h1>
                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="Company Name" name="name" />
                                    <i class="la la-building"></i> @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> @endif
                                </div>

                                <div class="col-sm-6 dropdown-field">

                                    <select name="industry_type[]" id="industry_type" autocomplete="off" data-placeholder="Choose Industry ..." multiple class="chosen form-control">
                                        @foreach($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                        @endforeach
                                    </select> @if ($errors->has('industry_type'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('industry_type') }}</strong>
                                        </span> @endif
                                </div>




                                <div class="pf-field col-sm-12">
                                    <textarea name="description" placeholder="Brief About Company"></textarea> @if ($errors->has('description'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span> @endif
                                </div>


                                <!-- primary Contact Details -->
                                
                                <div class="pf-field col-sm-6">
                                    <textarea name="address" placeholder="Company Address"></textarea> @if ($errors->has('address'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span> @endif
                                </div>

                                <div class="pf-field col-sm-6">
                                    <textarea name="billing_address" placeholder="Billing Address"></textarea> @if ($errors->has('billing_address'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('billing_address') }}</strong>
                                        </span> @endif
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="City" name="city" />
                                    <i class="la la-map"></i> @if ($errors->has('city'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span> @endif
                                </div>
                                <div class="col-sm-6 dropdown-field">

                                    <select name="country" id="country" autocomplete="off" data-placeholder="Choose Company Category" class="chosen form-control">
                                            @foreach($countries as $country)
                                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select> 
                                        @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span> 
                                        @endif
                                </div>

                                <div class="cfield col-sm-6">
                                    <div class="cfield col-sm-6" style="padding-left: 0;">
                                        <input type="number" placeholder="Contact Phone" name="contact_phone" />
                                        <i class="la la-phone"></i> @if ($errors->has('contact_phone'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('contact_phone') }}</strong>
                                            </span> @endif
                                    </div>
                                    <div class="cfield col-sm-6" style="padding-right: 0;">
                                        <input type="email" placeholder="Contact Email" name="contact_email" />
                                        <i class="la la-user"></i> @if ($errors->has('contact_email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('contact_email') }}</strong>
                                            </span> @endif
                                    </div>
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="Website" name="website" />
                                    <i class="la la-globe"></i> @if ($errors->has('website'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span> @endif
                                </div>

                                <button type="submit">Sign Up</button>
                            </form>
                            
                        </div>
                    </div>
                    <!-- LOGIN POPUP -->
                </div>
            </div>
        </div>
    </div>
</section>{{-- --}}
@endsection