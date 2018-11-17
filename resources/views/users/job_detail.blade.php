@extends('users.layout.app')

@section('title', 'HRBDJobs | Job Details')

@push('css')
<style>
    .job-is.ft.fill, .job-list-modern .job-is.ft.fill, .apply-thisjob.ft.fill{
        color: #fff !important;
    }
</style>
@endpush

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url({{ asset('/images/top-bg.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
						<h3>Job Details </h3>
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
                                        <p><i class="la la-envelope-o"></i> {{ $company_info->email }}</p>
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
                                <div class="recent-jobs">
                                    <h3>Similar Jobs</h3>
                                    <div class="job-list-modern">
                                        <div id="similar-jobs" class="job-listings-sec no-border">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 column">
                            @if (Auth::guard('candidate')->user())
                                @php
                                    $applied_job = App\Applied_job::where('job_id', $job->id)->where('candidate_id', Auth::guard('candidate')->user()->id)->first();
                                @endphp
                                @if($applied_job)
                                <a class="apply-thisjob ft fill mt40" href="javascript:void(0)" title=""><i class="la la-paper-plane"></i>Already Applied</a>
                                @else
                                    <a class="apply-thisjob mt40" href="{{ route('candidate.apply.job', $job->id) }}" title=""><i class="la la-paper-plane"></i>Apply for job</a>
                                @endif
                            @else
                                <a class="apply-thisjob mt40" href="{{ route('candidate.apply.job', $job->id) }}" title=""><i class="la la-paper-plane"></i>Apply for job</a>
                            @endif

                            <div class="apply-alternative">
                                @if(Auth::check())
                                <a target="_blank" href="{{ route('company.profile', ['id'=>$company_info->id, 'candidate_id'=>Auth::guard('candidate')->user()->id]) }}"><i class="la la-building-o"></i>View Company</a>
                                @else
                                <a target="_blank" href="{{ route('company.profile', ['id'=>$company_info->id]) }}"><i class="la la-building-o"></i>View Company</a>
                                @endif
                                @if (Auth::guard('candidate')->user())
                                    @php
                                        $favJob = App\Favourite_job::where('job_id', $job->id)->where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 1)->first();
                                    @endphp
                                    @if($favJob)
                                        <a href="javascript:void(0)" data-jobId="{{ $job->id }}" class="mr-left-10 short-listed"><i class="fa fa-bookmark fa-2x"></i>Make it Unshorted</a>
                                    @else
                                        <a href="javascript:void(0)" data-jobId="{{ $job->id }}" class="mr-left-10 short-listed"><i class="la la-bookmark la-2x"></i>Make it Shortlisted</a>
                                    @endif
                                @else
                                    <a href="{{ route('candidate.shortlisted.job') }}" class="mr-left-10"><i class="la la-bookmark la-2x"></i>Make it Shortlisted</a>
                                @endif

                            </div>
                            <div class="job-overview mt-100">
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
    </section>

@endsection

@push('js')
    <script>
        var base_url = "{{ url('/') }}";
        $(document).ready(function() {

            $.ajax({
                url: base_url+"/similar/jobs/",
                type: "post",
                headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
                data:{id: "{{ $job->id }}"},
                success: function(similarJob){
                    $('#similar-jobs').html(similarJob);
                }
            });
        });

        function viewJob(url){
            window.open(
                url.trim(),
                '_blank'
            );
        }
    </script>

    <script>
    var can_base_url = "{{ url('/candidate/') }}";
    $('.short-listed').click(function() {
        var jobId = $(this).data('jobid');
        if($(this).children().hasClass('fa')){
            $(this).children().removeClass().addClass('la la-bookmark la-2x');
        }else if($(this).children().hasClass('la')){
            $(this).children().removeClass().addClass('fa fa-bookmark fa-2x');
        }
        $.ajax({
            url: can_base_url+"/shortlisted/job/create",
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
