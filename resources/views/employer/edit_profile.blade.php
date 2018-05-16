@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Profile')

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
									<li class="inner-child active">
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
					 		<div class="profile-title">
					 			<h3>Employee Profile</h3>
					 			
					 			<div class="upload-img-bar">
					 				<span class="round"><img src="http://placehold.it/140x140" alt="" /><i>x</i></span>
					 				<div class="upload-info">
					 					<a href="#" title="">Browse</a>
					 					<span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
					 				</div>
					 			</div>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-6">
					 						<span class="pf-title">Full Name</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Ali TUFAN" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Title</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="UX / UI Designer" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Allow In Search</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Allow In Search" class="chosen">
													<option>Yes</option>
													<option>No</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Minimum Salary</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="$4250" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Experience</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Allow In Search" class="chosen">
													<option>2-6 Years</option>
													<option>6-12 Years</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Age</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Allow In Search" class="chosen">
													<option>22-30 Years</option>
													<option>30-40 Years</option>
													<option>40-50 Years</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Current Salary($) min</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="20K" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Max</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="30K" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Expected Salary($) min</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="30k" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Max</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="40K" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Education Levels</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Diploma</option>
													<option>Inter</option>
													<option>Bachelor</option>
													<option>Graduate</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Languages</span>					 						
					 						<div class="pf-field">
						 						<div class="pf-field">
						 							<select data-placeholder="Please Select Specialism" class="chosen">
														<option>English</option>
														<option>German</option>
													</select>
						 						</div>
											</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Categories</span>					 						
					 						<div class="pf-field no-margin">
						 						<ul class="tags">
										           <li class="addedTag">Photoshop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Photoshop"></li>
										           <li class="addedTag">Digital & Creative<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Digital"></li>
										           <li class="addedTag">Agency<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Agency"></li>
							            			<li class="tagAdd taglist">  
							              				 <input type="text" id="search-field">
										            </li>
												</ul>
											</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea>Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed severalnew methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer ollaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present</textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<button type="submit">Update</button>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="social-edit">
					 			<h3>Social Edit</h3>
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-6">
					 						<span class="pf-title">Facebook</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.facebook.com/TeraPlaner" />
					 							<i class="fa fa-facebook"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Twitter</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.twitter.com/TeraPlaner" />
					 							<i class="fa fa-twitter"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Google</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.google-plus.com/TeraPlaner" />
					 							<i class="la la-google"></i>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Linkedin</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.Linkedin.com/TeraPlaner" />
					 							<i class="la la-linkedin"></i>
					 						</div>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 		<div class="contact-edit">
					 			<h3>Contact</h3>
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Phone Number</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="+90 538 963 58 96" />
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Email</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="demo@jobhunt.com" />
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Website</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="www.jobhun.com" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Country</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Find On Map</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Collins Street West, Victoria 8007, Australia." />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Latitude</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="41.1589654" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Longitude</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="21.1589654" />
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<a href="#" title="" class="srch-lctn">Search Location</a>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Maps</span>
					 						<div class="pf-map">
					 							<div id="map_div"></div>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<button type="submit">Update</button>
					 					</div>
					 				</div>
					 			</form>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection
