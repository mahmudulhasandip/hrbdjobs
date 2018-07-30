@extends('employer.layout.app')

@section('title', 'HRBDJobs | Post New Job')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('css/smartwizard4/smart_wizard.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/smartwizard4/smart_wizard_theme_arrows.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/select2-bootstrap4-theme.css') }}" rel="stylesheet" type="text/css" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
 --}}
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 @endpush

@section('content')
<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url({{ asset('/images/top-bg.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Welcome {{ Auth::guard('employer')->user()->fname.' '. Auth::guard('employer')->user()->lname}}</h3>
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
							 <form method="POST" role="form" id="newjob" data-toggle="validator" action="{{ route('employer.new.post.job') }}" class="needs-validation" novalidate>
								 @csrf
								<div id="smartwizard">
									<ul>
										<li><a href="#step-1">Besic </a></li>
										<li><a href="#step-2">Salary </a></li>
										<li><a href="#step-3">Educational </a></li>
										<li><a href="#step-4">Experience</a></li>
										<li><a href="#step-5">Personal </a></li>
									</ul>

									<div>


										{{-- besic info --}}
										<div id="step-1" class="" role="form" data-toggle="validator">

											<div id="form-step-1" >
											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Title:</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
													<div class="invalid-feedback">
														Please provide a valid Title.
													</div>
												</div>
											</div>
											</div>

											<div class="form-group row">
												<div class="input-group mb-3">
													<label for="title" class="col-sm-2 col-form-label">Vacancy:</label>

													<div class="input-group-prepend">
														<div class="input-group-text">
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="vacancy">
																<label class="custom-control-label" for="vacancy">N/A</label>
															</div>
														</div>
													</div>
													<input type="number" class="form-control" placeholder="">
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label"></label>
												<div class="custom-control custom-checkbox" style="margin-left: 15px;">
													<input type="checkbox" class="custom-control-input" id="specialjob">
													<label class="custom-control-label" for="specialjob">Special Job</label>
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Job Category:</label>
												<div class="col-sm-10">
													<select class="js-example-basic-single" name="state">
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Job Designation:</label>
												<div class="col-sm-10">
													<select class="js-example-basic-single" name="state">
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Job status:</label>
												<div class="col-sm-10">
													<select class="js-example-basic-single" name="state">
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Job Level:</label>
												<div class="col-sm-10">
													<select class="js-example-basic-single" name="state">
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Deadline:</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="datepicker" autocomplete="off" placeholder="Deadline" name="title">
													<div class="invalid-feedback">
														Please provide a valid date.
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Qualification:</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" placeholder="Qualification" name="title">
													<div class="invalid-feedback">
														Please provide a valid qualification.
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Description:</label>
												<div class="col-sm-10">
													<textarea class="form-control" placeholder="Description" rows="3" name="title"></textarea>
													<div class="invalid-feedback">
														Please provide a valid description.
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Location Type:</label>
												<div class="col-sm-10">
													<select class="form-control" id="loc_type">
														<option>Select</option>
														<option value="0">Inside Bangladesh</option>
														<option value="1">Outside Bangladesh</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="location" class="col-sm-2 col-form-label">Location:</label>
												<div class="col-sm-10">
													<textarea class="form-control" id="loc" placeholder="Location" name="title"></textarea>
													<small class="form-text text-muted">Insert job location</small>
													<div class="invalid-feedback">
														Incorrect
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label for="photo" class="col-sm-2 col-form-label"></label>
												<div class="custom-control custom-checkbox" style="margin-left: 15px;">
													<input type="checkbox" class="custom-control-input" id="photo">
													<label class="custom-control-label" for="photo">Photograph Enclosed</label>
												</div>
											</div>

											<div class="form-group row">
												<label for="title" class="col-sm-2 col-form-label">Other Benefit:</label>
												<div class="col-sm-10">
													<select class="js-example-basic-single" multiple="multiple" name="state" >
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
											</div>



										</div>



										{{-- salary Info --}}
										<div id="step-2" class="">

											<div class="form-group row">
												<label for="salary_min" class="col-sm-2 col-form-label">Min Salay:</label>
												<div class="col-sm-10">
													<input  type=number step=any class="form-control" placeholder="Min. Salary" name="salary_min">
													<div class="invalid-feedback">
														Please provide a valid qualification.
													</div>
												</div>
											</div>

										</div>


										{{-- Educational Info --}}
										<div id="step-3" class="">
											Step Content
										</div>


										{{-- Experience Info --}}
										<div id="step-4" class="">
											Step Content
										</div>


										{{-- Personal Info --}}
										<div id="step-5" class="">
											Step Content
										</div>

									</div>
								</div>
							</form>
					 		<div class="profile-form-edit">
								 <form method="POST" action="{{ route('employer.new.post.job') }}">
									@csrf
								 	<input type="hidden" name="job_id" value="{{ ($draft) ? $draft->id : '' }}">
					 				<div class="row">
										{{-- Job Title --}}
					 					<div class="col-lg-12">
					 						<span class="pf-title">Job Title</span>
					 						<div class="pf-field">
												<input type="text" placeholder="Title" name="title" value="@if (old("title")){{ old('title') }}@elseif ( $draft ){{ $draft->title }}@endif"/>
												@if ($errors->has('title'))
													<span class="help-block">
														{{ $errors->first('title') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- is_special job --}}
										<div class="col-sm-3">
											<div class="pf-field">
												<div class="simple-checkbox">
													<p><input type="checkbox" name="is_special" id="special_job"  value="@if (old("is_special")){{ old('is_special') }}@elseif ( $draft ){{ $draft->is_special }}@endif" @if (old("is_special")){{ 'checked' }}@elseif ( $draft['is_special'] ){{ 'checked' }} @endif><label for="special_job"><strong>Special Job</strong></label></p>
													@if ($errors->has('is_special'))
														<span class="help-block">
															{{ $errors->first('is_special') }}
														</span>
													@endif
												</div>
											</div>
										</div>

										{{-- description --}}
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
												<textarea id="tinymce" name="description" >@if (old("description")){{ old('description') }}@elseif ( $draft ){{ $draft->description }}@endif</textarea>
												@if ($errors->has('description'))
													<span class="help-block">
														{{ $errors->first('description') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- job categories --}}
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Categories</span>
					 						<div class="pf-field">
					 							<select id="job_category_id" data-placeholder="Please Select Specialism" class="chosen" name="job_category_id" >
													<option value="">Job Category</option>
													@foreach($job_categories as $job_category)
													<option value="{{ $job_category->id }}" @if(old('job_category_id')){{ old('job_category_id') == $job_category->id ? 'selected' : '' }}@elseif( $draft && $draft->job_category_id == $job_category->id ){{ 'selected' }}@endif >{{ $job_category->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('job_category_id'))
													<span class="help-block">
														{{ $errors->first('job_category_id') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- job designation --}}
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Designation</span>
					 						<div class="pf-field">
					 							<select id="job_designation_id" data-placeholder="Please Select Specialism" class="chosen" name="job_designation_id">
													<option value="">Job Designation</option>
													@foreach($job_designations as $job_designation)
													<option value="{{ $job_designation->id }}"  @if(old('job_designation_id')){{ old('job_designation_id') == $job_category->id ? 'selected' : '' }}@elseif( $draft &&  $draft->job_designation_id == $job_designation->id ){{ 'selected' }}@endif>{{ $job_designation->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('job_designation_id'))
													<span class="help-block">
														{{ $errors->first('job_designation_id') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- job level --}}
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Level</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="job_level_id">
													<option value="">Job Level</option>
													@foreach($job_levels as $job_level)
													<option value="{{ $job_level->id }}" @if(old('job_level_id')){{ old('job_level_id') == $job_level->id ? 'selected' : '' }}@elseif( $draft &&  $draft->job_level_id == $job_level->id ){{ 'selected' }}@endif>{{ $job_level->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('job_level_id'))
													<span class="help-block">
														{{ $errors->first('job_level_id') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- experience --}}
					 					<div class="col-lg-6">
					 						<span class="pf-title">Experience</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="experience">
													<option value="">Experience</option>
													@foreach($job_experiences as $job_experience)
													<option value="{{ $job_experience->name }}" @if(old('experience')){{ old('experience') == $job_experience->name ? 'selected' : '' }}@elseif( $draft &&  $draft->experience == $job_experience->name ){{ 'selected' }}@endif>{{ $job_experience->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('experience'))
													<span class="help-block">
														{{ $errors->first('experience') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- minimum salary --}}
					 					<div class="col-lg-3">
											<span class="pf-title">Min Salary</span>
											<div class="pf-field">
												<input type="number" placeholder="Min. Salary" name="salary_min" class="salary" value="@if (old("salary_min")){{ old('salary_min') }}@elseif ( $draft ){{ $draft->salary_min }}@endif"/>
												@if ($errors->has('salary_min'))
													<span class="help-block">
														{{ $errors->first('salary_min') }}
													</span>
												@endif
											</div>
										</div>

										{{-- maximum salary --}}
										<div class="col-lg-3">
											<span class="pf-title">Max Salary</span>
											<div class="pf-field">
												<input type="number" placeholder="Max. Salary" name="salary_max" class="salary" value="@if (old("salary_max")){{ old('salary_max') }}@elseif ( $draft ){{ $draft->salary_max }}@endif"/>
												@if ($errors->has('salary_max'))
													<span class="help-block">
														{{ $errors->first('salary_max') }}
													</span>
												@endif
											</div>
										</div>

										{{-- is_negotiable --}}
										<div class="col-sm-3">
											<span class="pf-title"></span>
											<div class="pf-field">
												<div class="simple-checkbox">
													<p><input type="checkbox" name="is_negotiable" id="negotiable"  value="@if (old("is_negotiable")){{ old('is_negotiable') }}@elseif ( $draft ){{ $draft['is_negotiable'] }}@endif" @if (old("is_negotiable")){{ 'checked' }}@elseif ( $draft['is_negotiable'] ){{ 'checked' }} @endif><label for="negotiable">Negotiable</label></p>
													@if ($errors->has('is_negotiable'))
														<span class="help-block">
															{{ $errors->first('is_negotiable') }}
														</span>
													@endif
												</div>
											</div>
										</div>

										{{-- vacancy --}}
										<div class="col-lg-3">
											<span class="pf-title">Vacancy</span>
											<div class="pf-field">
												<input type="number" placeholder="Vacancy" name="vacancy"  value="@if (old("vacancy")){{ old('vacancy') }}@elseif ( $draft ){{ $draft->vacancy }}@endif"/>
												@if ($errors->has('vacancy'))
													<span class="help-block">
														{{ $errors->first('vacancy') }}
													</span>
												@endif
											</div>
										</div>

										{{-- gender --}}
					 					<div class="col-lg-3">
					 						<span class="pf-title">Gender</span>
					 						<div class="pf-field">
					 							<select  class="chosen" name="gender">
													<option value="0" @if(old('gender')){{ old('gender') == 0 ? 'selected' : '' }}@elseif( $draft &&  $draft->gender == 0 ){{ 'selected' }}@endif>All</option>
													<option value="1" @if(old('gender')){{ old('gender') == 1 ? 'selected' : '' }}@elseif( $draft &&  $draft->gender == 1 ){{ 'selected' }}@endif>Male</option>
													<option value="2" @if(old('gender')){{ old('gender') == 2 ? 'selected' : '' }}@elseif( $draft &&  $draft->gender == 2 ){{ 'selected' }}@endif>Female</option>
													<option value="3" @if(old('gender')){{ old('gender') == 3 ? 'selected' : '' }}@elseif( $draft &&  $draft->gender == 3 ){{ 'selected' }}@endif>Others</option>
												</select>
												@if ($errors->has('gender'))
													<span class="help-block">
														{{ $errors->first('gender') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- Qualification --}}
					 					<div class="col-lg-6">
					 						<span class="pf-title">Qualification</span>
					 						<div class="pf-field">
												<input type="text" placeholder="Qualification" name="qualification" value="@if (old("qualification")){{ old('qualification') }}@elseif ( $draft ){{ $draft->qualification }}@endif"/>
												@if ($errors->has('qualification'))
													<span class="help-block">
														{{ $errors->first('qualification') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- deadline --}}
					 					<div class="col-lg-3">
					 						<span class="pf-title">Application Deadline Date</span>
					 						<div class="pf-field" >
												<input type="text" id="datepicker" class="form-control"  placeholder="2018-05-17" name="deadline"  value="@if (old("deadline")){{ old('deadline') }}@elseif ( $draft ){{ $draft->deadline }}@endif"/>
												@if ($errors->has('deadline'))
													<span class="help-block">
														{{ $errors->first('deadline') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- Skills --}}
					 					<div class="col-lg-12">
					 						<span class="pf-title">Skill Requirments</span>
					 						<div class="pf-field">
												@php


													$draftSkills = array();
													if($draft){
														foreach ($draft->jobSkill as $draftSkill) {
															$draftSkills[] = $draftSkill->skill;
														}
													}


												@endphp
												<select multiple="multiple" class="req-skill"  name="skill[]">
													<option value="">Skill Requirments</option>
													@foreach($skills as $skill)
													<option value="{{ $skill->id }}"  @if(old("skill") && (in_array($skill->id, old("skill")))){{ "selected" }}@elseif( $draft && in_array($skill->id, $draftSkills )){{ 'selected' }}@endif>{{ $skill->name }}</option>
													@endforeach
												</select>

												@if ($errors->has('skill'))
													<span class="help-block">
														{{ $errors->first('skill') }}
													</span>
												@endif
											</div>
										 </div>

										 {{-- location --}}
					 					<div class="col-lg-12">
					 						<span class="pf-title">Location</span>
					 						<div class="pf-field">
												<textarea name="location">@if (old("location")){{ old('location') }}@elseif ( $draft ){{ $draft->location }}@endif</textarea>
												@if ($errors->has('location'))
													<span class="help-block">
														{{ $errors->first('location') }}
													</span>
												@endif
					 						</div>
										 </div>

										 {{-- buttons --}}
										 <div class="col-lg-12">
											<button type="submit" name="draft" value="draft" class="draft">Draft</button>
											<button type="submit" name="post" value="post">Post</button>
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('js/smartwizard4/jquery.smartWizard.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

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
	$(document).ready(function(){

		if($('input[type="checkbox"][name="is_negotiable"]').val() == 1 ){
			$('.salary').attr('disabled', true);
			$('#negotiable').val(1);
			$('#negotiable').attr('checked', true);
		}else{
			$('.salary').attr('disabled', false);
			$('#negotiable').val(0);
			$('#negotiable').attr('checked', false);
		}

		$('input[type="checkbox"][name="is_negotiable"]').on('click', function() {
			if(this.checked) {
				$('.salary').attr('disabled', true);
				$('#negotiable').attr('checked', true);
				$('#negotiable').val(1);

			}else{
				$('.salary').attr('disabled', false);
				$('#negotiable').attr('checked', false);
				$('#negotiable').val(0);
			}
		});



		var base_url = "{{ url('/employer/') }}";
		$('input[type="checkbox"][name="is_special"]').on('click', function() {
			var draft = "{{ $draft }}";
			if(draft){
				var job_id = '{{ $draft["id"] }}';
			}
			var job_id = '{{ $draft["id"] }}';

			if(this.checked) {
				$('#special_job').attr('checked', true);
				$('#special_job').val(1);

				var is_special = 1;
				$.ajax({
					url: base_url+'/get/job_cetegories',
					type: 'post',
					headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
					data: {is_special: is_special, id: job_id},
					success: function(data){
						$('#job_category_id').html(data);
						$('.chosen').trigger("chosen:updated");
					}
				});

				$.ajax({
					url: base_url+'/get/job_designations',
					type: 'post',
					headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
					data: {is_special: is_special, id: job_id},
					success: function(data){
						$('#job_designation_id').html(data);
						$('.chosen').trigger("chosen:updated");
					}
				});
			}else{

				$('#special_job').attr('checked', false);
				$('#special_job').val(0);

				var is_special = 0;
				$.ajax({
					url: base_url+'/get/job_cetegories',
					type: 'post',
					headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
					data: {is_special: is_special, id: job_id},
					success: function(data){
						$('#job_category_id').html(data);
						$('.chosen').trigger("chosen:updated");
					}
				});
				$.ajax({
					url: base_url+'/get/job_designations',
					type: 'post',
					headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
					data: {is_special: is_special, id: job_id},
					success: function(data){
						$('#job_designation_id').html(data);
						$('.chosen').trigger("chosen:updated");
					}
				});
			}
		});
	})

 </script>





{{-- custom --}}
 <script>

$(document).ready(function(){
	$('#loc_type').on('change', function(){
		if($('#loc_type').val() == '0'){
			$('#loc').val('Anywhere in Bangladesh');
		}
		if($('#loc_type').val() == '1'){
			$('#loc').val('');
		}
	});
});
 </script>





 <script>
	 // $("#datepicker input").datepicker({
		// format: 'yyyy-mm-dd',
	 // });
	$(function(){
	    $( "#datepicker" ).datepicker();
	});
 </script>





<script type="text/javascript">
$(document).ready(function(){
	$('.js-example-basic-single').select2({
		theme: 'bootstrap4',
	});
	$('#smartwizard').smartWizard({
		theme: 'arrows',
		transitionEffect: 'fade', // Effect on navigation, none/slide/fade
		transitionSpeed: '400'
	});
});

$("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
	var elmForm = $("#step-" + stepNumber);
	// stepDirection === 'forward' :- this condition allows to do the form validation
	// only on forward navigation, that makes easy navigation on backwards still do the validation when going next
	if(stepDirection === 'forward' && elmForm){
		elmForm.validator('validate');
		var elmErr = elmForm.children('.has-error');
		if(elmErr && elmErr.length > 0){
			// Form validation failed
			return false;
		}
	}
	return true;
});
</script>





<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

@endpush