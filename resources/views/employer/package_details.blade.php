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
                                            
                                            <li class="{{ !($packages->job_post) ? 'd-none' : '' }}" >
                                                <h3 class="text">
                                                    <span>Job Post(s): </span> {{ $packages->job_post }}</h3>
                                            </li>
                                            <li class="{{ !($packages->featured_type) ? 'd-none' : '' }}" >
                                                <h3 class="text">
                                                    <span>Featured Type: </span> {{ $packages->featured_type }}</h3>
                                            </li>
                                            <li class="{{ !($packages->featured_amount) ? 'd-none' : '' }}" >
                                                <h3 class="text">
                                                    <span>Featured Amount: </span> {{ $packages->featured_amount }}</h3>
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
                                        <span style="margin-bottom: 10px; display: inline-block;">Payment:</span>
                                        <br>
                                        <form role="form" action="/employer/confirm_package" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $package_type }}" name="package_type">
                                            <input type="hidden" value="{{ $packages->id }}" name="job_package_id">
                                            <div class="col-lg-12">

                                                <span class="pf-title">Transection Type:</span>
                                                <div class="pf-field">
                                                    <select name="transaction_type" id="transaction_type" autocomplete="off" data-placeholder="Transaction Type" class="chosen">
                                                            <option>Transaction Type</option>
                                                            <option selected value="bkash">Bkash</option>
                                                    </select>
                                                </div>
                                                
                                            
                                                <span class="pf-title">Tranxaction ID:</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="ex: TXD15623454" name="txdID" autocomplete="off"> 
                                                </div>
                                                
                                            
                                                <button type="submit" class="post-job-btn pull-right">Submit</button>
                                            </div>
                                            
                                        </form>
                                        
                                        
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
