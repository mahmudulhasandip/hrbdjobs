@extends('candidate.layout.app')

@section('title', 'HRBD Jobs | Reset Password')

@section('content')

<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Reset Password</h3>
                            <span></span>
                        </div>
                        <div class="page-breacrumbs">
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li><a href="#" title="">Pages</a></li>
                                <li><a href="#" title="">Reset Password</a></li>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/candidate/password/reset') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="cfield {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ $email or old('email') }}" autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="cfield {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="cfield {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <button type="submit">Reset Password</button>
                            </form>
                        </div>
                    </div><!-- LOGIN POPUP -->
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
