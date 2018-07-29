@extends('users.layout.app')

@section('title', 'HRBDJobs | Job List')

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
				 					<form id="keyword">
				 						<input id="keyvalue" type="text" value="{{ $keyword }}" placeholder="Search Keywords" />
				 						<i class="la la-search"></i>
				 					</form>
				 					
				 				</div><!-- Search Widget -->
								<div class="pf-field">
									<select id="city" class="chosen">
										<option {{ $city_search == 0 ? 'selected':'' }} value="0">All</option>
										@foreach($cities as $city)
											@php
												$selected = '';
												if($city->city === $city_search)
												{
													$selected = "Selected";
												}	
											@endphp
											<option value="{{ $city->city }}" {{ $selected }}> {{ $city->city }}</option>
										@endforeach
									</select>
								</div>

				 			</div>
				 		</div>
				 		
				 		<div class="widget">
				 			<h3 class="sb-title {{ sizeof($job_statuses) > 0 ? 'active':'closed' }}">Job Type</h3>
				 			<div class="type_widget">
				 				@foreach($job_statuses as $status)
				 					@php 
			 							$job_status = App\Job_status::where('id', '=', $status->id)->first();
			 							$total_jobs = App\Job::where('jobs.deadline', '>=', date('Y-m-d'))
				                                ->where('is_verified', '=', 1)
				                                ->where('is_paused', '=', 0)
				                                ->where('is_drafted', 0)
				                                ->where('job_status_id', $status->id)
				                                ->count();
			 						@endphp
									<p class="flchek"><input type="checkbox" {{ in_array($job_status->id, $search_job_status) ? 'checked': '' }} class="job_status" value="{{ $status->id }}" name="job_status[]" id="33r"><label for="33r">{{ $job_status->name }} ({{ $total_jobs }})</label></p>
								@endforeach
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title {{ sizeof($categories) > 0 ? 'active':'closed' }}">Specialism</h3>
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
											<p><input type="checkbox" {{ in_array($category->id, $search_cat) ? 'checked': '' }} class="category" value="{{ $category->id }}" name="category[]" id="{{ $category->id }}"><label for="{{ $category->id }}">{{ $category->name }} ({{ $total }})</label></p>
										@else
											@if($is_special == 0)
												@php 
													$is_special = 1;
												@endphp
												<p><strong>Special Category</strong></p>
											@endif
											<p><input type="checkbox" {{ in_array($category->id, $search_cat) ? 'checked': '' }} class="category" value="{{ $category->id }}" name="category[]" id="{{ $category->id }}"><label for="{{ $category->id }}">{{ $category->name }} ({{ $total }})</label></p>
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
										<option {{ ($experience_search && $experience_search == 1000) ? 'selected': '' }} value="1000">All</option>
										<option {{ ($experience_search && $experience_search == 0) ? 'selected': '' }} value="0">Fresher</option>
										@foreach($experiences as $job_ex)
											@if($job_ex->experience != 'Fresher')
											<option {{ ($experience_search && $experience_search == $job_ex->experience) ? 'selected': '' }} value="{{ $job_ex->experience }}">{{ $job_ex->experience }}</option>
											@endif
										@endforeach
									</select>
								</div>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title closed">Gender</h3>
				 			<div class="specialism_widget">
								<div class="pf-field">
									<select id="gender" class="chosen">
										<option {{ ($gender && $gender == 0) ? 'selected': '' }} value="0">All</option>
										<option {{ ($gender && $gender == 1) ? 'selected': '' }} value="1">Male</option>
										<option {{ ($gender && $gender == 2) ? 'selected': '' }} value="2">Female</option>
										<option {{ ($gender && $gender == 3) ? 'selected': '' }} value="3">Others</option>
									</select>
								</div>
				 			</div>
				 		</div>
				 		{{-- <div class="widget">
				 			<h3 class="sb-title closed">Industry</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
				 					@foreach($industries as $ind)
				 					@php
				 						$industry = App\Industry::where('id', '=', $ind->id)->first();
				 					@endphp
									<p><input type="checkbox" value="{{ $industry->id }}" class="industry" name="industry[]" id="16"><label for="16">{{ $industry->name }}</label></p>
									@endforeach
				 				</div>
				 			</div>
				 		</div> --}}
				 		<div class="banner_widget">
							<a href="#" title=""><img src="{{ asset('/images/ad.png') }}" alt="photo" style="margin-top: 20px;" /></a>
					   </div>
				 	</aside>
				 	<div class="col-lg-8 column">
				 		<div class="modrn-joblist">
					 		<div class="filterbar">
					 			{{-- <span class="emlthis"><a href="mailto:example.com" title=""><i class="la la-envelope-o"></i> Email me Jobs Like These</a></span> --}}
					 			<div class="sortby-sec">
					 				<span>Sort by</span>
					 				<select id="sort_by" data-placeholder="Most Recent" class="chosen">
										<option {{ $sorted_by == 'recent' ? 'selected':'' }} value="recent">Most Recent</option>
										<option {{ $sorted_by == 'asc' ? 'selected':'' }} value="asc">A-Z</option>
										<option {{ $sorted_by == 'desc' ? 'selected':'' }} value="desc">Z-A</option>
										<option {{ $sorted_by == 'title-a-z' ? 'selected':'' }} value="title-a-z">Title A-Z</option>
										<option {{ $sorted_by == 'title-z-a' ? 'selected':'' }} value="title-z-a">Title Z-A</option>
									</select>
									<select id="per_page" data-placeholder="10 Per Page" class="chosen">
										<option {{ $per_page == 10 ? 'selected':'' }} value="10">10 Per Page</option>
										<option {{ $per_page == 20 ? 'selected':'' }} value="20">20 Per Page</option>
										<option {{ $per_page == 30 ? 'selected':'' }} value="30">30 Per Page</option>
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
<script>
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
	var base_url = "{{ url('/') }}";
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
	    	console.log("test = " + url);
	    	if(url.indexOf("?") != -1){
	    		var param = url.split('?');
	    		if(param.length == 1){
	    			url = param[0];
	    		}else{
	    			if(param[1][0] == '&'){
		    			param[1][0] = '';
		    		}
		    		
		    		var newParam = '';
		    		for(let i = 0; i< param[1].length; i++){
		    			if(i < param[1].length-1){
		    				if(param[1][i] == '&' && param[1][i+1] == '&'){
			    				continue;
			    			}
		    			}
		    			newParam += param[1][i];
		    		}

		    		url = param[0]+'?'+ newParam;
		    		console.log(url);
	    		}
	    		
	    	}
	        $.ajax({
	            url : url  
	        }).done(function (data) {
	            $('.job_loads').html(data);
	            // $('.job-listings-sec').css({'opacity': 1});
	            // host.hide();
	            // setTimeout(function(){host.hide();}, 1000);
	            
	        }).fail(function () {
	            alert('Jobs could not be loaded.');
	        });
	    }

	    $('#city').on('change', function(e){
		 	var main_url = window.location.href;
			if(main_url.search('page=') != -1){
				var page_no = main_url.split('page=')[1][0];
				main_url = main_url.replace('page='+page_no, '');
			}

			if(main_url.search('city=') != -1){
				var city = main_url.split('city=')[1];
				if(city.search('&') != -1){
					var index = city.indexOf('&');
					var city = city.slice(0, index+1);
				}
				main_url = main_url.replace('city='+city, '');
			}
			
			if(main_url.indexOf("?") == -1){
				main_url = main_url+"?city="+$(this).val();
			}else{
				if(main_url.split("?")[1].length > 0){
					main_url = main_url+"&city="+$(this).val();
				}else{
					main_url = main_url+"city="+$(this).val();
				}
				
			}
			
			getJobs(main_url);
	    	window.history.pushState("", "", main_url);  	
	    });

	    $('.job_status').click(function(e) {
	    	if ($(this).is(':checked')){
	    		var main_url = window.location.href;
	    		if(main_url.search('page=') != -1){
	    			var page_no = main_url.split('page=')[1][0];
	    			main_url = main_url.replace('page='+page_no, '');
	    		}
	    		
	    		if(main_url.indexOf("?") == -1){
	    			main_url = main_url+"?job_status[]="+$(this).val();
	    		}else{
	    			if(main_url.split("?")[1].length > 0){
	    				main_url = main_url+"&job_status[]="+$(this).val();
	    			}else{
	    				main_url = main_url+"job_status[]="+$(this).val();
	    			}
	    			
	    		}
	    		
	    		getJobs(main_url);
	        	window.history.pushState("", "", main_url);
	    	}else{
	    		var main_url = window.location.href;
	    		var param = main_url.split('?');
	    		if(param[1].search('page=') != -1){
	    			var page = param[1].split('page=')[1][0];
		    		var amp = param[1].split('page=')[1][1] == '&' ? '&': '';
		    		param[1] = param[1].replace('page='+page+amp, '');
	    		}
	    		
	    		main_url = param[0]+'?'+param[1];
	    		var main_url_decode = decodeURIComponent(main_url);

	    		var allStatus = (main_url_decode.split('?')[1]).split("&");
	    		var myparam = "";
	    		for(let i = 0; i<allStatus.length; i++){
	    			if(!(allStatus[i].startsWith("job_status") && allStatus[i].endsWith($(this).val()))){
	    				if(i == allStatus.length-1){
	    					myparam += allStatus[i];
	    				}else{
	    					myparam += allStatus[i]+"&";
	    				}
	    				
	    			}
	    		}
	    		main_url_decode = main_url_decode.split('?')[0]+'?'+myparam;
	    		console.log(main_url_decode);
	    		getJobs(main_url_decode);
	        	window.history.pushState("", "", main_url_decode);
	    	}
	    });

	    $('.category').click(function(e) {
	    	if ($(this).is(':checked')){
	    		var main_url = window.location.href;
	    		if(main_url.search('page=') != -1){
	    			var page_no = main_url.split('page=')[1][0];
	    			main_url = main_url.replace('page='+page_no, '');
	    		}
	    		
	    		if(main_url.indexOf("?") == -1){
	    			main_url = main_url+"?cat[]="+$(this).val();
	    		}else{
	    			if(main_url.split("?")[1].length > 0){
	    				main_url = main_url+"&cat[]="+$(this).val();
	    			}else{
	    				main_url = main_url+"cat[]="+$(this).val();
	    			}
	    			
	    		}
	    		
	    		getJobs(main_url);
	        	window.history.pushState("", "", main_url);
	    	}else{
	    		var main_url = window.location.href;
	    		var param = main_url.split('?');
	    		if(param[1].search('page=') != -1){
	    			var page = param[1].split('page=')[1][0];
		    		var amp = param[1].split('page=')[1][1] == '&' ? '&': '';
		    		param[1] = param[1].replace('page='+page+amp, '');
	    		}
	    		
	    		main_url = param[0]+'?'+param[1];
	    		var main_url_decode = decodeURIComponent(main_url);

	    		var allcat = (main_url_decode.split('?')[1]).split("&");
	    		var myparam = "";
	    		for(let i = 0; i<allcat.length; i++){
	    			if(!(allcat[i].startsWith("cat") && allcat[i].endsWith($(this).val()))){
	    				if(i == allcat.length-1){
	    					myparam += allcat[i];
	    				}else{
	    					myparam += allcat[i]+"&";
	    				}
	    				
	    			}
	    		}
	    		main_url_decode = main_url_decode.split('?')[0]+'?'+myparam;
	    		console.log(main_url_decode);
	    		getJobs(main_url_decode);
	        	window.history.pushState("", "", main_url_decode);
	    	}
	    });

	    $('.industry').click(function(e) {
	    	if ($(this).is(':checked')){
	    		var main_url = window.location.href;
	    		if(main_url.search('page=') != -1){
	    			var page_no = main_url.split('page=')[1][0];
	    			main_url = main_url.replace('page='+page_no, '');
	    		}
	    		
	    		if(main_url.indexOf("?") == -1){
	    			main_url = main_url+"?industry[]="+$(this).val();
	    		}else{
	    			if(main_url.split("?")[1].length > 0){
	    				main_url = main_url+"&industry[]="+$(this).val();
	    			}else{
	    				main_url = main_url+"industry[]="+$(this).val();
	    			}
	    			
	    		}
	    		
	    		getJobs(main_url);
	        	window.history.pushState("", "", main_url);
	    	}else{
	    		var main_url = window.location.href;
	    		var param = main_url.split('?');
	    		if(param[1].search('page=') != -1){
	    			var page = param[1].split('page=')[1][0];
		    		var amp = param[1].split('page=')[1][1] == '&' ? '&': '';
		    		param[1] = param[1].replace('page='+page+amp, '');
	    		}
	    		
	    		main_url = param[0]+'?'+param[1];
	    		var main_url_decode = decodeURIComponent(main_url);

	    		var allInd = (main_url_decode.split('?')[1]).split("&");
	    		var myparam = "";
	    		for(let i = 0; i<allInd.length; i++){
	    			if(!(allInd[i].startsWith("industry") && allInd[i].endsWith($(this).val()))){
	    				if(i == allInd.length-1){
	    					myparam += allInd[i];
	    				}else{
	    					myparam += allInd[i]+"&";
	    				}
	    				
	    			}
	    		}
	    		main_url_decode = main_url_decode.split('?')[0]+'?'+myparam;
	    		console.log(main_url_decode);
	    		getJobs(main_url_decode);
	        	window.history.pushState("", "", main_url_decode);
	    	}
	    });

	    $('#gender').on('change', function(e){
	    	var main_url = window.location.href;
			if(main_url.search('page=') != -1){
				var page_no = main_url.split('page=')[1][0];
				main_url = main_url.replace('page='+page_no, '');
			}

			if(main_url.search('gender=') != -1){
				var gender = main_url.split('gender=')[1];
				if(gender.search('&') != -1){
					var index = gender.indexOf('&');
					var gender = gender.slice(0, index+1);
				}
				main_url = main_url.replace('gender='+gender, '');
			}
			
			if(main_url.indexOf("?") == -1){
				main_url = main_url+"?gender="+$(this).val();
			}else{
				if(main_url.split("?")[1].length > 0){
					main_url = main_url+"&gender="+$(this).val();
				}else{
					main_url = main_url+"gender="+$(this).val();
				}
				
			}
			
			getJobs(main_url);
	    	window.history.pushState("", "", main_url);  	
	    });

	  	$('#experience').on('change', function(e){
		 	var main_url = window.location.href;
			if(main_url.search('page=') != -1){
				var page_no = main_url.split('page=')[1][0];
				main_url = main_url.replace('page='+page_no, '');
			}

			if(main_url.search('experience=') != -1){
				var experience = main_url.split('experience=')[1];
				if(experience.search('&') != -1){
					var index = experience.indexOf('&');
					var experience = experience.slice(0, index+1);
				}
				main_url = main_url.replace('experience='+experience, '');
			}
			
			if(main_url.indexOf("?") == -1){
				main_url = main_url+"?experience="+$(this).val();
			}else{
				if(main_url.split("?")[1].length > 0){
					main_url = main_url+"&experience="+$(this).val();
				}else{
					main_url = main_url+"experience="+$(this).val();
				}
				
			}
			
			getJobs(main_url);
	    	window.history.pushState("", "", main_url);  	
	    });

	    $('#keyword').on('submit', function(e){
	    	e.preventDefault();
	    	var search_val = $('#keyvalue').val();
	    	search_val = search_val.replace(' ', '+');
	    	var main_url = window.location.href;
			if(main_url.search('page=') != -1){
				var page_no = main_url.split('page=')[1][0];
				main_url = main_url.replace('page='+page_no, '');
			}

			if(main_url.search('keyword=') != -1){
				var keyword = main_url.split('keyword=')[1];
				console.log("Keyword = "+ keyword);
				if(keyword.search('&') != -1){
					var index = keyword.indexOf('&');
					var keyword = keyword.slice(0, index+1);
					console.log("JKKK = "+city);
				}
				main_url = main_url.replace('keyword='+keyword, '');
			}
			
			if(main_url.indexOf("?") == -1){
				main_url = main_url+"?keyword="+search_val;
			}else{
				if(main_url.split("?")[1].length > 0){
					main_url = main_url+"&keyword="+search_val;
				}else{
					main_url = main_url+"keyword="+search_val;
				}
				
			}
			
			getJobs(main_url);
	    	window.history.pushState("", "", main_url);
	    });

	    $('#sort_by').on('change', function(e){
	    	$.ajax({
				url: base_url+"/session/sorted_by",
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				data: {sort_by: $('#sort_by').val()},
				success: function(message){
					var main_url = window.location.href;
					getJobs(main_url);
				}
			});
	    });

	    $('#per_page').on('change', function(e){
	    	$.ajax({
				url: base_url+"/session/per_page",
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				data: {per_page: $('#per_page').val()},
				success: function(message){
					var main_url = window.location.href;
					getJobs(main_url);
				}
			});
	    });

	});

</script>
@endpush