@extends('employer.layout.app')

@section('title', 'HRBD Jobs | Employer Login')

@section('content')
<div id="nav_height"></div>



<section>
    <div class="block remove-bottom">
        <div class="container">
            <div class="tab-sec emp-signin">
                <div class="text-center">
                    <ul class="nav nav-tabs">
                        <li><a  data-tab="all_services">All Services</a></li>
                        <li><a class="current" data-tab="sign_in">Sign In</a></li>
                        <li><a data-tab="advertisement">Advertisement</a></li>
                    </ul>
                </div>

                {{-- All Services --}}
                <div id='all_services' class="filterbar mt-50 tab-content">
                    All Services
                </div>

                {{-- sign in --}}
                <div id='sign_in' class="filterbar mt-50 tab-content current">
                    <div class="row">
                        {{-- employee sign info --}}
                        <div class="col-lg-6">
                            <div class="info-container">
                                <div class="info-list">
                                    <i class="fa fa-arrow-up red"></i>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore corporis dicta debitis sit sequi quo.</p>
                                </div>

                                <div class="info-list">
                                    <i class="fa fa-arrow-left blue"></i>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore corporis dicta debitis sit sequi quo.</p>
                                </div>

                                <div class="info-list">
                                    <i class="fa fa-arrow-right orange"></i>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore corporis dicta debitis sit sequi quo.</p>
                                </div>

                                <div class="info-list">
                                    <i class="fa fa-arrow-down green"></i>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore corporis dicta debitis sit sequi quo.</p>
                                </div>
                            </div>
                        </div>

                        {{-- employee sign in form --}}
                        <div class="col-lg-6">
                            <div class="account-popup-area signin-popup-box static">
                                <div class="account-popup">
                                    @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @if (session('warning'))
                                        <div class="alert alert-warning alert-dismissible fade show">
                                            {{ session('warning') }}
                                        </div>
                                    @endif
                                    <h3 class="text-underline">EMPLOYEE SIGN IN</h3>
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
                                        <a class="btn btn-link" href="{{ url('/employer/password/reset') }}">
                                            Forgot Your Password?
                                        </a>
                                        <button type="submit">Login</button>
                                    </form>
                                </div>
                            </div><!-- LOGIN POPUP -->
                        </div>
                    </div>
                </div>

                {{-- advertisement --}}
                <div id='advertisement' class="filterbar mt-50 tab-content">
                    Advertisement
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="inner2">
                        <div class="inner-title2">
                            <div class="stat text-center">
                                <span class="counter">500</span>
                                <span>Jobs Posted</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="inner2">
                        <div class="inner-title2">
                            <div class="stat text-center">
                                <span class="counter">223</span>
                                <span>Jobs Filled</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="inner2">
                        <div class="inner-title2">
                            <div class="stat text-center">
                                <span class="counter">67</span>
                                <span>Companies</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="inner2">
                        <div class="inner-title2">
                            <div class="stat text-center">
                                <span class="counter">92</span>
                                <span>Members</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script src="{{ asset('/js/counter.js')}}"></script>
<script>
$('.counter').counterUp({
    delay: 05,
    time: 2500
});
</script>
@endpush