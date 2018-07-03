@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

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
                        <div class="widget" id="sidebar">
                            @include('candidate.layout.sidebar')
                        </div>
                        
                    </aside>
                    <div class="col-lg-9 column">
                        <div class="modrn-joblist">
                            <div class="filterbar">
                                <h5>Shortlisted Jobs</h5>
                            </div>
                         </div><!-- MOdern Job LIst -->
                        <div class="job-list-modern">
                            <div class="job-listings-sec">
                                @foreach($jobs as $ap_job)
                                <div id="job-tab-{{$ap_job->job_id}}" class="job-listing wtabs">
                                    <div class="job-title-sec pointer newtab" data-url="{{ route('single.job', $ap_job->job_id) }}">
                                        <div class="c-logo"> <img src="{{ ( $ap_job->job->employer->employerCompanyInfo->logo ) ? asset('storage/uploads/'.$ap_job->job->employer->employerCompanyInfo->logo) : asset('storage/uploads/company-avatar.png') }}" alt="" /> </div>
                                        <h3><a href="{{ route('single.job', $ap_job->job_id) }}" target="_blank">{{ $ap_job->job->title }}</a></h3>
                                        <span>{{ $ap_job->job->employer->employerCompanyInfo->name }}</span>
                                        <div class="job-lctn"><i class="la la-map-marker"></i>{{ $ap_job->job->employer->employerCompanyInfo->city.', '. $ap_job->job->employer->employerCompanyInfo->country}}</div>
                                    </div>
                                    <div class="job-style-bx">
                                        <span class="job-is ft">{{ $ap_job->job->jobLevel->name }}</span>
                                        <i class="deadline" title="Deadline"><i class="la la-clock-o"></i> {{ date("M d, Y", strtotime($ap_job->job->deadline)) }}</i><br>
                                        <i title="Remove from Shortlist" class="text-danger remove_shortlist pointer" data-jobId="{{ $ap_job->job_id }}"><i class="la la-times-circle-o"></i> Remove</i>
                                    </div>
                                </div>
                                
                                @endforeach

                                <div class="pagination-laravel">
                                    {{ $jobs->links() }}
                                </div><!-- Pagination -->

                                {{-- <div class="">
                                    
                                </div> --}}
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
    var base_url = "{{ url('/candidate/') }}";
    $('.newtab').click(function() {
        window.open(
            $(this).data('url'),
            '_blank'
        );
    });
    $('.remove_shortlist').click(function() {
        var jobId = $(this).data('jobid');
       
        $.ajax({
            url: base_url+"/shortlisted/job/create",
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

                $('#job-tab-'+jobId).remove(); 
            }
        });
        
    });
</script>
@endpush

