<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo"><a href="{{ url('/') }}" title=""><img src="/images/logo.png" alt="" /></a></div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img src="/images/icon.png" alt="" /> Menu
            </div>
            <div class="res-closemenu">
                <img src="/images/icon2.png" alt="" /> Close
            </div>
        </div>
    </div>
    <div class="responsive-opensec">
        <div class="btn-extars">
            @if(Auth::guard('candidate')->user())
               <a href="{{ route('candidate.home') }}" title="">
                    <div class="btns-profiles-sec">
                        <span><img src="{{ asset('storage/uploads/'.((Auth::guard('candidate')->user()->dp) ? Auth::guard('candidate')->user()->dp : 'default_user.png'))}}">{{ Auth::guard('candidate')->user()->fname }}</span>
                    </div>
                </a>
            @endif
            @if(Auth::guard('employer')->user())
                <a href="{{ route('employer.new.job') }}" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
                <a href="{{ route('employer.home') }}" title="" >
                    <div class="btns-profiles-sec">
                        <span><img src="{{ asset('storage/uploads/'.((Auth::guard('employer')->user()->employerCompanyInfo->logo) ? Auth::guard('employer')->user()->employerCompanyInfo->logo : 'default_user.png'))}}">{{ Auth::guard('employer')->user()->fname }}</span>
                    </div>
                </a>
            @endif
            @if(!Auth::guard('employer')->user() && !Auth::guard('candidate')->user())
                <a href="{{ route('employer.new.job') }}" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
                <ul class="account-btns">
                    <li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
                    <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
                </ul>
            @endif
        </div><!-- Btn Extras -->
        <form action="{{ url('/browse/jobs') }}" method="get" class="res-search">
            <input type="text" name="keyword" placeholder="Job title, keywords or company name" />
            <button type="submit"><i class="la la-search"></i></button>
        </form>
        <div class="responsivemenu">
                <ul>
                    <li class="">
                        <a href="{{ url('/') }}" title="">Home</a>
                    </li>
                    <li class="">
                        <a href="{{ url('/browse/jobs') }}" title="">Browse Jobs</a>
                    </li>
                    <li class="">
                        <a href="{{ route('about.us') }}" title="">About</a>
                    </li>
                    <li class="">
                        <a href="{{ route('contact.us') }}" title="">Contact</a>
                    </li>
                </ul>
        </div>
    </div>
</div>

@if ($page == 'home')
<header class="stick-top forsticky">
@else
<header class="stick-top forsticky fixed">
@endif
    <div class="menu-sec">
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}" title=""><img class="hidesticky" src="/images/logo.png" alt="" /><img class="showsticky" src="/images/logo-2.png" alt="" /></a>
            </div><!-- Logo -->
            @if(Auth::guard()->user())
            <style>
                .btns-profiles-sec{padding: 3px 15px;}
                @media (max-width: 520px){
                    .responsive-opensec .post-job-btn {
                        padding: 8px 5px;
                        margin-top: 10px;
                    }
                    .btns-profiles-sec {
                        padding: 3px 10px;
                    }
                }

            </style>
            @endif
            <div class="btn-extars">
                @if(Auth::guard('candidate')->user())
                    <a href="{{ route('candidate.home') }}" title="">
                        <div class="btns-profiles-sec">
                            <span><img src="{{ asset('storage/uploads/'.((Auth::guard('candidate')->user()->dp) ? Auth::guard('candidate')->user()->dp : 'default_user.png'))}}">{{ Auth::guard('candidate')->user()->fname }}</span>
                        </div>
                    </a>
                @endif
                @if(Auth::guard('employer')->user())
                    <a href="{{ route('employer.new.job') }}" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
                    <a href="{{ route('employer.home') }}" title="" >
                        <div class="btns-profiles-sec">
                            <span><img src="{{ asset('storage/uploads/'.((Auth::guard('employer')->user()->employerCompanyInfo->logo) ? Auth::guard('employer')->user()->employerCompanyInfo->logo : 'default_user.png'))}}">{{ Auth::guard('employer')->user()->fname }}</span>
                        </div>
                    </a>
                @endif
                @if(!Auth::guard('employer')->user() && !Auth::guard('candidate')->user())
                    <a href="{{ route('employer.new.job') }}" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
                    <ul class="account-btns">
                        <li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
                        <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
                    </ul>
                @endif
            </div><!-- Btn Extras -->
            <nav>
                <ul>
                    <li class="">
                        <a href="{{ url('/') }}" title="">Home</a>
                    </li>
                    <li class="">
                        <a href="{{ url('/browse/jobs') }}" title="">Browse Jobs</a>
                    </li>
                    <li class="">
                        <a href="{{ route('about.us') }}" title="">About</a>
                    </li>
                    <li class="">
                        <a href="{{ route('contact.us') }}" title="">Contact</a>
                    </li>
                </ul>
            </nav><!-- Menus -->
        </div>
    </div>
</header>