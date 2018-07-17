@extends('employer.layout.app')

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
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form role="form" method="POST" action="{{ url('/employer/password/email') }}">
                                {{ csrf_field() }}

                                <div class="cfield {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail address">
                                    <i class="la la-envelope"></i>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit">Send Password Reset Link</button>
                                
                            </form>
                        </div>
                    </div><!-- LOGIN POPUP -->
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
