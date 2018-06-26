@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

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
                        <div class="widget" id="sidebar">
                            @include('candidate.layout.sidebar')
                        </div>
                        
                    </aside>
                    <div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<div class="border-title"><h3>Followed Companies</h3></div>
						 		<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Company Name</a></h3>
										<span>2 jobs opening</span>
									</div>
									<div class="job-list-del">
										<span class="job-is ft"><a href="" class="unfollow">Unfollow</a></span>
									</div>
								</div><!-- Job -->
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Company Name</a></h3>
										<span>2 jobs opening</span>
									</div>
									<div class="job-list-del">
										<span class="job-is ft"><a href="" class="unfollow">Unfollow</a></span>
									</div>
								</div><!-- Job -->
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Company Name</a></h3>
										<span>2 jobs opening</span>
									</div>
									<div class="job-list-del">
										<span class="job-is ft"><a href="" class="unfollow">Unfollow</a></span>
									</div>
								</div><!-- Job -->
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Company Name</a></h3>
										<span>2 jobs opening</span>
									</div>
									<div class="job-list-del">
										<span class="job-is ft"><a href="" class="unfollow">Unfollow</a></span>
									</div>
								</div><!-- Job -->
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Company Name</a></h3>
										<span>2 jobs opening</span>
									</div>
									<div class="job-list-del">
										<span class="job-is ft"><a href="" class="unfollow">Unfollow</a></span>
									</div>
								</div><!-- Job -->
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Company Name</a></h3>
										<span>2 jobs opening</span>
									</div>
									<div class="job-list-del">
										<span class="job-is ft"><a href="" class="unfollow">Unfollow</a></span>
									</div>
								</div><!-- Job -->
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Company Name</a></h3>
										<span>2 jobs opening</span>
									</div>
									<div class="job-list-del">
										<span class="job-is ft"><a href="" class="unfollow">Unfollow</a></span>
									</div>
								</div><!-- Job -->
								<div class="pagination">
									<ul>
										<li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
										<li><a href="">1</a></li>
										<li class="active"><a href="">2</a></li>
										<li><a href="">3</a></li>
										<li><span class="delimeter">...</span></li>
										<li><a href="">14</a></li>
										<li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
									</ul>
								</div><!-- Pagination -->
					 		</div>
					 	</div>
					</div>
                 </div>
            </div>
        </div>
    </section>
@endsection




