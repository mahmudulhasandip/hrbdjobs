@extends('users.layout.app')

@section('title', 'HRBDJobs | Employer Comapany Profile')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url({{ asset('/images/top-bg.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
						<h3>Job List</h3>
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
				 			<h3 class="sb-title open">Specialism</h3>
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
				 			<h3 class="sb-title closed">Offerd Salary</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<p><input type="checkbox" name="smplechk" id="1"><label for="1">10k - 20k</label></p>
									<p><input type="checkbox" name="smplechk" id="2"><label for="2">20k - 30k</label></p>
									<p><input type="checkbox" name="smplechk" id="3"><label for="3">30k - 40k</label></p>
									<p><input type="checkbox" name="smplechk" id="4"><label for="4">40k - 50k</label></p>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">Career Level</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<p><input type="checkbox" name="smplechk" id="5"><label for="5">Intermediate</label></p>
									<p><input type="checkbox" name="smplechk" id="6"><label for="6">Normal</label></p>
									<p><input type="checkbox" name="smplechk" id="7"><label for="7">Special</label></p>
									<p><input type="checkbox" name="smplechk" id="8"><label for="8">Experienced</label></p>
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
				 			<h3 class="sb-title closed">Industry</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<p><input type="checkbox" name="smplechk" id="16"><label for="16">Meezan Job</label></p>
									<p><input type="checkbox" name="smplechk" id="17"><label for="17">Speicalize Jobs</label></p>
									<p><input type="checkbox" name="smplechk" id="18"><label for="18">Business Jobs</label></p>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">Qualification</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<p><input type="checkbox" name="smplechk" id="19"><label for="19">Matriculation</label></p>
									<p><input type="checkbox" name="smplechk" id="20"><label for="20">Intermidiate</label></p>
									<p><input type="checkbox" name="smplechk" id="21"><label for="21">Gradute</label></p>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="banner_widget">
							<a href="#" title=""><img src="images/ad.png" alt="photo" style="margin-top: 20px;" /></a>
					   </div>
				 	</aside>
				 	<div class="col-lg-8 column">
				 		<div class="modrn-joblist">
					 		<div class="filterbar">
					 			<!-- <span class="emlthis"><a href="mailto:example.com" title=""><i class="la la-envelope-o"></i> Email me Jobs Like These</a></span> -->
					 			<div class="sortby-sec">
					 				<span>Sort by</span>
					 				<select id="sort_by" data-placeholder="Most Recent" class="chosen">
										<option value="recent">Most Recent</option>
										<option value="asc">A-Z</option>
										<option value="desc">Z-A</option>
									</select>
									<select id="per_page" data-placeholder="10 Per Page" class="chosen">
										<option value="10">10 Per Page</option>
										<option value="20">20 Per Page</option>
										<option value="30">30 Per Page</option>
									</select>
					 			</div>
					 			<h5>{{ $live_jobs }} Jobs & Vacancies</h5>
					 		</div>
						</div><!-- MOdern Job LIst -->
						<div class="job-list-modern">
							<div class="job-listings-sec">
								@foreach($jobs as $job)
								<div class="job-listing wtabs">
									<div class="job-title-sec pointer newtab" data-url="{{ route('single.job', $job->id) }}">
										<div class="c-logo"> <img src="{{ asset('storage/uploads/'.(($job->employer->employerCompanyInfo['logo']) ? $job->employer->employerCompanyInfo['logo'] : 'default_user.png'))}}" alt="" /> </div>
										<h3><a href="#" title="">{{ $job->title }}</a></h3>
										<span>{{ $job->employer->employerCompanyInfo['name'] }}</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>{{ $job->employer->employerCompanyInfo['city'] }} / {{ $job->employer->employerCompanyInfo['country'] }}</div>
										
									</div>
									<div class="job-style-bx">
										<span class="job-is ft">Full time</span>
										@if($job->vacancy)
										<span class="mt-5 job-is ft">Vacancy - {{ $job->vacancy }}</span>
										@endif
										<i><i class="la la-clock-o"></i> {{ date("M d, Y", strtotime($job->deadline)) }}</i>
									</div>
								</div>
								@endforeach
							</div>
							<div class="margin-50 pagination-laravel">
								{{ $jobs->links() }}
							</div>
						</div>
					 </div>
				 </div>
			</div>
		</div>
	</section>
@endsection


@push('js')
<script src="/js/jquery.scrollbar.min.js" type="text/javascript"></script>
<script>
	$('.newtab').click(function() {
        window.open(
            $(this).data('url'),
            '_blank'
        );
    });
</script>

@endpush