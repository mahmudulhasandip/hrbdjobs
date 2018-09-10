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


                                <div class="col-sm-8 col-sm-offset-1">
                                    <div class="package_details mb50 text-center">
                                        <h2 class="bold text-center">THANK YOU</h2>
                                        <h3 class="bold text-center">YOUR ORDER HAVE BEEN PLACED</h3>
                                        <i class="la la-check-circle" style="color: #32c24d; font-size: 62px;"></i>
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
