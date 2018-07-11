@extends('users.layout.app')

@section('title', 'HRBDJobs | Employer Comapany Profile')

@push('css')
<link rel="stylesheet" type="text/css" href="/css/preloader.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url({{ asset('/images/top-bg.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
						<h3>Job List</h3>
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
				 	<aside class="col-lg-4 column border-right">
				 		<div class="widget">
				 			<div class="search_widget_job">
				 				<div class="field_w_search">
				 					<input type="text" placeholder="Search Keywords" />
				 					<i class="la la-search"></i>
				 				</div><!-- Search Widget -->
								<div class="pf-field">
									<select id="city" class="select2">
										@foreach($cities as $city)
											<option value="{{ $city->city }}">{{ $city->city }}</option>
										@endforeach
									</select>
								</div>

				 			</div>
				 		</div>
				 		
				 		<div class="widget">
				 			<h3 class="sb-title open">Job Type</h3>
				 			<div class="type_widget">
				 				@foreach($job_levels as $level)
				 					@php 
			 							$job_level = App\Job_level::where('id', '=', $level->id)->first();
			 							$total_level = App\Job::where('jobs.deadline', '>=', date('Y-m-d'))
				                                ->where('is_verified', '=', 1)
				                                ->where('is_paused', '=', 0)
				                                ->where('is_drafted', 0)
				                                ->where('job_level_id', $level->id)
				                                ->count();
			 						@endphp
								<p class="flchek"><input type="checkbox" value="{{ $level->id }}" name="job_level[]" id="33r"><label for="33r">{{ $job_level->name }} ({{ $total_level }})</label></p>
								@endforeach
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title open">Specialism</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox scrollbar specialism">
				 					@foreach($categories as $cat)
				 						@php 
				 							$category = App\Job_category::where('id', '=', $cat->id)->first();
				 							$total = App\Job::where('jobs.deadline', '>=', date('Y-m-d'))
					                                ->where('is_verified', '=', 1)
					                                ->where('is_paused', '=', 0)
					                                ->where('is_drafted', 0)
					                                ->where('job_category_id', $category->id)
					                                ->count();
					                        $is_special = 0;
				 						@endphp
				 						@if($category->is_special == 0)
											<p><input type="checkbox" value="{{ $category->id }}" name="category[]" id="{{ $category->id }}"><label for="{{ $category->id }}">{{ $category->name }} ({{ $total }})</label></p>
										@else
											@if($is_special == 0)
												@php 
													$is_special = 1;
												@endphp
												<p><strong>Special Category</strong></p>
											@endif
											<p><input type="checkbox" value="{{ $category->id }}" name="category[]" id="{{ $category->id }}"><label for="{{ $category->id }}">{{ $category->name }} ({{ $total }})</label></p>
										@endif
									@endforeach
				 				</div>
				 			</div>
				 		</div>
				 		
				 		<div class="widget">
				 			<h3 class="sb-title closed">Experince</h3>
				 			<div class="specialism_widget">
				 				
								<div class="pf-field">
									<select id="experience" class="chosen">
										<option value="-1">All</option>
										<option value="0">Negotiable</option>
										@foreach($experiences as $job_ex)
											<option value="{{ $job_ex->experience }}">{{ $job_ex->experience }}</option>
										@endforeach
									</select>
								</div>
									
				 				
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">Gender</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
				 					<p><input type="checkbox" value="0" name="gender[]" id="12" checked><label for="12">All</label></p>
									<p><input type="checkbox" value="1" name="gender[]" id="13"><label for="13">Male</label></p>
									<p><input type="checkbox" value="2" name="gender[]" id="14"><label for="14">Female</label></p>
									<p><input type="checkbox" value="3" name="gender[]" id="15"><label for="15">Others</label></p>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">Industry</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
				 					@foreach($industries as $ind)
				 					@php
				 						$industry = App\Industry::where('id', '=', $ind->id)->first();
				 					@endphp
									<p><input type="checkbox" value="{{ $industry->id }}" name="industry[]" id="16"><label for="16">{{ $industry->name }}</label></p>
									@endforeach
				 				</div>
				 			</div>
				 		</div>
				 		<div class="banner_widget">
							<a href="#" title=""><img src="images/ad.png" alt="photo" style="margin-top: 20px;" /></a>
					   </div>
				 	</aside>
				 	<div class="col-lg-8 column">
				 		<div class="modrn-joblist">
					 		<div class="filterbar">
					 			{{-- <span class="emlthis"><a href="mailto:example.com" title=""><i class="la la-envelope-o"></i> Email me Jobs Like These</a></span> --}}
					 			<div class="sortby-sec">
					 				<span>Sort by</span>
					 				<select id="sort_by" data-placeholder="Most Recent" class="chosen">
										<option value="recent">Most Recent</option>
										<option value="asc">A-Z</option>
										<option value="desc">Z-A</option>
									</select>
									<select id="per_page" data-placeholder="10 Per Page" class="chosen">
										<option value="10">10 Per Page</option>
										<option value="20">20 Per Page</option>
										<option value="30">30 Per Page</option>
									</select>
					 			</div>
					 			<h5>{{ $live_jobs }} Jobs & Vacancies</h5>
					 		</div>
						</div><!-- MOdern Job LIst -->
						<div class="job-list-modern">
							<preloader></preloader>
							@if (count($jobs) > 0)
							<div id="load_job" class="job_loads">
			                    @include('users.load')
			                </div>
			                @endif
						</div>
					 </div>
				 </div>
			</div>
		</div>
	</section>
	{{-- https://laraget.com/blog/how-to-create-an-ajax-pagination-using-laravel --}}
@endsection


@push('js')
<script src="/js/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="/js/preloader.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('.select2').select2({
			tags: true,
			tokenSeparators: [',', ' '],
  			allowClear: true
		});
	});
	$('.newtab').click(function() {
        window.open(
            $(this).data('url'),
            '_blank'
        );
    });

	function viewJob(url){
        window.open(
            url.trim(),
            '_blank'
        );
    }

</script>
<script type="text/javascript">
	$(function() {
	    $('body').on('click', '.pagination a', function(e) {
	        e.preventDefault();
	        // $('.job-listings-sec').css({'opacity': .6});
	        // preloader();

	        var url = $(this).attr('href');  
	        getJobs(url);
	        window.history.pushState("", "", url);
	    });

	    function getJobs(url) {
	        $.ajax({
	            url : url  
	        }).done(function (data) {
	            $('.job_loads').html(data);
	            // $('.job-listings-sec').css({'opacity': 1});
	            // host.hide();
	            // setTimeout(function(){host.hide();}, 1000);
	            
	        }).fail(function () {
	            alert('Articles could not be loaded.');
	        });
	    }
	});

</script>
@endpush