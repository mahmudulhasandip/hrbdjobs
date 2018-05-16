@extends('employer.layout.app')

@section('title', 'HRBD Jobs | Employer Login')

@section('content')
<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Login</h3>
                            <span>Keep up to date with the latest news</span>
                        </div>
                        <div class="page-breacrumbs">
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li><a href="#" title="">Pages</a></li>
                                <li><a href="#" title="">Login</a></li>
                            </ul>
                        </div>
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
                            <span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>
                            <form role="form" method="POST" action="{{ url('/employer/login') }}">
                                {{ csrf_field() }}
                                <div class="cfield {{ $errors->has('username') ? ' has-error' : '' }}" >
                                    <input id="username" type="text" class="form-control" placeholder="Email or Username" name="username" value="{{ old('username') }}" autofocus>
                                    <i class="la la-user"></i>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="cfield {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" placeholder="*******" name="password">
                                    <i class="la la-key"></i>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <p class="remember-label">
                                    <input type="checkbox" name="remember" id="cb1"><label for="cb1">Remember me</label>
                                </p>
                                <a class="btn btn-link" href="{{ url('/candidate/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                                <button type="submit">Login</button>
                            </form>
                            <div class="extra-login">
                                <span>Or</span>
                                <div class="login-social">
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
