@extends('employer.layout.app')

@section('title', 'HRBDJobs | Browse Job')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url('/images/top-bg.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Browse Resume Database</h3>
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
				 	<aside class="col-lg-4 column border-right">
				 		<div class="widget">
				 			<div class="search_widget_job">
				 				<div class="field_w_search">
				 					<input type="text" placeholder="Search Keywords" />
				 					<i class="la la-search"></i>
				 				</div><!-- Search Widget -->
								<div class="pf-field">
									<select data-placeholder="Please Select Specialism" class="chosen">
										<option>Location</option>
										<option>Dhaka</option>
										<option>Chittagong</option>
										<option>Khulna</option>
										<option>Rangpur</option>
									</select>
								</div>

				 			</div>
				 		</div>
				 		
				 		<div class="widget">
				 			<h3 class="sb-title open">Job Type</h3>
				 			<div class="type_widget">
								<p class="flchek"><input type="checkbox" name="choosetype" id="33r"><label for="33r">Freelance (9)</label></p>
								<p class="ftchek"><input type="checkbox" name="choosetype" id="dsf"><label for="dsf">Full Time (8)</label></p>
								<p class="ischek"><input type="checkbox" name="choosetype" id="sdd"><label for="sdd">Internship (8)</label></p>
								<p class="ptchek"><input type="checkbox" name="choosetype" id="sadd"><label for="sadd">Part Time (5)</label></p>
								<p class="tpchek"><input type="checkbox" name="choosetype" id="assa"><label for="assa">Temporary (5)</label></p>
								<p class="vtchek"><input type="checkbox" name="choosetype" id="ghgf"><label for="ghgf">Volunteer (8)</label></p>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title open">Categories</h3>
				 			<div class="specialism_widget">
								<div class="field_w_search">
				 					<input type="text" placeholder="Search Spaecialisms" />
				 				</div><!-- Search Widget -->
				 				<div class="simple-checkbox scrollbar">
									<p><input type="checkbox" name="spealism" id="as"><label for="as">Accountancy (2)</label></p>
									<p><input type="checkbox" name="spealism" id="asd"><label for="asd">Banking (2)</label></p>
									<p><input type="checkbox" name="spealism" id="errwe"><label for="errwe">Charity & Voluntary (3)</label></p>
									<p><input type="checkbox" name="spealism" id="fdg"><label for="fdg">Digital & Creative (4)</label></p>
									<p><input type="checkbox" name="spealism" id="sc"><label for="sc">Estate Agency (3)</label></p>
									<p><input type="checkbox" name="spealism" id="aw"><label for="aw">Graduate (2)</label></p>
									<p><input type="checkbox" name="spealism" id="ui"><label for="ui">IT Contractor (7)</label></p>
									<p><input type="checkbox" name="spealism" id="saas"><label for="saas">Charity & Voluntary (3)</label></p>
									<p><input type="checkbox" name="spealism" id="rrrt"><label for="rrrt">Digital & Creative (4)</label></p>
									<p><input type="checkbox" name="spealism" id="eweew"><label for="eweew">Estate Agency (3)</label></p>
									<p><input type="checkbox" name="spealism" id="bnbn"><label for="bnbn">Graduate (2)</label></p>
									<p><input type="checkbox" name="spealism" id="ffd"><label for="ffd">IT Contractor (7)</label></p>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">Experince</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<p><input type="checkbox" name="smplechk" id="9"><label for="9">1Year to 2Year</label></p>
									<p><input type="checkbox" name="smplechk" id="10"><label for="10">2Year to 3Year</label></p>
									<p><input type="checkbox" name="smplechk" id="11"><label for="11">3Year to 4Year</label></p>
									<p><input type="checkbox" name="smplechk" id="12"><label for="12">4Year to 5Year</label></p>
				 				</div>
				 			</div>
                         </div>
                         <div class="widget">
                            <h3 class="sb-title closed">Education</h3>
                            <div class="specialism_widget">
                                <div class="simple-checkbox">
                                   <p><input type="checkbox" name="smplechk" id="19"><label for="19">BBA</label></p>
                                   <p><input type="checkbox" name="smplechk" id="20"><label for="20">CSE</label></p>
                                   <p><input type="checkbox" name="smplechk" id="21"><label for="21">Masters</label></p>
                                </div>
                            </div>
                        </div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">Gender</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<p><input type="checkbox" name="smplechk" id="13"><label for="13">Male</label></p>
									<p><input type="checkbox" name="smplechk" id="14"><label for="14">Female</label></p>
									<p><input type="checkbox" name="smplechk" id="15"><label for="15">Others</label></p>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">Skills</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<p><input type="checkbox" name="smplechk" id="19"><label for="19">Field</label></p>
									<p><input type="checkbox" name="smplechk" id="20"><label for="20">Field</label></p>
									<p><input type="checkbox" name="smplechk" id="21"><label for="21">Field</label></p>
				 				</div>
				 			</div>
                         </div>
                         <!-- ad banner -->
				 		<div class="banner_widget">
							<a href="#" title=""><img src="/images/ad.png" alt="photo" style="margin-top: 20px;" /></a>
					   </div>
				 	</aside>
				 	<div class="col-lg-8 column">
				 		<div class="modrn-joblist">
						 	<div class="tags-bar">
						 		<span>Full Time<i class="close-tag">x</i></span>
						 		<span>UX/UI Design<i class="close-tag">x</i></span>
						 		<span>Istanbul<i class="close-tag">x</i></span>
						 		<div class="action-tags">
						 			<a href="#" title=""><i class="la la-cloud-download"></i> Save</a>
						 			<a href="#" title=""><i class="la la-trash-o"></i> Clean</a>
						 		</div>
						 	</div><!-- Tags Bar -->
					 		<div class="filterbar">
					 			<div class="sortby-sec">
					 				<span>Sort by</span>
					 				<select data-placeholder="Most Recent" class="chosen">
										<option>Most Recent</option>
										<option>Most Recent</option>
										<option>Most Recent</option>
										<option>Most Recent</option>
									</select>
									<select data-placeholder="20 Per Page" class="chosen">
										<option>30 Per Page</option>
										<option>40 Per Page</option>
										<option>50 Per Page</option>
										<option>60 Per Page</option>
									</select>
					 			</div>
					 			<!-- <h5>98 Jobs & Vacancies</h5> -->
					 		</div>
						 </div><!-- MOdern Job LIst -->
						 <div class="job-list-modern">
						 	<div class="job-listings-sec">
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>

								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Shakil Hossain Shaion</a></h3>
										<span>Web Designer / Developer</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<a href="candidates_profile.html"><span class="job-is ft">View Profile</span></a>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>
								
							</div>
							<div class="viewmore"><span><i></i><i></i><i></i>View More</span></div>
						 </div>
					 </div>
				 </div>
			</div>
		</div>
	</section>
@endsection

@push('js')
<script src="/js/jquery.scrollbar.min.js" type="text/javascript"></script>
@endpush
