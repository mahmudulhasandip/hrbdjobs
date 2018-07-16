
<div class="job-listings-sec">
	@foreach($jobs as $job)
		@php 
			$single_job = route('single.job', $job->id);
		@endphp
		<div class="job-listing wtabs">
			<div class="job-title-sec pointer newtab" onclick="viewJob('{{ $single_job}}')">
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
		{{-- <a href="{{ action('BrowseJobController@show', [$job->id]) }}">{{$job->title }}</a> --}}
	@endforeach
</div>
<div class="margin-50 pagination-laravel">
	{{ $jobs->appends(htmlspecialchars($_GET))->links() }}
</div>