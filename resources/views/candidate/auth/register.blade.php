@extends('candidate.layout.app')

@section('title', 'Candidate | Registration')

@section('content')
<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Candidate Signup</h3>
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
                        <div class="account-popup signup">
                            <form>
                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="First Name" name="fname"/>
                                    <i class="la la-user"></i>
                                </div>
                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="Last Name" name="lname"/>
                                    <i class="la la-user"></i>
                                </div>
                                <div class="cfield col-sm-6">
                                    <input type="text" placeholder="username" name="username"/>
                                    <i class="la la-user"></i>
                                </div>
                                <div class="dropdown-field col-sm-6">
                                    <select data-placeholder="Please Select Specialism" class="chosen" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="email" placeholder="Email" name="email" />
                                    <i class="la la-envelope"></i>
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="password" placeholder="Password" name="password" />
                                    <i class="la la-key"></i>
                                </div>

                                <div class="cfield col-sm-6">
                                    <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                                    <i class="la la-key"></i>
                                </div>
                                
                                <div class="cfield col-sm-6">
                                    <input type="number" placeholder="Phone" name="phone" />
                                    <i class="la la-phone"></i>
                                </div>
                               
                                <div class="clearfix "></div>
                                <h1>Skills & Experience</h1>
                                <div class="dropdown-field col-sm-6">
                                    <select data-placeholder="Please Select Specialism" class="chosen" name="exp">
                                        <option>Experience</option>
                                        <option value="">demo</option>
                                        <option value="">demo</option>
                                    </select>
                                </div>
                                <div class="dropdown-field col-sm-6">
                                    <select data-placeholder="Please Select Specialism" class="chosen" name="job_level">
                                        <option>Job Level</option>
                                        <option value="">demo</option>
                                        <option value="">demo</option>
                                    </select>
                                </div>
                                <div class="dropdown-field col-sm-6">
                                    <select data-placeholder="Please Select Specialism" class="chosen" name="designation">
                                        <option>Designation</option>
                                        <option value="">demo</option>
                                        <option value="">demo</option>
                                    </select>
                                </div>
                                <div class="dropdown-field col-sm-6">
                                    <select data-placeholder="Please Select Specialism" class="chosen" name="designation">
                                        <option>Designation</option>
                                        <option value="">demo</option>
                                        <option value="">demo</option>
                                    </select>
                                </div>

                                <div class="dropdown-field col-sm-6">
                                    <select data-placeholder="Please Select Specialism" class="chosen" name="job_category">
                                        <option>Job Category</option>
                                        <option value="">demo</option>
                                        <option value="">demo</option>
                                    </select>
                                </div>
                                <div class="pf-field no-margin">
                                    <ul class="tags">
                                        <li class="addedTag">Photoshop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Photoshop"></li>
                                        <li class="addedTag">Digital & Creative<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Digital"></li>
                                        <li class="addedTag">Agency<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Agency"></li>
                                        <li class="tagAdd taglist">  
                                            <input type="text" id="search-field">
                                        </li>
                                    </ul>
                                </div>

                                
                                <button type="submit">Signup</button>
                            </form>
                            <div class="extra-login">
                                <span>Or</span>
                                <div class="login-social mb-50">
                                    <a class="google-login" href="#" title=""><i class="fa fa-google"></i></a>
                                    <!-- <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a> -->
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- LOGIN POPUP -->
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/candidate/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection