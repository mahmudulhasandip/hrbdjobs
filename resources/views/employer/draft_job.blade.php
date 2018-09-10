@extends('employer.layout.app')

@section('title', 'HRBDJobs | Manage Job')

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
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3>Manage Jobs</h3>
					 			<div class="extra-job-info">
									 <span><i class="la la-clock-o"></i> <strong>
											{{ ($totalJobs) > 0 ? $totalJobs : 0 }}
									 </strong> Draft job(s)</span>
						 			{{-- <span><i class="la la-file-text"></i><strong>20</strong> Application</span> --}}
                                    {{-- <span><i class="la la-users"></i>
										<strong>
											{{ (($activeJobs) > 0 ? $activeJobs : 0) }}
										</strong>
                                         Active Jobs
                                    </span> --}}
						 		</div>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Title</td>
						 					<td>Applications</td>
						 					<td>Created & Expired</td>
						 					<td>Status</td>
						 					<td>Action</td>
						 				</tr>
						 			</thead>
						 			<tbody>

										@foreach($allJobs as $job)
										@php
										$year = $job->created_at->year;
										$month = $job->created_at->month;
										$day = $job->created_at->day;
										@endphp
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
												 <h3><a href="/employer/post/new/job/{{ $job->id }}" title="">{{ $job->title }}</a></h3>
						 						</div>
						 					</td>
						 					<td>
						 						<span class="applied-field">3+ Applied</span>
						 					</td>
						 					<td>
						 						<span>{{ $year ."-". $month ."-". $day }}</span><br />
						 						<span>{{ $job->deadline }}</span>
						 					</td>
						 					<td>
						 						<span class="status  {{ ($job->is_varified) ? 'active' : 'inactive' }} ">{{ ($job->is_varified) ? 'Active' : 'Inactive' }}</span>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>View Job</span><a href="#" title=""><i class="la la-eye"></i></a></li>
						 							<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
						 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
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
