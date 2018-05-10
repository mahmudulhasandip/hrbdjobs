@extends('users.layout.app')

@section('title', "HRBD Jobs")

@section('content')
    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-featured-sec">
                            <ul class="main-slider-sec style2 text-arrows">
                                <li class="slideHome"><img src="images/slider-1.jpg" alt="" /></li>
                                <li class="slideHome"><img src="images/slider-2.jpg" alt="" /></li>
                                <li class="slideHome"><img src="images/slider-3.jpg" alt="" /></li>
                            </ul>
                            <div class="job-search-sec">
                                <div class="job-search">
                                    <h3>The Easiest Way to Get Your New Job</h3>
                                    <span>Find Jobs, Employment & Career Opportunities</span>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-7 col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-field">
                                                    <input type="text" placeholder="Job title, keywords or company name" />
                                                    <i class="la la-keyboard-o"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-field">
                                                    <select data-placeholder="City, province or region" class="chosen-city">
                                                    <option>Istanbul</option>
                                                    <option>New York</option>
                                                    <option>London</option>
                                                    <option>Russia</option>
                                                </select>
                                                    <i class="la la-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12">
                                                <button type="submit"><i class="la la-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="or-browser">
                                        <span>Or browse job offers by </span>
                                        <a href="#" title="">category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="scroll-to">
                                <a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="scroll-here">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Popular Categories</h2>
                            <span>37 jobs live - 0 added today.</span>
                        </div>
                        <!-- Heading -->
                        <div class="cat-sec">
                            <div class="row no-gape">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="#" title="">
                                            <i class="la la-bullhorn"></i>
                                            <span>Design, Art & Multimedia</span>
                                            <p>(22 open positions)</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="#" title="">
                                            <i class="la la-graduation-cap"></i>
                                            <span>Education Training</span>
                                            <p>(6 open positions)</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="#" title="">
                                            <i class="la la-line-chart "></i>
                                            <span>Accounting / Finance</span>
                                            <p>(3 open positions)</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="#" title="">
                                            <i class="la la-users"></i>
                                            <span>Human Resource</span>
                                            <p>(3 open positions)</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cat-sec">
                            <div class="row no-gape">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="#" title="">
                                            <i class="la la-phone"></i>
                                            <span>Telecommunications</span>
                                            <p>(22 open positions)</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="#" title="">
                                            <i class="la la-cutlery"></i>
                                            <span>Restaurant / Food Service</span>
                                            <p>(6 open positions)</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="#" title="">
                                            <i class="la la-building"></i>
                                            <span>Construction / Facilities</span>
                                            <p>(3 open positions)</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="p-category">
                                        <a href="#" title="">
                                            <i class="la la-user-md"></i>
                                            <span>Health</span>
                                            <p>(3 open positions)</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="#" title="">Browse All Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block double-gap-top double-gap-bottom">
            <div data-velocity="-.1" style="background: url(images/middle.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div>
            <!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="simple-text-block style2">
                            <h3>Make a Difference with Your Online Resume!</h3>
                            <span>Your resume in minutes with JobHunt resume assistant is ready!</span>
                            <a href="./register.html" title="">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="block ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>How It Works</h2>
                            <span>Each month, more than 7 million Jobhunt turn to website in their search for work, making over <br />160,000 applications every day.
                        </span>
                        </div>
                        <!-- Heading -->
                        <div class="how-to-sec ">
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-user"></i></span>
                                <h3>Register an account</h3>
                                <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
                            </div>
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                <h3>Specify & search your job</h3>
                                <p>Browse profiles, reviews, and proposals then interview top candidates. </p>
                            </div>
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-list"></i></span>
                                <h3>Apply for job</h3>
                                <p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-sec">
                            <ul class="nav nav-tabs">
                                <li><a class="current" data-tab="fjobs">Featured Jobs</a></li>
                                <li><a data-tab="rjobs">Recent Jobs</a></li>
                            </ul>
                            <div id="fjobs" class="tab-content current">
                                <div class="job-listings-tabs">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="job_single.html" title="">Web Designer / Developer</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="job_single.html" title="">C Developer (Senior) C .Net</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is pt fill">Part time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="job_single.html" title="">Regional Sales Manager South</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="job_single.html" title="">Marketing Dairector</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="rjobs" class="tab-content">
                                <div class="job-listings-tabs">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="job_single.html" title="">Marketing Dairector</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="job_single.html" title="">Application Developer</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is pt fill">Part time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="job_single.html" title="">Social Media and Public</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is fl fill">Freelance</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="job_single.html" title="">Web Designer / Developer</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="browse-all-cat">
                                <a href="#" title="" class="style2">Load more listings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div data-velocity="-.2" style="background: url(images/bottom.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible"></div>
            <!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="download-sec">
                            <div class="download-text">
                                <h3>Download & Enjoy</h3>
                                <p>Search, find and apply for jobs directly on your mobile device or desktop Manage all of the jobs you have applied to from a convenience secure dashboard.</p>
                                <ul>
                                    <li>
                                        <a href="#" title="">
                                            <i class="la la-apple"></i>
                                            <span>App Store</span>
                                            <p>Available now on the</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="la la-android"></i>
                                            <span>Google Play</span>
                                            <p>Get in on</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="download-img">
                                <img src="images/app-zoom.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Special Skills jobs</h2>
                            <span>37 jobs live - 0 added today.</span>
                        </div>
                        <!-- Heading -->
                        <div class="tab-sec">
                            <div id="fjobs" class="tab-content current">
                                <div class="job-listings-tabs">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is pt fill">Part time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Regional Sales Manager South</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Marketing Dairector</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Application Developer</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is pt fill">Part time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Social Media and Public</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is fl fill">Freelance</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div>
                                            <!-- Job -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="browse-all-cat">
                                <a href="#" title="" class="style2">Load more listings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Recent Jobs</h2>
                            <span>Leading Employers already using job and talent.</span>
                        </div>
                        <!-- Heading -->
                        <div class="job-grid-sec">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="job-grid">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="http://placehold.it/235x115" alt="" /> </div>
                                            <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                            <span>Massimo Artemisis</span>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        </div>
                                        <span class="job-lctn">Sacramento, California</span>
                                        <a href="#" title="">APPLY NOW</a>
                                    </div>
                                    <!-- JOB Grid -->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="job-grid">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="http://placehold.it/235x115" alt="" /> </div>
                                            <h3><a href="#" title="">Marketing Director</a></h3>
                                            <span>Massimo Artemisis</span>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        </div>
                                        <span class="job-lctn">Sacramento, California</span>
                                        <a href="#" title="">APPLY NOW</a>
                                    </div>
                                    <!-- JOB Grid -->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="job-grid">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="http://placehold.it/235x115" alt="" /> </div>
                                            <h3><a href="#" title="">Application Developer For Android</a></h3>
                                            <span>Altes Bank</span>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        </div>
                                        <span class="job-lctn">Sacramento, California</span>
                                        <a href="#" title="">APPLY NOW</a>
                                    </div>
                                    <!-- JOB Grid -->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="job-grid">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="http://placehold.it/235x115" alt="" /> </div>
                                            <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                            <span>Massimo Artemisis</span>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        </div>
                                        <span class="job-lctn">Sacramento, California</span>
                                        <a href="#" title="">APPLY NOW</a>
                                    </div>
                                    <!-- JOB Grid -->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="job-grid">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="http://placehold.it/235x115" alt="" /> </div>
                                            <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                            <span>MediaLab</span>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        </div>
                                        <span class="job-lctn">Sacramento, California</span>
                                        <a href="#" title="">APPLY NOW</a>
                                    </div>
                                    <!-- JOB Grid -->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="job-grid">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="http://placehold.it/235x115" alt="" /> </div>
                                            <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                            <span>StarHealth</span>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        </div>
                                        <span class="job-lctn">Sacramento, California</span>
                                        <a href="#" title="">APPLY NOW</a>
                                    </div>
                                    <!-- JOB Grid -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="#" title="" class="style2">Load more listings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section>
        <div class="block gray">
            <div data-velocity="-.1" style="background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url(https://images.pexels.com/photos/7065/space-desk-office-hero-7065.jpg?w=1260&h=750&auto=compress&cs=tinysrgb) repeat scroll 50% 422.28px transparent;"
                class="parallax scrolly-invisible"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2 style="color: #fff;">Top Company Registered</h2>
                            <span>Some of the companies we've helped recruit excellent applicants over the years.</span>
                        </div>
                        <!-- Heading -->
                        <div class="top-company-sec">
                            <div class="row" id="companies-carousel">
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="http://placehold.it/180x180" alt="" />
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div>
                                    <!-- Top Company -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="http://placehold.it/180x180" alt="" />
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div>
                                    <!-- Top Company -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="http://placehold.it/180x180" alt="" />
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div>
                                    <!-- Top Company -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="http://placehold.it/180x180" alt="" />
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div>
                                    <!-- Top Company -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="http://placehold.it/180x180" alt="" />
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div>
                                    <!-- Top Company -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="simple-text">
                            <h3>Gat a question?</h3>
                            <span>We're here to help. Check out our FAQs, send us an email or call us at 1 (800) 555-5555</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection