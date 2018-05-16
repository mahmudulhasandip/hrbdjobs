@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Shortlisted Candidate')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Welcome {{ Auth::user()->fname.' '. Auth::user()->lname}}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column border-right">
				 		<div class="widget">
				 			<div class="tree_widget-sec">
								<ul>
									<li class="inner-child">
										<a href="#" title="" class="main-a"><i class="la la-file-text"></i>My Profile</a>
										<ul>
											<li><a href="{{ route('employer.profile') }}" title="">View Profile</a></li>
											<li><a href="{{ route('employer.profile.edit') }}" title="">Edit Profile</a></li>
										</ul>
									</li>
									<li class="inner-child">
										<a href="#" title="" class="main-a"><i class="la la-file-text"></i>Company Details</a>
										<ul>
											<li><a href="{{ route('employer.company.profile') }}" title="">View Details</a></li>
											<li><a href="{{ route('employer.company.profile.edit') }}" title="">Edit Details</a></li>
										</ul>
									</li>
									<li class="inner-child">
										<a href="#" title="" class="main-a"><i class="la la-file-text"></i>Post a Job</a>
										<ul>
											<li><a href="{{ route('employer.new.job') }}" title="">New Job</a></li>
											<li><a href="{{ route('employer.drafted.job') }}" title="">Drafted Job</a></li>
										</ul>
									</li>
									<li class="inner-child">
										<a href="{{ route('employer.manage.job') }}" title="" class=""><i class="la la-briefcase"></i>Manage Jobs</a>
									</li>
									<li class="inner-child active">
										<a href="{{ route('employer.shortlisted.candidate')}}" title="" class=""><i class="la la-bookmark"></i>Shorlisted</a>
									</li>
									<li class="inner-child">
										<a href="{{ route('employer.browse.candidate.resume') }}" title="" class=""><i class="la la-binoculars"></i>Browse Resume</a>
									</li>
									<li class="inner-child"> 
										<a href="#" title="" class=""><i class="la la-lock"></i>Change Password</a>
									</li>
									<li><a href="{{ route('employer.logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" title="" class=""><i class="la la-unlink"></i>Logout</a></li>
								</ul>
				 			</div>
				 		</div>
				 		
				 	</aside>
				 	<div class="col-lg-9 column mb-50">
				 		<div class="padding-left">
                            <div class="widget shortlist">
                                <h3 class="sb-title open">Software Engineer</h3>
                                <div class="tree_widget-sec">
                                    <ul>
                                        <li class="inner-child">
                                            Mahmudul Hasan Dip
											<span style="display:block;">2 years experience</span>
											
											<a href="#"><i class="la la-trash-o"></i></a>
										</li>
										<li class="inner-child">
                                            Mahmudul Hasan Dip
											<span style="display:block;">2 years experience</span>
											
											<a href="#"><i class="la la-trash-o"></i></a>
                                        </li>
                                    </ul>
								</div>
							</div>
							
							<div class="widget shortlist">
                                <h3 class="sb-title open">Software Engineer</h3>
                                <div class="tree_widget-sec">
                                    <ul>
                                        <li class="inner-child">
                                            Mahmudul Hasan Dip
											<span style="display:block;">2 years experience</span>
											
											<a href="#"><i class="la la-trash-o"></i></a>
										</li>
										<li class="inner-child">
                                            Mahmudul Hasan Dip
											<span style="display:block;">2 years experience</span>
											
											<a href="#"><i class="la la-trash-o"></i></a>
                                        </li>
                                    </ul>
								</div>
								
								
                            </div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection
