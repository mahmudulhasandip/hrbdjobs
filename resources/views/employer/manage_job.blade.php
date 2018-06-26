@extends('employer.layout.app')

@section('title', 'HRBDJobs | Manage Job')

@section('content')
<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url({{ asset('/images/top-bg.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3>Manage Jobs</h3>
					 			<div class="extra-job-info">
									 <span><i class="la la-clock-o"></i> <strong>
											{{ ($totalJobs) > 0 ? $totalJobs : 0 }}
									 </strong> Job Posted</span>
						 			<span><i class="la la-file-text"></i><strong>20</strong> Application</span>
									 <span><i class="la la-users"></i>
										<strong>
											{{ (($activeJobs) > 0 ? $activeJobs : 0) }}
										</strong>
										 Active Jobs</span>
						 		</div>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td width="350">Title</td>
						 					<td>Applications</td>
											<td>Created<br> Expired</td>
											<td>Featured</td>
						 					<td>Status</td>
						 					<td>Action</td>
						 				</tr>
						 			</thead>
						 			<tbody>

										@foreach($allJobs as $job)
										@php
										@endphp
						 				<tr>
						 					<td>
												@if($job->is_featured == 1)
												<img src="{{ asset('/images/featured_ribbon.png') }}" alt="photo" class="feature_icon">
												@endif
						 						<div class="table-list-title">
												 <h3><a href="/employer/job_details/{{ $job->id }}" title="">{{ $job->title }}</a></h3>
						 						</div>
						 					</td>
						 					<td>
						 						<span class="applied-field">3+ Applied</span>
						 					</td>
						 					<td>
						 						<span>{{ date("d M Y", strtotime($job->created_at)) }}</span><br />
						 						<span>{{ date("d M Y", strtotime($job->deadline)) }}</span>
											</td>
											<td>
												<ul class="action_job">
													@if($job->is_featured == 1)
													<li><span>This is a featured post.</span><a href="javascript: void(0);" class="text-blue">Featured</a></li>
													@elseif( $featured_job && $featured_job->remain_amount > 0 && $job->is_featured == 0)
													<li><span>Want to feature?</span><a href="javascript: void(0);" id="feature_job">Feature</a></li>
													<form id="feature_job_form" action="{{ route('employer.feature.job') }}" method="POST">
														@csrf
														<input type="hidden" value="{{ $job->id }}" name="featureJobId">
													</form>
													@else
													<li><span>Buy Package for feature</span><a href="{{ route('employer.packages.list') }}">Buy Package</a></li>
													@endif
												</ul>
											</td>
						 					<td>
						 						<span class="status  {{ ($job->is_varified) ? 'active' : 'inactive' }} ">{{ ($job->is_varified) ? 'Active' : 'Inactive' }}</span>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>View Job</span><a href="/employer/job_details/{{ $job->id }}" title=""><i class="la la-eye"></i></a></li>
						 							<li><span>Edit</span><a href="{{ route('employer.edit.job.view', $job->id) }}" title=""><i class="la la-pencil"></i></a></li>
													<li><span>Delete</span><a class="delete" href="" title=""><i class="la la-trash-o"></i></a></li>
													<form id="delete-form" action="{{ route('employer.delete.job', $job->id) }}" method="get">
														<input type="hidden" name="_method" value="delete" />
														@csrf
													</form>
						 						</ul>
						 					</td>
										</tr>
										@endforeach
						 			</tbody>
						 		</table>
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

	// delete Job Post
	$('.delete').on('click', function(e){
		e.preventDefault();
		iziToast.show({
		theme: 'dark',
		icon: 'la la-trash-o',
		title: 'Are you sure?',
		message: '',
		position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
		progressBar: true,
		overlay: true,
		progressBarColor: '#e54545',
		buttons: [
			['<button>Delete</button>', function (instance, toast) {
				$('#delete-form').submit();
			}, true], // true to focus
			['<button>Close</button>', function (instance, toast) {
				instance.hide({
					transitionOut: 'fadeOutUp',
					onClosing: function(instance, toast, closedBy){
						console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
					}
				}, toast, 'buttonName');
			}]
		],
		});
	});
	

	// Feature Job Post
	$('#feature_job').on('click', function(e){
		e.preventDefault();
		iziToast.show({
		theme: 'dark',
		icon: 'la la-bullhorn',
		title: 'Are you sure?',
		message: 'Want to feature this job post?',
		position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
		progressBar: true,
		overlay: true,
		progressBarColor: '#8b91dd',
		buttons: [
			['<button>Feature</button>', function (instance, toast) {
				$('#feature_job_form').submit();
			}, true], // true to focus
			['<button>Close</button>', function (instance, toast) {
				instance.hide({
					transitionOut: 'fadeOutUp',
					onClosing: function(instance, toast, closedBy){
						console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
					}
				}, toast, 'buttonName');
			}]
		],
		});
	});
</script>

@endpush
