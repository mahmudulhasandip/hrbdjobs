@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

@section('content')
    {{-- <section class="overlape">
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
    </section> --}}

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
                        <div class="widget" id="sidebar">
                            @include('candidate.layout.sidebar')
                        </div>

                    </aside>
                    <div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<div class="border-title"><h3>Followed Companies</h3></div>
					 			@foreach($followCompanies as $follow)
						 		<div id="follow-tab-{{ $follow->employer_id }}" class="job-listing wtabs">
									<div class="job-title-sec newtab pointer" data-url="{{ route('company.profile', $follow->employer->employerCompanyInfo->id) }}">
										<div class="c-logo"> <img src="{{ ( $follow->employer->employerCompanyInfo->logo ) ? asset('storage/uploads/'.$follow->employer->employerCompanyInfo->logo) : asset('storage/uploads/company-avatar.png') }}" alt="" /> </div>
										<h3><a href="javascript:void(0)" title="">{{ $follow->employer->employerCompanyInfo->name }}</a></h3>
                                        @php
                                            $openingJob = App\Job::where('deadline', '>=', date('Y-m-d'))
                                                        ->where('is_paused', '=', 0)
                                                        ->where('is_verified', '=', 1)
                                                        ->where('employer_id', $follow->employer_id)
                                                        ->count();
                                        @endphp
										<span>{{ $openingJob ? $openingJob.' Jobs opening': 'No Vacancy' }}</span>
									</div>
									<div class="job-list-del">
										<span class="job-is ft"><a href="javascript:void(0)" data-employerId="{{ $follow->employer_id }}" class="unfollow">Unfollow</a></span>
									</div>
								</div><!-- Job -->
								@endforeach
								<div class="margin-0 pagination-laravel">
                                    {{ $followCompanies->links() }}
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
    $('.unfollow').click(function() {
        var employerId = $(this).data('employerid');

        $.ajax({
            url: base_url+"/follow/company/status/change",
            type: "post",
            headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
            data:{employer_id: employerId},
            success: function(message){
                iziToast.success({
                    title: message,
                    timeout: 2000,
                    overlay: true,
                    position: 'topRight',
                });

                $('#follow-tab-'+employerId).remove();
            }
        });

    });
</script>
@endpush




