@extends('candidate.layout.app') 
@section('title', 'HRBDJobs | Candidate Dashboard') 

@push('css')
<link rel="stylesheet" type="text/css" href="/css/preloader.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
		<!-- PARALLAX BACKGROUND IMAGE -->
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
						<div class="profile-title">
							<h3 style="border-bottom: none;">Candidate's Profile</h3>

						</div>
						{{-- profile edit tabs start --}}
						<section class="wrapper">
							<ul class="tabs">
								<li id="basic" class="active">Besic Info</li>
								<li id="education">Education</li>
								<li id="training">Training</li>
								<li id="experience">Experience</li>
								<li id="certificate">Certificate</li>
							</ul>

							<ul class="tab__content">
								<preloader></preloader>
								<li class="active">
									<div class="content__wrapper">
										<div id="basic_view" class="profile-form-edit">
											@include('candidate.profile_partials.basic_info')
										</div>
									</div>
								</li>
								<li>
									<div class="content__wrapper">
										<div id="education_view" class="profile-form-edit">
											
										</div>
									</div>
								</li>
								<li>
									<div class="content__wrapper">
										<div id="training_view" class="profile-form-edit">
											
										</div>
									</div>
								</li>
								<li>
									<div class="content__wrapper">
										<div id="experience_view" class="profile-form-edit">
											
										</div>
									</div>
								</li>
								<li>
									<div class="content__wrapper">
										<div id="certificate_view" class="profile-form-edit">
											
										</div>
									</div>
								</li>
							</ul>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="/js/preloader.js" type="text/javascript"></script>
