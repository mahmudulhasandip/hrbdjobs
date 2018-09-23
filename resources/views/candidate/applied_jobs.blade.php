@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

@section('content')
    <div id="nav_height"></div>
    <section class="overlape">
        <div class="block no-padding">
            <img src="{{ asset('images/top_add.jpg') }}" alt="Advertisement banner">
            {{-- <div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Applied Jobs</h3>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                    <div id="wall" class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <h3>Manage Applied Jobs (<i class="text-default">Total {{ $total }} jobs applied</i> )</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Applied Job</td>
                                            <td>Position</td>
                                            <td>Date</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applied_jobs as $app_job)
                                        <tr id="job-tab-{{$app_job->job_id}}">
                                            <td class="pointer newtab" data-url="{{ route('single.job', $app_job->job_id) }}">
                                                <div class="table-list-title">
                                                    <i>{{ $app_job->job->employer->employerCompanyInfo->name }}</i><br />
                                                    <span><i class="la la-map-marker"></i>{{ $app_job->job->location }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pointer newtab table-list-title" data-url="{{ route('single.job', $app_job->job_id) }}">
                                                    <h3><a href="{{ route('single.job', $app_job->job_id) }}" title="">{{ $app_job->job->title }}</a></h3>
                                                </div>
                                            </td>
                                            <td>
                                                <span>{{ date("M d, Y", strtotime($app_job->created_at)) }}</span><br />
                                            </td>
                                            <td>
                                                <ul class="action_job">
                                                    <li class="pointer"><span>Withdraw</span><a href="javascript:void(0)" class="withdraw-job" data-jobId="{{ $app_job->job_id }}"><i class="la la-close"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="margin-0 pagination-laravel">
                                    {{ $applied_jobs->links() }}
                                </div><!-- Pagination -->
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
    $('.withdraw-job').click(function() {
        var jobId = $(this).data('jobid');

        $.ajax({
            url: base_url+"/applied/job/withdraw",
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

