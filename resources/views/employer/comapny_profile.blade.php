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
				 					<div class="col-lg-10">
										@include('employer.layout.alert')
				 						<div class="job-single-head3 emplye">
							 				<div class="job-thumb"> <img src="http://placehold.it/120x95" alt="" /></div>
							 				<div class="job-single-info3">
							 					<h3>{{ $company_info->name }}</h3>
							 					<span><i class="la la-map-marker"></i>{{ $company_info->city }}, {{ $company_info->country }}</span>
							 					<ul class="tags-jobs">
								 					<li><i class="la la-file-text"></i> Posted Jobs 1 <span class="text-red">(todo)</span></li>
								 				</ul>
							 				</div>
							 			</div><!-- Job Head -->
				 					</div>
				 					<div class="col-lg-2">
				 						<div class="share-bar">
							 				<a href="#" title="" class="share-google"><i class="la la-google"></i></a><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
							 			</div>
								 		<div class="emply-btns">
								 			<a class="seemap" href="#" title=""><i class="la la-map-marker"></i> See On Map</a>
								 			<a class="followus" href="#" title=""><i class="la la-paper-plane"></i> Follow us</a>
								 		</div>
				 					</div>
				 				</div>
				 			</div>
				 			<div class="job-wide-devider">
							 	<div class="row">
							 		<div class="col-lg-8 column">		
							 			<div class="job-details">
							 				<h3>About Business Network</h3>
							 				<p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy penguin insect additionally wow absolutely crud meretriciously hastily dalmatian a glowered inset one echidna cassowary some parrot and much as goodness some froze the sullen much connected bat wonderfully on instantaneously eel valiantly petted this along across highhandedly much. </p>
							 				<p>Repeatedly dreamed alas opossum but dramatically despite expeditiously that jeepers loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled cassowary oh above a much opposite far much hypnotically more therefore wasp less that hey apart well like while superbly orca and far hence one.Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy.</p>
							 				<ul>
							 					<li>Ability to write code – HTML & CSS (SCSS flavor of SASS preferred when writing CSS)</li>
							 					<li>Proficient in Photoshop, Illustrator, bonus points for familiarity with Sketch (Sketch is our preferred concepting)</li>
							 					<li>Cross-browser and platform testing as standard practice</li>
							 					<li>Experience using Invision a plus</li>
							 					<li>Experience in video production a plus or, at a minimum, a willingness to learn</li>
							 				</ul>
							 				<p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy penguin insect additionally wow absolutely crud meretriciously hastily dalmatian a glowered inset one echidna cassowary some parrot and much as goodness some froze the sullen much connected bat wonderfully on instantaneously eel valiantly petted this along across highhandedly much. </p>
							 				<p>Repeatedly dreamed alas opossum but dramatically despite expeditiously that jeepers loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled cassowary oh above a much opposite far much hypnotically more therefore wasp less that hey apart well like while superbly orca and far hence one.Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy.</p>
							 			</div>
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
							 		<div class="col-lg-4 column">
							 			<div class="job-overview">
								 			<h3>Company Information</h3>
								 			<ul>
								 				<li><i class="la la-map"></i><h3>Address </h3><span>there will be the address of the company</span></li>
								 				<li><i class="la la-phone"></i><h3>Contact No.</h3><span>+880 1737 125968</span></li>
								 				<li><i class="la la-envelope"></i><h3>Email</h3><span>mhdip.pro@gmail.com</span></li>
								 				<li><i class="la la-bars"></i><h3>Categories</h3><span>Arts, Design, Media</span></li>
								 				<li><i class="la la-globe"></i><h3>Website</h3><span><a href="http://www.mhdip.com">www.mhdip.com</a></span></li>
								 				<li><i class="la la-clock-o"></i><h3>Since</h3><span>2002</span></li>
								 				<li><i class="la la-users"></i><h3>Team Size</h3><span>15</span></li>
								 				<li><i class="la la-user"></i><h3>Followers</h3><span>15</span></li>
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
