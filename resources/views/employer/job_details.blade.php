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
                                    <div class="job-thumb"> <img src="{{ asset('storage/uploads/'.(($company_info->logo) == '' ? 'company-avatar.png' : $company_info->logo) )}}" alt="" /> </div>
                                    <div class="job-head-info">
                                        <h3 class="bold text-blue">{{ $job->title }}</h3>
                                        <span><i class="la la-map-marker"></i>{{ $job->location }}</span>
                                        <p><i class="la la-unlink"></i> <a target="blank" href="{{(substr( $company_info->website, 0, 4 ) === 'http') ? $company_info->website : 'http://'.$company_info->website}}">{{ $company_info->website }}</a></p>
                                        <p><i class="la la-phone"></i> {{ $company_info->phone }}</p>
                                        <p><i class="la la-envelope-o"></i> {{ $company_info->email }}</p>
                                    </div>
                                </div><!-- Job Head -->
                                <div class="job-details">
                                    <h1 class="bold">Job Description</h1>
                                    <h3>Vacancy</h3>
                                    <p>{{ ($job->vacancy < 10) ? '0'.$job->vacancy : $job->vacancy }}</p>
                                    <h3>Qualification</h3>
                                    <p>{{ $job->qualification }}</p>
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
                            {{-- <div class="apply-alternative">
                                <a href="#" title=""><i class="la la-arrow-circle-o-right" style="margin-top: 15px;"></i> Follow Company</a>
                                <span><i class="la la-heart-o"></i> Shortlist</span>
                            </div> --}}
                            <div class="job-overview mt-100">
                                <h3 class="bold">Job Overview</h3>
                                <ul>
                                    <li><i class="la la-calendar-o"></i><h3>Deadline</h3><span>{{ $job->deadline }}</span></li>
                                    <li><i class="la la-money"></i><h3>Offerd Salary</h3>
                                        <span>
                                            @if($job->is_negotiable)
                                                {{ 'Negotiable' }}
                                            @else
                                                &#2547;{{ $job->salary_min }} - &#2547;{{ $job->salary_min }}
                                            @endif
                                            
                                        </span>
                                    </li>
                                    <li><i class="la la-mars-double"></i><h3>Gender</h3><span>
                                        @php
                                        if( $job->gender == 0){
                                            echo 'ALL can apply';
                                        }elseif( $job->gender == 1){
                                            echo 'Male';
                                        }elseif( $job->gender == 2){
                                            echo 'Female';
                                        }elseif( $job->gender == 3){
                                            echo 'Others';
                                        }else{
                                            echo 'N/A';
                                        }

                                        @endphp
                                    </span></li>
                                    <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>{{ $job->jobLevel->name }}</span></li>
                                    <li><i class="la la-puzzle-piece"></i><h3>Job Category</h3><span>{{ $job->jobCategory->name }}</span></li>
                                    <li><i class="la la-shield"></i><h3>Experience</h3><span>{{ $job->experience }} Year(s)</span></li>
                                    <li><i class="la la-map"></i><h3>Location</h3><span>{{ $job->location }}</span></li>
                                </ul>
                            </div><!-- Job Overview -->
                        </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
