@extends('employer.layout.app')
@section('title', 'HRBDJobs | Employer Shortlisted Candidate')
@section('content')
<div id="nav_height"></div>
<section class="overlape">
	<div class="block no-padding">
		<img src="{{ asset('images/top_add.jpg') }}" alt="Advertisement banner">
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
				<div class="col-lg-9 column mb-50">
					<div class="border-line"></div>
					<div class="padding-left">
						<div class="emply-resume-sec">
							<!-- Tabs Bar -->
							<div class="tab-sec ">
								<div class="text-center">
									<ul class="nav nav-tabs">
										<li><a class="current applied-candidate" data-tab="applied_candidates">Applied Candidates</a></li>
										<li><a data-tab="job_post">Job Post</a></li>
									</ul>
								</div>
								<div id='applied_candidates' class="filterbar mt-50 tab-content current">
									<div class="sortby-sec m-2">
										<span>Sort by</span>
										<select class="left filter location" >
											<option value="">Location</option>
											@foreach($locations as $location)
											{{-- <option value="{{ $location->city }}">{{ $location->city }}</option> --}}
											<option value="{{ ucfirst(trans($location->city)) }}">{{ ucfirst(trans($location->city)) }}</option>
											@endforeach
										</select>
										<select class="left filter institution">
											<option value="">Institution</option>
											@foreach($institutes as $institute)
											<option value="{{ $institute->name }}">{{ $institute->name }}</>
											@endforeach
										</select>
										<select class="left filter experience">
											<option value="">Experience</option>
											@foreach($experiences as $experience)
											<option value="{{ $experience->name }}">{{ $experience->name }}</option>
											@endforeach
										</select>
									</div>

									{{-- <h3>Applied Candidate's</h3> --}}
									<input type="hidden" value="{{ $job_id }}" id="job_id">

									{{-- applied candidates list --}}
									<div class="candidate_list">
										@include('employer.ajaxPartials.applied_candidates')
									</div>
								</div>

								<div id="job_post" class="tab-content">
									<div class="block m-4">
										<div class="container">
											<div class="row">
													<div class="col-lg-8 column">
														<div class="job-single-sec">
															@if(!$job->hide_company_info)
															<div class="job-single-head">
																<div class="job-thumb"> <img src="{{ asset('storage/uploads/'.(($company_info->logo) == '' ? 'company-avatar.png' : $company_info->logo) )}}" alt="" /> </div>
																<div class="job-head-info">
																	<h3 class="bold text-blue">{{ $job->title }}</h3>
																	<span><i class="la la-map-marker"></i>{{ $job->location }}</span>
																	<p><i class="la la-unlink"></i> <a target="blank" href="{{(substr( $company_info->website, 0, 4 ) === 'http') ? $company_info->website : 'http://'.$company_info->website}}">{{ $company_info->website }}</a></p>
																	<p><i class="la la-phone"></i> {{ $company_info->phone }}</p>
																	@if($company_info->email)
																	<p><i class="la la-envelope-o"></i> {{ $company_info->email }}</p>
																	@endif
																</div>
															</div><!-- Job Head -->
															@endif
															<div class="job-details">
																<h1 class="bold">Job Description</h1>
																<h3>Vacancy</h3>
																<p>{{ ($job->vacancy < 10) ? '0'.$job->vacancy : $job->vacancy }}</p>
																<h3>Qualification</h3>
																<p>{{ $job->qualification }}</p>
																{!! $job->description !!}

																@if($job->educationalRequirement)
																	<h5 class="mt-50">Preferred Institution</h5>
																	<p>{{ $job->educationalRequirement->preferred_university }}</p>
																	@if($job->educationalRequirement->others)
																		<p>Other Info: {{ $job->educationalRequirement->others }}</p>
																	@endif
																@endif

																@if($job->experiencelRequirement)
																	<h5 class="mt-50">Experience</h5>
																	@if($job->experiencelRequirement->min_experience == $job->experiencelRequirement->min_experience)
																		<p>{{ $job->experiencelRequirement->min_experience == '0' ? 'N/A': 'At least '.$job->experiencelRequirement->min_experience.' Year(s)' }}</p>
																	@else
																		<p>{{ $job->experiencelRequirement->min_experience }} - {{ $job->experiencelRequirement->min_experience }} years</p>
																	@endif
																	@if($job->experiencelRequirement->is_fresher_apply)
																		<p>Fresher also can apply</p>
																	@endif
																	@if($job->experiencelRequirement->area_of_experience)
																		<p>{{ $job->experiencelRequirement->area_of_experience }}</p>
																	@endif

																	@if($job->experiencelRequirement->area_of_business)
																		<p>{{ $job->experiencelRequirement->area_of_business }}</p>
																	@endif
																@endif

																@if(sizeof($job->otherBenifits))
																	<h5 class="mt-50">Other Benifits</h5>
																	<ul>
																		@foreach($job->otherBenifits as $otherBenifit)
																		<li>{{ $otherBenifit->benifit }}</li>
																		@endforeach
																	</ul>
																@endif

																@if($job->is_photograph_enclosed)
																<p class="m50 text-center"><strong><span class="text-danger">*Photograph</span> must be enclosed with the resume.</strong></p>
																@endif
															</div>
															{{-- <div class="share-bar">
																<span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
															</div> --}}
														</div>
													</div>
													<div class="col-lg-4 column">
														<div class="job-overview">
															<h3 class="bold">Job Overview</h3>
															<ul>
																<li><i class="la la-calendar-o"></i><h3>Deadline</h3><span>{{ $job->deadline }}</span></li>
																@if(!$job->hide_salary)
																<li><i class="la la-money"></i><h3>Offerd Salary</h3>
																	<span>
																		@if($job->is_negotiable)
																			{{ 'Negotiable' }}
																		@else
																			&#2547;{{ $job->salary_min }} - &#2547;{{ $job->salary_max }}
																		@endif

																	</span>
																</li>
																@endif
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
																@if($job->age_min > 0 && $job->age_max > 0)
																	<li><i class="la la-users"></i><h3>Age</h3><span>{{ $job->age_min }} - {{ $job->age_max }} years</span></li>
																@elseif($job->age_min == 0 && $job->age_max > 0)
																	<li><i class="la la-users"></i><h3>Age</h3><span>At most {{ $job->age_max }} years</span></li>
																@elseif($job->age_min > 0 && $job->age_max == 0)
																	<li><i class="la la-users"></i><h3>Age</h3><span>At least {{ $job->age_min }} years</span></li>
																@else
																	<li><i class="la la-users"></i><h3>Age</h3><span>Any users can apply</span></li>
																@endif
																@if($job->jobLevel)
																<li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>{{ $job->jobLevel->name }}</span></li>
																@endif

																@if($job->jobStatus)
																<li><i class="la la-thumb-tack"></i><h3>Career Status</h3><span>{{ $job->jobStatus->name }}</span></li>
																@endif
																@if($job->jobCategory)
																<li><i class="la la-puzzle-piece"></i><h3>Job Category</h3><span>{{ $job->jobCategory->name }}</span></li>
																@endif
																@if($job->jobDesignation)
																<li><i class="la la-puzzle-piece"></i><h3>Job Designation</h3><span>{{ $job->jobDesignation->name }}</span></li>
																@endif
																<li><i class="la la-location-arrow"></i><h3>Job Location</h3><span>{{ $job->location_type == '0' ? 'In Bangladesh': 'Outside bangladesh' }}</span></li>
																<li><i class="la la-map"></i><h3>Location</h3><span>{{ $job->location }}</span></li>
															</ul>
														</div><!-- Job Overview -->

														@if(sizeof($job->jobSkill) > 0)
															<div class="job-overview">
																<h3>Required Skills</h3>
																<div class="skills">
																		@foreach($job->jobSkill as $job_skill)
																			<span>{{ $job_skill->skill->name }}</span>
																		@endforeach
																</div>
															</div>
														@endif
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
		</div>
	</div>
</section>
@endsection


@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
<style>
	.nice-select{
		clear: none;
		margin-right: 5px;
	}
</style>
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script>
	$(document).ready(function() {
		$('select').niceSelect();
	});
</script>
<script>
	var base_url = "{{ url('/employer/') }}";
    $('.shortListCandidate').click(function() {
        var candidateId = $(this).data('candidateid');
		var jobId = $(this).data('jobid');
        if($(this).hasClass('unshortlisted')){
			$(this).removeClass().addClass('shortlisted');
            $(this).html('Remove from Shortlist');
        }else if($(this).hasClass('shortlisted')){
			$(this).removeClass().addClass('unshortlisted');
			$(this).html('Add To Shortlist');
        }


        $.ajax({
            url: base_url+"/job/applied/candidates/shortListed/",
            type: "post",
            headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
            data:{candidate_id: candidateId, job_id: jobId},
            success: function(msg){
				$('.applied-candidate').addClass('current');
                iziToast.success({
                    title: msg,
                    timeout: 2000,
                    overlay: false,
                    position: 'topRight',
                });


            }
        });

    });

	$('.reject_candidate').click(function() {
        var candidateId = $(this).data('candidateid');
		var jobId = $(this).data('jobid');
        $.ajax({
            url: base_url+"/job/candidates/applied/reject/",
            type: "post",
            headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
            data:{candidate_id: candidateId, job_id: jobId},
            success: function(message){
                iziToast.error({
                    title: message,
                    timeout: 2000,
                    overlay: true,
                    position: 'topRight',
                });


            }
        });

    });

</script>

{{-- ajax pagination --}}
<script>

	$(document).ready(function(){
		$(document).on('click', '.pagination .page-link',function(event){
			event.preventDefault();
			var myurl = $(this).attr('href');
			getData(myurl);
		});
	});

	function getData(myurl){
		var location = $('.filter.location').val();
		var institution = $('.filter.institution').val();
		var experience = $('.filter.experience').val();
		var job_id = $('#job_id').val();


		$.ajax({
			url: myurl,
			type: "get",
			headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
			data: {location: location, institution: institution, experience: experience, job_id: job_id},
			datatype: "html"
		}).done(function(data){
			$(".candidate_list").empty().html(data);
			window.history.pushState('','', myurl);
		}).fail(function(jqXHR, ajaxOptions, thrownError){
			alert('No response from server');
		});
	}

</script>

{{-- ajax filter --}}
<script>
	var base_url = "{{ url('/employer/') }}";

	$(document).ready(function(){
		$(document).on('change', '.filter', function(event){
			event.preventDefault();
			$location = $('.filter.location').val();
			$institution = $('.filter.institution').val();
			$experience = $('.filter.experience').val();
			var job_id = $('#job_id').val();
			$.ajax({
				url: base_url+'/job/candidates/applied/'+job_id,
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				data: {location: $location, institution: $institution, experience: $experience, job_id: job_id},
				datatype: "html"
			}).done(function(data){
				$(".candidate_list").empty().html(data);
			}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
			});
		});
	});
</script>


@endpush