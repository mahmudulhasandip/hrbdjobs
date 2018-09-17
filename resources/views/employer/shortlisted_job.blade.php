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
						<div class="profile-title">
							<h3>Shortlisted Candidates</h3>
						</div>
				 		<div class="padding-left">


							{{-- top border line --}}
							<div class="border-line"></div>


								@forelse ($jobs as $job)
								@php
									$candidate_count = \App\Short_listed_resume::where('job_id', $job->id)->count();
								@endphp
								<div class="widget shortlist">
									<h3 class="sb-title open active close">{{ $job->title }} <span class="badge badge-pill badge-success"> {{ $candidate_count }}</span></h3>
									<div class="tree_widget-sec" >
										<ul>

											@foreach($job->appliedJob as $app_job)
											@if($app_job->is_short_listed)
											<li class="inner-child">
												<a class="title" href="{{ route('employer.public.candidate.resume', ['job_id'=>$app_job->job_id, 'id'=>$app_job->candidate->id]) }}" target="_blank">{{ $app_job->candidate->fname }} {{ $app_job->candidate->lname }}</a>
												<span style="display:block;">{{ $app_job->candidate->candidateSkill->first()['experience'] }} {{( $app_job->candidate->candidateSkill->first()['experience'])?'year':''}}{{( $app_job->candidate->candidateSkill->first()['experience']>1)?'s':''}}</span>

												<a href="javascript:;" class="shortListCandidate del-resume" data-jobId="{{ $app_job->job_id }}" data-candidateId="{{ $app_job->candidate_id }}"><i class="la la-trash-o"></i></a>
											</li>
											@endif
											@endforeach
										</ul>
									</div>
								</div>
								@empty
								<div class="alert alert-dark alert-dismissible fade show" role="alert">
									You have not <strong>shortlisted</strong> any candidate yet!
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endforelse



							<div class="pagination-laravel">
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

<script>
	var base_url = "{{ url('/employer/') }}";
	$('.shortListCandidate').click(function() {

        var candidateId = $(this).data('candidateid');
		var jobId = $(this).data('jobid');
		alert('Are you sure?');
        $.ajax({
            url: base_url+"/job/applied/candidates/shortListed/",
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
</script>

@endpush