<script>
	var base_url = "{{ url('/candidate/') }}";
	$(function(){
	    $( ".datepicker" ).datepicker();
	});

	$(document).ready(function() {
		$('.req-skill').select2({
			placeholder: 'Maximum 10 skills',
			maximumSelectionLength: 10,
			tags: true,
			tokenSeparators: [',', ' '],
  			allowClear: true
		});
	});

	function ekUpload(){
		function Init() {

			// console.log("Upload Initialised");

			var fileSelect    = document.getElementById('file-upload'),
			    fileDrag      = document.getElementById('file-drag'),
			    submitButton  = document.getElementById('submit-button');

			fileSelect.addEventListener('change', fileSelectHandler, false);

			// Is XHR2 available?
			var xhr = new XMLHttpRequest();
			if (xhr.upload) {
			  // File Drop
			  fileDrag.addEventListener('dragover', fileDragHover, false);
			  fileDrag.addEventListener('dragleave', fileDragHover, false);
			  fileDrag.addEventListener('drop', fileSelectHandler, false);
			}
		}

		function fileDragHover(e) {
			var fileDrag = document.getElementById('file-drag');

			e.stopPropagation();
			e.preventDefault();

			fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
		}

		function fileSelectHandler(e) {
			// Fetch FileList object
			var files = e.target.files || e.dataTransfer.files;

			// Cancel event and hover styling
			fileDragHover(e);

			// Process all File objects
			for (var i = 0, f; f = files[i]; i++) {
			  parseFile(f);
			  uploadFile(f);
			}
		}

		// Output
		function output(msg) {
			// Response
			var m = document.getElementById('messages');
			m.innerHTML = msg;
		}

	  	function parseFile(file) {

		    console.log(file.name);
		    output(
		      '<strong>' + encodeURI(file.name) + '</strong>'
		    );
		    
		    // var fileType = file.type;
		    // console.log(fileType);
		    var imageName = file.name;

		    var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
		    if (isGood) {
		      document.getElementById('start').classList.add("hidden");
		      document.getElementById('response').classList.remove("hidden");
		      document.getElementById('notimage').classList.add("hidden");
		      // Thumbnail Preview
		      document.getElementById('file-image').classList.remove("hidden");
		      document.getElementById('file-image').src = URL.createObjectURL(file);
		    }
		    else {
		      document.getElementById('file-image').classList.add("hidden");
		      document.getElementById('notimage').classList.remove("hidden");
		      document.getElementById('start').classList.remove("hidden");
		      document.getElementById('response').classList.add("hidden");
		      document.getElementById("file-upload-form").reset();
		    }
	  	}

	  	function setProgressMaxValue(e) {
		    var pBar = document.getElementById('file-progress');

		    if (e.lengthComputable) {
		      pBar.max = e.total;
		    }
	  	}

	  	function updateFileProgress(e) {
		    var pBar = document.getElementById('file-progress');

		    if (e.lengthComputable) {
		      pBar.value = e.loaded;
		    }
	  	}



		// Check for the various File API support.
		if (window.File && window.FileList && window.FileReader) {
			Init();
		} else {
			document.getElementById('file-drag').style.display = 'none';
		}
	}
	ekUpload();

	$(document).ready(function(){
		
		// Variables
		var clickedTab = $(".tabs > .active");
		var tabWrapper = $(".tab__content");
		var activeTab = tabWrapper.find(".active");
		var activeTabHeight = activeTab.outerHeight();
		
		// Show tab on page load
		activeTab.show();
		
		// Set height of wrapper on page load
		tabWrapper.height(activeTabHeight);
	
		$(".tabs > li").on("click", function() {
			
			// Remove class from active tab
			$(".tabs > li").removeClass("active");
			
			// Add class active to clicked tab
			$(this).addClass("active");
			
			// Update clickedTab variable
			clickedTab = $(".tabs .active");
			
			// fade out active tab
			activeTab.fadeOut(250, function() {
				
				// Remove active class all tabs
				$(".tab__content > li").removeClass("active");
				
				// Get index of clicked tab
				var clickedTabIndex = clickedTab.index();

				// Add class active to corresponding tab
				$(".tab__content > li").eq(clickedTabIndex).addClass("active");
				
				// update new active tab
				activeTab = $(".tab__content > .active");
				
				// Update variable
				activeTabHeight = activeTab.outerHeight();
				
				// Animate height of wrapper to new tab height
				tabWrapper.stop().delay(50).animate({
					height: activeTabHeight
				}, 500, function() {
					
					// Fade in active tab
					activeTab.delay(50).fadeIn(250);
					
				});
			});
		});

		$('#basic').click(function(event) {
			preloader();
			$.ajax({
				url: base_url+"/profile/basic/info",
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				success: function(basic_info){
					$('#basic_view').html(basic_info);
					$(".chosen").chosen();
					$( ".datepicker" ).datepicker();
					$('.req-skill').select2({
						placeholder: 'Maximum 10 skills',
						maximumSelectionLength: 10,
						tags: true,
						tokenSeparators: [',', ' '],
			  			allowClear: true
					});
					setTimeout(function(){host.hide();}, 1000);
				}
			});
		});

		$('#education').click(function(event) {
			preloader();
			$.ajax({
				url: base_url+"/profile/education",
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				success: function(education){
					$('#education_view').html(education);
					setTimeout(function(){host.hide();}, 1000);
				}
			});
		});

		$('#training').click(function(event) {
			preloader();
			$.ajax({
				url: base_url+"/profile/training",
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				success: function(education){
					$('#training_view').html(education);
					$(".chosen").chosen();

					setTimeout(function(){host.hide();}, 1000);
				}
			});
		});

		$('#experience').click(function(event) {
			preloader();
			$.ajax({
				url: base_url+"/profile/experience",
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				success: function(education){
					$('#experience_view').html(education);
					$(".chosen").chosen();
					$( ".datepicker" ).datepicker();
					setTimeout(function(){host.hide();}, 1000);
				}
			});
		});

		$('#certificate').click(function(event) {
			preloader();
			$.ajax({
				url: base_url+"/profile/certificate",
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
				success: function(education){
					$('#certificate_view').html(education);
					$( ".datepicker" ).datepicker();
					setTimeout(function(){host.hide();}, 1000);
				}
			});
		});
			
			
	});

	function makeBox(name){
		$('#make_clone_box_'+name).append($('#make_clone_'+name).html());
		$(".hasDatepicker").removeClass("hasDatepicker");
		$(".datepicker").datepicker("destroy");
		$(".datepicker").datepicker();
	}

</script>


@endpush
