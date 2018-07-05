<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo"><a href="index.html" title=""><img src="http://placehold.it/178x40" alt="" /></a></div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img src="images/icon.png" alt="" /> Menu
            </div>
            <div class="res-closemenu">
                <img src="images/icon2.png" alt="" /> Close
            </div>
        </div>
    </div>
    <div class="responsive-opensec">
        <div class="btn-extars">
            <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
            <ul class="account-btns">
                <li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
                <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
            </ul>
        </div><!-- Btn Extras -->
        <form class="res-search">
            <input type="text" placeholder="Job title, keywords or company name" />
            <button type="submit"><i class="la la-search"></i></button>
        </form>
        <div class="responsivemenu">
                <ul>
                        <li class="">
                            <a href="index.html" title="">Home</a>
                        </li>
                        <li class="">
                            <a href="job_list_modern.html" title="">Browse Jobs</a>
                        </li>
                        <li class="">
                            <a href="about.html" title="">About</a>
                        </li>
                        <li class="">
                            <a href="contact.html" title="">Contact</a>
                        </li>
                    </ul>
        </div>
    </div>
</div>

@if (Auth::guest())
<header class="stick-top forsticky white">
@else
<header class="stick-top forsticky">
@endif
{{--  --}}
    <div class="menu-sec">
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}" title=""><img class="hidesticky" src="/images/logo.png" alt="" /><img class="showsticky" src="/images/logo-2.png" alt="" /></a>
            </div><!-- Logo -->
            @if (Auth::guest())
            <div class="btn-extars">
                <a href="{{ route('employer.new.job') }}" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
                
                <ul class="account-btns">
                    <li class="signup-popup"><a href="{{ route('employer.register') }}" title=""><i class="la la-key"></i> Sign Up</a></li>
                    <li class="signin-popup"><a href="{{ route('employer.login') }}" title=""><i class="la la-external-link-square"></i> Login</a></li>
                </ul>
            </div><!-- Btn Extras -->
            @else
                <div class="btns-profiles-sec">
                    <span>
                        <img src="{{ asset('storage/uploads/'.(($employer_info->logo) ? $employer_info->logo : 'default-user.png'))}}" alt="" /> {{ Auth::user()->fname}}
                        <i class="la la-angle-down"></i>
                    </span>
                    <ul>
                        <li>
                            <a href="#" title="">
                                <i class="la la-key"></i> Change Password</a>
                        </li>
                        <li>
                            <a href="{{ route('employer.logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="la la-history"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('employer.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
            <nav>
                <ul>
                    <li class="">
                        <a href="{{ url('/') }}" title="">Home</a>
                    </li>
                    <li class="">
                        <a href="job_list_modern.html" title="">Browse Jobs</a>
                    </li>
                    <li class="">
                        <a href="about.html" title="">About</a>
                    </li>
                    <li class="">
                        <a href="contact.html" title="">Contact</a>
                    </li>
                </ul>
            </nav><!-- Menus -->
        </div>
    </div>
</header>