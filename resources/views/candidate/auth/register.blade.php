
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
                        <div class="account-popup">
                            <form method="POST" action="{{ url('/candidate/register') }}" name="registration">
                                {{ csrf_field() }}
                                <div class="cfield {{ $errors->has('fname') ? ' has-error' : '' }}">
                                    <input type="text" placeholder="First Name" name="fname" value="{{ old('fname') }}" required />
                                    <i class="la la-user"></i>

                                    @if ($errors->has('fname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="cfield {{ $errors->has('lname') ? ' has-error' : '' }}">
                                    <input type="text" placeholder="Last Name" name="lname" value="{{ old('lname') }}" required />
                                    <i class="la la-user"></i>

                                    @if ($errors->has('lname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="cfield {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <input type="text" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required/>
                                    <i class="la la-user"></i>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="dropdown-field">
                                    <select data-placeholder="Please Select Specialism" class="chosen" name="gender">
                                        <option {{ old('gender') == 'Male' ? 'selected':'' }} value="Male">Male</option>
                                        <option {{ old('gender') == 'Female' ? 'selected':'' }} value="Female">Female</option>
                                        <option {{ old('gender') == 'Other' ? 'selected':'' }} value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="cfield {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required/>
                                    <i class="la la-envelope"></i>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="cfield {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" placeholder="Password" name="password" />
                                    <i class="la la-key"></i>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="cfield {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                                    <i class="la la-key"></i>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" id="check_url" value="{{ url('/candidate/check/username') }}">
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

@endsection

@push('js')
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/validation.js" type="text/javascript"></script>
@endpush