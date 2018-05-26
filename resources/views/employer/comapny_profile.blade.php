@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Comapany Profile')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
						<h3>Company Profile </h3>
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
				 	<div class="col-lg-12 column">
				 		<div class="job-single-sec style3">
				 			<div class="job-head-wide">
				 				<div class="row">
				 					<div class="col-lg-9">
										@include('employer.layout.alert')
				 						<div class="job-single-head3 emplye">
										 <div class="job-thumb"> <img src="{{ asset('storage/uploads/'.$company_info->logo)}}" alt="" /></div>
							 				<div class="job-single-info3">
							 					<h3>{{ $company_info->name }}</h3>
							 					<span><i class="la la-map-marker"></i>{{ $company_info->city }}, {{ $company_info->country }}</span>
							 					<ul class="tags-jobs">
								 					<li><i class="la la-file-text"></i> Posted Jobs 1 <span class="text-red">(todo)</span></li>
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
								 			{{-- <a class="seemap" href="#" title=""><i class="la la-map-marker"></i> See On Map</a> --}}
								 			<a class="followus" href="#" title=""><i class="la la-paper-plane"></i> Follow us</a>
								 		</div>
				 					</div>
				 				</div>
				 			</div>
				 			<div class="job-wide-devider">
							 	<div class="row">
							 		<div class="col-lg-8 column">	
										 	{{-- company about details  --}}
							 			<div class="job-details">
											 <h3>About Business Network</h3>
											 {{-- company about details  --}}
							 				{!! $company_info->description !!}
										 </div>
										 
										 {{-- recent job posts --}}
								 		<div class="recent-jobs">
							 				<h3>Jobs from Business Network</h3>
							 				<div class="job-list-modern">
											 	<div class="job-listings-sec no-border">
													<div class="job-listing wtabs noimg">
														<div class="job-title-sec">
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
													<div class="job-listing wtabs noimg">
														<div class="job-title-sec">
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
													<div class="job-listing wtabs noimg">
														<div class="job-title-sec">
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
													<div class="job-listing wtabs noimg">
														<div class="job-title-sec">
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
								 		<div class="job-overview">
                                            <h3>Company Information</h3>
                                            <ul>
                                                
                                                <li><i class="la la-map"></i><h3>Address</h3><span>125, Ramna Century Avenue, Boro Moghbazar, Dhaka-1217, Bangladesh</span></li>
                                                <li><i class="la la-map"></i><h3>Website</h3><span><a href="http://www.limbangladesh.com" target="blank">http://www.limbangladesh.com</a></span></li>
                                                
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
