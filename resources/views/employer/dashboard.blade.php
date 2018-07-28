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
				 			@include('employer.layout.sidebar')
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
												<a href="{{ route('employer.company.profile') }}" title="" target="_blank">
													<i class="la la-briefcase"></i>
													<span>Company Details</span>
													<p>Show Details</p>
												</a>
											</div>
										</div>

										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="{{ route('employer.new.job') }}" title="">
													<i class="la la-file-text "></i>
													<span>Post A Job</span>
													<p>Create New Job</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="{{ route('employer.manage.job') }}" title="">
													<i class="la la-check"></i>
													<span>Manage Jobs</span>
													<p>({{$jobCount}} Job{{ $jobCount>1 ? 's' : '' }})</p>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="cat-sec">
									<div class="row no-gape">
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="{{ route('employer.packages.list') }}" title="">
													<i class="la la-file-o"></i>
													<span>Packages</span>
													<p>View Packages</p>
												</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category">
												<a href="{{ route('employer.shortlisted.candidate') }}" title="">
                                                    <i class="la la-heart-o"></i>
													<span>Shorlisted Candidates</span>
													<p>{{ $shortListed }} Candidate{{ $shortListed>1 ? 's' : '' }}</p>
												</a>
											</div>
										</div>
										{{-- <div class="col-lg-4 col-md-4 col-sm-12">
											<div class="p-category view-resume-list">
												<a href="resume_database.html" title="">
                                                    <i class="la la-eye"></i>
													<span>Browse Resume Database</span>
													<p>View</p>
												</a>
											</div>
										</div> --}}

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
