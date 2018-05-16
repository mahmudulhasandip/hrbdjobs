@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Dashboard')

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
									<li class="inner-child">
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
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec mb50">
					 			<h3>Employer's Dashboard</h3>
						 		<div class="cat-sec">
									<div class="row no-gape">
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="company_profile.html" title="">
													<i class="la la-briefcase"></i>
													<span>Company Details</span>
													<p>Show Details</p>
												</a>
											</div>
										</div>
										
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="post_a_new_job.html" title="">
													<i class="la la-file-text "></i>
													<span>Post A Job</span>
													<p>Create New Job</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="employer_manage_jobs.html" title="">
													<i class="la la-check"></i>
													<span>Manage Jobs</span>
													<p>(05 Jobs)</p>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="cat-sec">
									<div class="row no-gape">
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="packages.html" title="">
													<i class="la la-file-o"></i>
													<span>Packages</span>
													<p>View Packages</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category follow-companies-popup">
												<a href="candidates_shortlisted.html" title="">
                                                    <i class="la la-heart-o"></i>
													<span>Shorlisted Candidates</span>
													<p>56 Candidates</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category view-resume-list">
												<a href="resume_database.html" title="">
                                                    <i class="la la-eye"></i>
													<span>Browse Resume Database</span>
													<p>View</p>
												</a>
											</div>
										</div>
										
									</div>
								</div>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection
