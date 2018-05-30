@extends('employer.layout.app')

@section('title', 'HRBDJobs | Post New Job')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
@endpush

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
					 		<div class="profile-title">
					 			<h3>Post a New Job</h3>
					 		</div>
					 		<div class="profile-form-edit">
								 <form method="POST" action="{{ route('employer.new.post.job') }}">
									@csrf
					 				<div class="row">
					 					<div class="col-lg-12">
					 						<span class="pf-title">Job Title</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Title" name="title"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea id="tinymce" name="description" ></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Categories</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="job_category_id">
													<option >Job Category</option>
													@foreach($job_categories as $job_category)
													<option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
													@endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Designation</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="job_designation_id">
													<option>Job Designation</option>
													@foreach($job_designations as $job_designation)
													<option value="{{ $job_designation->id }}">{{ $job_designation->name }}</option>
													@endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Level</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="job_level_id">
													<option>Job Level</option>
													@foreach($job_levels as $job_level)
													<option value="{{ $job_level->id }}">{{ $job_level->name }}</option>
													@endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Experience</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="experience_id">
													<option>Experience</option>
													@foreach($job_experiences as $job_experience)
													<option value="{{ $job_experience->id }}">{{ $job_experience->name }}</option>
													@endforeach
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
											<span class="pf-title">Min Salary</span>
											<div class="pf-field">
												<input type="number" placeholder="Min. Salary" name="salary_min" class="salary"/>
											</div>
										</div>
										<div class="col-lg-3">
											<span class="pf-title">Max Salary</span>
											<div class="pf-field">
												<input type="number" placeholder="Max. Salary" name="salary_max" class="salary"/>
											</div>
										</div>

										<div class="col-sm-6">
											<span class="pf-title"></span>
											<div class="pf-field">
												<div class="simple-checkbox">
													<p><input type="checkbox" name="is_negotiable" id="negotiable" value="1"><label for="negotiable">Negotiable</label></p>
												</div>
											</div>
										</div>

					 					<div class="col-lg-3">
					 						<span class="pf-title">Gender</span>
					 						<div class="pf-field">
					 							<select  class="chosen" name="gender">
													<option value="0">All</option>
													<option value="1">Male</option>
													<option value="2">Female</option>
													<option value="3">Others</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Qualification</span>
					 						<div class="pf-field">
												<input type="text" placeholder="Qualification" name="qualification"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Application Deadline Date</span>
					 						<div class="pf-field" id="datepicker">
					 							<input type="text" class="form-control"  placeholder="2018-05-17" name="deadline" />
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Skill Requirments</span>
					 						<div class="pf-field">
												<select multiple="multiple" class=" req-skill"  name="skill[]">
													<option>Skill Requirments</option>
													@foreach($skills as $skill)
													<option value="{{ $skill->id }}">{{ $skill->name }}</option>
													@endforeach
												</select>
											</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Location</span>
					 						<div class="pf-field">
					 							<textarea name="location"></textarea>
					 						</div>
					 					</div>
										 <div class="col-lg-12">
											<button type="submit">Post</button>
										</div>
					 				</div>
					 			</form>
					 		</div>
					 		
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

<script>
	$(document).ready(function() {
		$('.req-skill').select2({
			placeholder: 'Maximum 5 skills',
			maximumSelectionLength: 5,
			tags: true,
			tokenSeparators: [',', ' '],
  			allowClear: true
		});
	});
</script>


<script>

	tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
		branding: false,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = "{{ asset('js/tinymce/') }}";

 </script>

 <script>
	$('input[type="checkbox"][name="is_negotiable"]').on('click', function() {
		if(this.checked) {
			$('.salary').attr('disabled', true);
			$('#negotiable').attr('checked', true);

		}else{
			$('.salary').attr('disabled', false);
			$('#negotiable').attr('checked', false);
		}
	});
 </script>

 <script>
	 $("#datepicker input").datepicker({
		format: 'yyyy-mm-dd',
	 });
 </script>

@endpush