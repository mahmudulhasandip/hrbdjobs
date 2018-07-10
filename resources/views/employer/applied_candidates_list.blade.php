@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Shortlisted Candidate')

@section('content')
	<section class="overlape">
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
				 	<div class="col-lg-9 column mb-50">
				 		<div class="padding-left">
                            <div class="widget shortlist">
                                <h3 class="sb-title open">Software Engineer</h3>
                                <div class="tree_widget-sec">
                                    <ul>
                                        <li class="inner-child">
                                            Mahmudul Hasan Dip
											<span style="display:block;">2 years experience</span>
											
											<a href="#"><i class="la la-trash-o"></i></a>
										</li>
										<li class="inner-child">
                                            Mahmudul Hasan Dip
											<span style="display:block;">2 years experience</span>
											
											<a href="#"><i class="la la-trash-o"></i></a>
                                        </li>
                                    </ul>
								</div>
							</div>
							
							<div class="widget shortlist">
                                <h3 class="sb-title open">Software Engineer</h3>
                                <div class="tree_widget-sec">
                                    <ul>
                                        <li class="inner-child">
                                            Mahmudul Hasan Dip
											<span style="display:block;">2 years experience</span>
											
											<a href="#"><i class="la la-trash-o"></i></a>
										</li>
										<li class="inner-child">
                                            Mahmudul Hasan Dip
											<span style="display:block;">2 years experience</span>
											
											<a href="#"><i class="la la-trash-o"></i></a>
                                        </li>
                                    </ul>
								</div>
								
								
                            </div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection
