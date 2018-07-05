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
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <div class="border-title"><h3>Appropriate jobs</h3></div>
                                @foreach($jobs as $ap_job)
                                @php 
                                    $job = App\Job::where('id', $ap_job->id)->first();
                                    $favJob = App\Favourite_job::where('job_id', $ap_job->id)->where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 1)->first();
                                @endphp
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="{{ ( $job->employer->employerCompanyInfo['logo'] ) ? asset('storage/uploads/'.$job->employer->employerCompanyInfo['logo']) : asset('storage/uploads/company-avatar.png') }}" alt="" /> </div>
                                        <h3><a href="{{ route('single.job', $job->id) }}" target="_blank">{{ $job->title }}</a></h3>
                                        <span>{{ $job->employer->employerCompanyInfo['name'] }}</span>
                                        <div class="job-lctn">{{ date("M d, Y", strtotime($job->deadline)) }}</div>
                                    </div>
                                    <div class="job-list-del">
                                        <ul class="action_job">
                                            <li>
                                                @if($favJob)
                                                <span>Make it Unshorted</span>
                                                <a href="javascript:void(0)" data-jobId="{{ $job->id }}" class="short-listed text-blue"><i class="fa fa-bookmark fa-2x"></i></a>
                                                @else
                                                <span>Make it Shortlisted</span>
                                                <a href="javascript:void(0)" data-jobId="{{ $job->id }}" class="short-listed text-blue"><i class="la la-bookmark la-2x"></i></a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- Job -->
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
    $('.short-listed').click(function() {
        var jobId = $(this).data('jobid');
        if($(this).children().hasClass('fa')){
            $(this).children().removeClass().addClass('la la-bookmark la-2x');
        }else if($(this).children().hasClass('la')){
            $(this).children().removeClass().addClass('fa fa-bookmark fa-2x');
        }
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

                
                
            }
        });
        
    });
</script>
@endpush

