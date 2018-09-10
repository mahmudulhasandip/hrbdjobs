@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Dashboard')

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
					 		<div class="manage-jobs-sec mb50">
					 			<h3>Packages</h3>


                                <div class="col-lg-12">
                                    <div class="tab-sec">
                                        <div class="job-listings-tabs">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table-fill">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Job Package</th>
                                                                <th>Featured Package</th>
                                                                <th>Expire Date</th>
                                                                <th>Remain post</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-hover">
                                                            @php
                                                            $id = 1;
                                                            @endphp
                                                            @foreach($packageHistories as $packageHistory)
                                                            <tr>
                                                                <td>{{ $id++ }}</td>
                                                                <td>{{ ($packageHistory->job_package_id) ? $packageHistory->jobPackage->name : '-' }}</td>
                                                                <td>{{ ($packageHistory->featured_package_id) ? $packageHistory->featuredPackage->name : '-' }}</td>
                                                                <td>{{ $packageHistory->expired_date }}</td>
                                                                <td>{{ $packageHistory->remain_amount }}</td>
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
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection
