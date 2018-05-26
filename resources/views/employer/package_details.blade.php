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
						 		

                                 <div class="col-sm-8 col-sm-offset-1">
                                    <div class="package_details mb50">

                                        <ul>

                                            <li>
                                                <span class="pull-left">Date: {{ date('d-m-Y') }}</span>
                                            </li>

                                            <li>
                                                <h3 class="text" style="font-size: 20px;
                                                font-weight: bold;">
                                                    <span style="font-size: 20px;
                                                    font-weight: bold;">Package Name: </span> {{ $packages->name }}</h3>
                                            </li>
                                            
                                            <li>
                                                <h3 class="text">
                                                    <span>Job Post(s): </span> {{ $packages->job_post }}</h3>
                                            </li>
                                            <li>
                                                <h3 class="text">
                                                    <span>Duration: </span> {{ $packages->duration }} Month(s)</h3>
                                            </li>
                                            <li>
                                                <span class="pull-right">price: {{ $packages->price }}</span>
                                            </li>

                                            <li>
                                                <span class="pull-right">Discount: {{ $packages->discount }}</span>
                                            </li>

                                            <li>
                                                <span class="pull-right bold">Total: {{ $packages->price - $packages->discount }}</span>
                                            </li>

                                        </ul>
                                    </div>

                                </div>

                                <div class="col-sm-8 col-sm-offset-1">
                                    <div class="package_details mb50">
                                        <span style="margin-bottom: 10px; display: inline-block;">Tranxaction ID:</span>
                                        <br>
                                        <input type="text" placeholder="ex: TXD15623454"> 
                                        <a href="" type="submit" class="post-job-btn pull-right">Submit</a>
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
