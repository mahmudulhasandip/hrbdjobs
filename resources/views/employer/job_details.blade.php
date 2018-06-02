@extends('employer.layout.app')

@section('title', 'HRBDJobs | Job Details')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url({{ asset('/images/top-bg.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
						<h3>Job Details </h3>
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
                        <div class="col-lg-8 column">
                            <div class="job-single-sec">
                                <div class="job-single-head">
                                    <div class="job-thumb"> <img src="{{ asset('storage/uploads/'.(($company_info->logo) == '' ? 'default_user.png' : $company_info->logo) )}}" alt="" /> </div>
                                    <div class="job-head-info">
                                        <h3>{{ $job->title }}</h3>
                                        <span>{{ $job->location }}</span>
                                        <p><i class="la la-unlink"></i> {{ $company_info->website }}</p>
                                        <p><i class="la la-phone"></i> 0{{ $company_info->phone }}</p>
                                        <p><i class="la la-envelope-o"></i> {{ $company_info->email }}</p>
                                    </div>
                                </div><!-- Job Head -->
                                <div class="job-details">
                                    <h3>Job Description</h3>
                                    {!! $job->description !!}
                                </div>
                                <div class="share-bar">
                                    <span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                </div>
                                <div class="recent-jobs">
                                    <h3>Recent Jobs</h3>
                                    <div class="job-list-modern">
                                        <div class="job-listings-sec no-border">
                                        <div class="job-listing wtabs">
                                            <div class="job-title-sec">
                                                <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                                <span>Massimo Artemisis</span>
                                                <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                            </div>
                                            <div class="job-style-bx">
                                                <span class="job-is ft">Full time</span>
                                                <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                <i>5 months ago</i>
                                            </div>
                                        </div>
                                        <div class="job-listing wtabs">
                                            <div class="job-title-sec">
                                                <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                <h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
                                                <span>Massimo Artemisis</span>
                                                <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                            </div>
                                            <div class="job-style-bx">
                                                <span class="job-is pt ">Part time</span>
                                                <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                <i>5 months ago</i>
                                            </div>
                                        </div><!-- Job -->
                                        <div class="job-listing wtabs">
                                            <div class="job-title-sec">
                                                <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                <h3><a href="#" title="">Regional Sales Manager South</a></h3>
                                                <span>Massimo Artemisis</span>
                                                <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                            </div>
                                            <div class="job-style-bx">
                                                <span class="job-is ft ">Full time</span>
                                                <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                <i>5 months ago</i>
                                            </div>
                                        </div><!-- Job -->
                                        <div class="job-listing wtabs">
                                            <div class="job-title-sec">
                                                <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                                <h3><a href="#" title="">Marketing Dairector</a></h3>
                                                <span>Massimo Artemisis</span>
                                                <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                            </div>
                                            <div class="job-style-bx">
                                                <span class="job-is ft ">Full time</span>
                                                <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                <i>5 months ago</i>
                                            </div>
                                        </div><!-- Job -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 column">
                            <a class="apply-thisjob" href="#" title=""><i class="la la-paper-plane"></i>Apply for job</a>
                            <div class="apply-alternative">
                                <a href="#" title=""><i class="la la-arrow-circle-o-right" style="margin-top: 15px;"></i> Follow Company</a>
                                <span><i class="la la-heart-o"></i> Shortlist</span>
                            </div>
                            <div class="job-overview">
                                <h3>Job Overview</h3>
                                <ul>
                                    <li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
                                    <li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
                                    <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
                                    <li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
                                    <li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
                                    <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
                                </ul>
                            </div><!-- Job Overview -->
                            <div class="job-location">
                                <h3>Job Location</h3>
                                <div class="job-lctn-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926917.0482572999!2d-104.57738594649922!3d40.26036964524562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2s!4v1513784737244"></iframe>
                                </div>
                            </div>
                            <div class="extra-job-info">
                                <span><i class="la la-clock-o"></i><strong>35</strong> Days</span>
                                <span><i class="la la-search-plus"></i><strong>35697</strong> Displayed</span>
                                <span><i class="la la-file-text"></i><strong>300-500</strong> Application</span>
                                <span><i class="la la-file-text"></i><strong>Recent</strong> Jobs</span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
