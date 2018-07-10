@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Shortlisted Candidate')

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
				 	<div class="col-lg-9 column mb-50">
				 		<div class="padding-left">
                            <div class="padding-left">
								<div class="emply-resume-sec">
                                    <h3>Resume</h3>
                                    @foreach($applied_jobs as $job)
									<div class="emply-resume-list">
										<div class="emply-resume-thumb">
											<img src="{{ asset('storage/uploads/'. (($job->candidate->dp) ? $job->candidate->dp : 'default_user.png')) }}" alt="Photo" />
                                        </div>
                                        
										<div class="emply-resume-info">
											<h3>
												<a href="#" title="">{{ $job->candidate->fname }} {{ $job->candidate->lname }} <span class="text-blue">(Age: {{ date_diff(date_create(date('Y-m-d', strtotime($job->candidate->date_of_birth))), date_create(date('Y-m-d')))->format("%y years") }})</span></a>
											</h3>
											<span>
                                                {{-- <i>{{ sizeof($job->candidate->candidateEducation) ? $job->candidate->candidateEducation->first()->institution_name : '-' }}</i> --}}
                                                <i>{{ $job->candidate->candidateEducation->first()['institution_name'] }}</i>
                                            </span>
											<p>
                                                <i class="la la-phone"></i>{{ $job->candidate->phone }}
                                            </p>
                                            <p>
                                                <i class="la la-briefcase"></i>{{ $job->candidate->candidateSkill->first()['experience'] }} Year{{($job->candidate->candidateSkill->first()['experience'] > 1) ? 's' : '' }}
                                            </p>
										</div>
										<div class="action-resume">
											<div class="action-center">
												<span>Action
													<i class="la la-angle-down"></i>
												</span>
												<ul>
													<li>
														<a href="{{ route('employer.public.candidate.resume', $job->candidate->id) }}" target="_blank" title="">View CV</a>
													</li>
													<li>
														<a href="{{ route('public.candidate.profile', $job->candidate->id) }}" target="_blank" title="">View Profile</a>
													</li>
													<li>
														<a href="#" id="shortListCandidate" class="unshortlisted" data-jobId="{{ $job->id }}" title="">Add To Shortlist</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="del-resume">
											<a href="#" title="Reject Candidate">
												<i class="la la-times text-red"></i>
											</a>
										</div>
                                    </div>
                                    <!-- Emply List -->
									@endforeach
									<div class="pagination-laravel">
									{{ $applied_jobs->links() }}
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
    var base_url = "{{ url('/employer/') }}";
    $('#shortListCandidate').click(function() {
        var jobId = $(this).data('jobid');
        if($(this).hasClass('unshortlisted')){
			$(this).removeClass().addClass('shortlisted');
            $(this).html('Remove from Shortlist');
        }else if($(this).hasClass('shortlisted')){
			$(this).removeClass().addClass('unshortlisted');
			$(this).html('Add To Shortlist');
        }
        $.ajax({
            url: base_url+"job/candidates/applied/shortListed/",
            type: "post",
            headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
            data:{job_id: jobId},
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
