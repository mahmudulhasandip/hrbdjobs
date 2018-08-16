@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Comapany Profile')

@section('content')
<div id="nav_height"></div>
	<section class="overlape">
		<div class="block no-padding">
			<img src="{{ asset('images/top_add.jpg') }}" alt="Advertisement banner">
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
				 	<div class="col-lg-12 column">
				 		<div class="job-single-sec style3">
				 			<div class="job-head-wide">
				 				<div class="row">
				 					<div class="col-lg-9">
				 						<div class="job-single-head3 emplye">
										 <div class="job-thumb"> <img src="{{ ( $company_info->logo ) ? asset('storage/uploads/'.$company_info->logo) : asset('storage/uploads/company-avatar.png') }}" alt="" /></div>
							 				<div class="job-single-info3">
							 					<h3>{{ $company_info->name }}</h3>
							 					<span><i class="la la-map-marker"></i>{{ $company_info->city }}, {{ $company_info->country }}</span>
							 					<ul class="tags-jobs">
								 					<li><i class="la la-file-text"></i> Posted Jobs: {{ $total_jobs }} </li>
								 				</ul>
							 				</div>
							 			</div><!-- Job Head -->
				 					</div>
				 					<div class="col-lg-3">
				 						<div class="share-bar text-center">
											<a href="{{ ($social_links && $social_links->gplus_link) ? $social_links->gplus_link : '#' }}" title="" target="blank" class="share-google {{ ($social_links && $social_links->gplus_link) ? '' : 'd-none' }}"><i class="la la-google"></i></a>
											<a href="{{ ($social_links && $social_links->fb_link) ? $social_links->fb_link : '#' }} " title="" target="blank" class="share-fb {{ ($social_links && $social_links->fb_link) ? '' : 'd-none' }}"><i class="fa fa-facebook"></i></a>
											<a href="{{ ($social_links && $social_links->twitter_link) ? $social_links->twitter_link : '#' }}" title="" target="blank" class="share-twitter {{ ($social_links && $social_links->twitter_link) ? '' : 'd-none' }}"><i class="fa fa-twitter"></i></a>
											<a href="{{ ($social_links && $social_links->linkedin_link) ? $social_links->linkedin_link : '#' }}" title="" target="blank" class="share-linkedin {{ ($social_links && $social_links->linkedin_link) ? '' : 'd-none' }}"><i class="fa fa-linkedin"></i></a>
							 			</div>
								 		<div class="emply-btns">
											@if($company_info->is_featured == 1)
											<a class="followus" href="javascript: void(0);" title=""><i class="la la-star" style="color: #ffd700;"></i> Featured Company</a>
											@elseif( $featured_job )
											<a class="followus" id="feature_company" href="#" title="Feature your company"><i class="la la-paper-plane"></i> Click to feature Company</a>
											@else
											<a class="followus" href="{{ route('employer.packages.list') }}" title=""><i class="la la-paper-plane"></i> Buy Package to feature</a>
											@endif
											@if($featured_job)
											<form id="feature_company_form" action="{{ route('employer.feature.company', [ 'company_id'=>$company_info->id, 'package_id'=>$featured_job->id]) }}" method="get">
												@csrf
											</form>
											@endif
								 		</div>
				 					</div>
				 				</div>
				 			</div>
				 			<div class="job-wide-devider">
							 	<div class="row">
							 		<div class="col-lg-8 column">
										 	{{-- company about details  --}}
							 			<div class="job-details">
											<h3>About Company</h3>
											{{-- company about details  --}}
											{!! $company_info->description !!}
										</div>

										{{-- recent job posts --}}

								 		<div class="recent-jobs">
							 				<h3>Recent open jobs</h3>
							 				<div class="job-list-modern">
											 	<div class="job-listings-sec no-border">
													 @foreach($jobs as $job)
													<div class="job-listing wtabs noimg">
														<div class="job-title-sec">
														<h3><a href="#" title="" target="_blank" onclick='window.open("{{ route('employer.job.details', $job->id) }}");return false;'>{{ $job['title'] }}</a></h3>
															<span>{{ $job->employer->employerCompanyInfo['name'] }}</span>
															<div class="job-lctn"><i class="la la-map-marker"></i>{{ $job['location'] }}</div>
														</div>
														<div class="job-style-bx">
															<span class="job-is ft">{{ $job->jobStatus->name }}</span>
															<i>{{ $job->created_at->diffForHumans() }}</i>
														</div>
													</div>
													@endforeach
													<!-- Job -->
												</div>
											 </div>
										 </div>
									 </div>

									 {{-- right information table --}}
							 		<div class="col-lg-4 column">
							 			<div class="job-overview">
								 			<h3>Company Information</h3>
								 			<ul>
								 				<li class="{{ (!$company_info->address) ? 'd-none' : '' }}"><i class="la la-map"></i><h3>Address </h3><span> {{ $company_info->address }} </span></li>
								 				<li class="{{ (!$company_info->phone) ? 'd-none' : '' }}"><i class="la la-phone"></i><h3>Contact No.</h3><span>{{ $company_info->phone }}</span></li>
								 				<li class="{{ (!$company_info->email) ? 'd-none' : '' }}"><i class="la la-envelope"></i><h3>Email</h3><span>{{ $company_info->email }}</span></li>
												<li class=""><i class="la la-bars"></i><h3>Categories</h3>
													<span>
														@foreach($company_industries as $industry)
														{{ $industry->industry->name }}
														@endforeach
													</span>
												</li>
												@php
													$website = "#";
													if($company_info->website):
														$website = (substr( $company_info->website, 0, 4 ) === "http") ? $company_info->website: 'http://'.$company_info->website;
											 		endif;
												@endphp
								 				<li class="{{ (!$company_info->website) ? 'd-none' : '' }}"><i class="la la-globe "></i><h3>Website</h3><span><a href="{{ $website }}">{{ $company_info->website }}</a></span></li>
								 				<li class="{{ (!$company_info->since) ? 'd-none' : '' }}"><i class="la la-clock-o"></i><h3>Since</h3><span>{{ $company_info->since }}</span></li>
								 				<li class="{{ (!$company_info->team_size) ? 'd-none' : '' }}"><i class="la la-users"></i><h3>Team Size</h3><span>{{ $company_info->team_size }}</span></li>
								 				<li class=""><i class="la la-user"></i><h3>Followers</h3><span>15</span></li>
								 			</ul>
								 		</div><!-- Job Overview -->

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


@push('js')

<script>
	// Feature Company
	$('#feature_company').on('click', function(e){
		e.preventDefault();
		iziToast.show({
		theme: 'dark',
		icon: 'la la-bullhorn',
		title: 'Are you sure?',
		message: 'Want to feature your company?',
		position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
		progressBar: true,
		overlay: true,
		progressBarColor: '#8b91dd',
		buttons: [
			['<button>Feature</button>', function (instance, toast) {
				$('#feature_company_form').submit();
			}, true], // true to focus
			['<button>Close</button>', function (instance, toast) {
				instance.hide({
					transitionOut: 'fadeOutUp',
					onClosing: function(instance, toast, closedBy){
						console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
					}
				}, toast, 'buttonName');
			}]
		],
		});
	});
</script>

@endpush