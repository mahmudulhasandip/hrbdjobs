@extends('employer.layout.app') 
@section('title', 'HRBDJobs | Employer Shortlisted Candidate') 
@section('content')
<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
		<!-- PARALLAX BACKGROUND IMAGE -->
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
				<div class="col-lg-9 column mb-50">
					<div class="padding-left">
						<div class="emply-resume-sec">
							<!-- Tags Bar -->
							<div class="filterbar mt-50">
								<div class="sortby-sec">
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
										<option value="{{ $institute->institution_name }}">{{ $institute->institution_name }}</>
										@endforeach
									</select>
									<select class="left filter experience">
										<option value="">Experience</option>
										@foreach($experiences as $experience)
										<option value="{{ $experience->name }}">{{ $experience->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<h3>Applied Candidate's</h3>
							<input type="hidden" value="{{ $job_id }}" id="job_id">

							{{-- applied candidates list --}}
							<div class="candidate_list">
								
								@include('employer.ajaxPartials.applied_candidates')
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
            url: base_url+"/job/candidates/applied/shortListed/",
            type: "post",
            headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
            data:{candidate_id: candidateId, job_id: jobId},
            success: function(message){
                iziToast.success({
                    title: message,
                    timeout: 2000,
                    overlay: true,
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
		$.ajax({
			url: myurl,
			type: "get",
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
	// $(document).ready(function(){
	// 	$(document).on('change', '.filter',function(event){
	// 		event.preventDefault();
	// 		$location = $('.filter.location').val();
	// 		$institution = $('.filter.institution').val();
	// 		$experience = $('.filter.experience').val();
	// 		var job_id = $('#job_id').val();
	// 		$.ajax({
	// 			url: base_url+'/job/candidates/applied/filter/',
	// 			type: "post",
	// 			headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
	// 			data: {location: $location, institution: $institution, experience: $experience, job_id: job_id},
	// 			datatype: "html"
	// 		}).done(function(data){
	// 			$(".candidate_list").empty().html(data);
	// 			console.log(data);
				
	// 		}).fail(function(jqXHR, ajaxOptions, thrownError){
	// 			alert('No response from server');
	// 		});
	// 	});
	// });
	

	$(document).ready(function(){
		$(document).on('change', '.filter',function(event){
			event.preventDefault();
			$location = $('.filter.location').val();
			$institution = $('.filter.institution').val();
			$experience = $('.filter.experience').val();
			var job_id = $('#job_id').val();
			$.ajax({
				url: base_url+'/job/candidates/applied/filter/',
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				data: {location: $location, institution: $institution, experience: $experience, job_id: job_id},
				datatype: "html"
			}).done(function(data){
				$(".candidate_list").empty().html(data);
				console.log(data);
				
			}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
			});
		});
	});
</script>


@endpush