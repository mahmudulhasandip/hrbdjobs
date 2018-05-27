@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Dashboard')

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
                                                                <th>Package</th>
                                                                <th>Expire Date</th>
                                                                <th>Remain post</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-hover">
                                                            <tr>
                                                                @php
                                                                $id = 1;
                                                                @endphp
                                                                @foreach($featured_packages as $featured_package)
                                                                <td>{{ $id++ }}</td>
                                                                <td>{{ $featured_package->name }}</td>
                                                                <td>{{ $featured_package->price }}</td>
                                                                <td>{{ $featured_package->discount }}</td>
                                                                <td class="{{ ($featured_package->featured_type) ? "text-info" : "text-success" }} bold">{{ ($featured_package->featured_type) ? "Job Feature" : "Company Feature" }}</td>
                                                                <td>{{ $featured_package->featured_amount }}</td>
                                                                <td>{{ $featured_package->duration }}</td>
                                                                <td class="text-center">
                                                                    <a href="/employer/featured_package/{{ $featured_package->id }}" class="buy_btn">Buy</a>
                                                                </td>
                                                                @endforeach
                                                            </tr>
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
