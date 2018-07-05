@extends('employer.layout.app')

@section('title', 'HRBDJobs | Edit Job')

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
					 		<div class="profile-form-edit">
								 <form method="POST" action="{{ route('employer.new.post.job') }}">
									@csrf
								 	<input type="hidden" name="job_id" value="{{ $editJob->id }}">
					 				<div class="row">
					 					<div class="col-lg-12">
					 						<span class="pf-title">Job Title</span>
					 						<div class="pf-field">
                                                <input type="text" placeholder="Title" name="title" value="{{ $editJob->title }}" readonly/>
												@if ($errors->has('title'))
													<span class="help-block">
														{{ $errors->first('title') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
												<textarea id="tinymce" name="description" >{{ $editJob->description }}</textarea>
												@if ($errors->has('description'))
													<span class="help-block">
														{{ $errors->first('description') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Categories</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="job_category_id" >
													<option value="">Job Category</option>
													@foreach($job_categories as $job_category)
													<option value="{{ $job_category->id }}" {{ ($editJob->job_category_id == $job_category->id) ? 'selected' : '' }}>{{ $job_category->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('job_category_id'))
													<span class="help-block">
														{{ $errors->first('job_category_id') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Designation</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="job_designation_id">
													<option value="">Job Designation</option>
													@foreach($job_designations as $job_designation)
													<option value="{{ $job_designation->id }}"  {{ ($editJob->job_designation_id == $job_designation->id) ? 'selected' : '' }}>{{ $job_designation->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('job_designation_id'))
													<span class="help-block">
														{{ $errors->first('job_designation_id') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Level</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="job_level_id">
													<option value="">Job Level</option>
													@foreach($job_levels as $job_level)
													<option value="{{ $job_level->id }}" {{ ($editJob->job_level_id == $job_level->id) ? 'selected' : '' }}>{{ $job_level->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('job_level_id'))
													<span class="help-block">
														{{ $errors->first('job_level_id') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Experience</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen" name="experience">
													<option value="">Experience</option>
													@foreach($job_experiences as $job_experience)
													<option value="{{ $job_experience->name }}" {{ ($editJob->experience == $job_experience->name) ? 'selected' : '' }}>{{ $job_experience->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('experience'))
													<span class="help-block">
														{{ $errors->first('experience') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
											<span class="pf-title">Min Salary</span>
											<div class="pf-field">
												<input type="number" placeholder="Min. Salary" name="salary_min" class="salary" value="{{ $editJob->salary_min }}"/>
												@if ($errors->has('salary_min'))
													<span class="help-block">
														{{ $errors->first('salary_min') }}
													</span> 
												@endif
											</div>
										</div>
										<div class="col-lg-3">
											<span class="pf-title">Max Salary</span>
											<div class="pf-field">
												<input type="number" placeholder="Max. Salary" name="salary_max" class="salary" value="{{ $editJob->salary_max }}"/>
												@if ($errors->has('salary_max'))
													<span class="help-block">
														{{ $errors->first('salary_max') }}
													</span> 
												@endif
											</div>
										</div>

										<div class="col-sm-3">
											<span class="pf-title"></span>
											<div class="pf-field">
												<div class="simple-checkbox">
													<p><input type="checkbox" name="is_negotiable" id="negotiable"  value="@if  ( $editJob ){{ $editJob->is_negotiable }}@else {{ '1' }} @endif"><label for="negotiable">Negotiable</label></p>
													@if ($errors->has('is_negotiable'))
														<span class="help-block">
															{{ $errors->first('is_negotiable') }}
														</span> 
													@endif
												</div>
											</div>
										</div>

										<div class="col-lg-3">
											<span class="pf-title">Vacancy</span>
											<div class="pf-field">
												<input type="number" placeholder="Vacancy" name="vacancy"  value="{{ $editJob->vacancy }}"/>
												@if ($errors->has('vacancy'))
													<span class="help-block">
														{{ $errors->first('vacancy') }}
													</span> 
												@endif
											</div>
										</div>

					 					<div class="col-lg-3">
					 						<span class="pf-title">Gender</span>
					 						<div class="pf-field">
					 							<select  class="chosen" name="gender">
													<option value="0" @if( $editJob &&  $editJob->gender == 0 ){{ 'selected' }}@endif>All</option>
													<option value="1" @if( $editJob &&  $editJob->gender == 1 ){{ 'selected' }}@endif>Male</option>
													<option value="2" @if( $editJob &&  $editJob->gender == 2 ){{ 'selected' }}@endif>Female</option>
													<option value="3" @if( $editJob &&  $editJob->gender == 3 ){{ 'selected' }}@endif>Others</option>
												</select>
												@if ($errors->has('gender'))
													<span class="help-block">
														{{ $errors->first('gender') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Qualification</span>
					 						<div class="pf-field">
												<input type="text" placeholder="Qualification" name="qualification" value="{{ $editJob->qualification }}"/>
												@if ($errors->has('qualification'))
													<span class="help-block">
														{{ $errors->first('qualification') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Application Deadline Date</span>
					 						<div class="pf-field" id="datepicker">
												<input type="text" class="form-control"  placeholder="2018-05-17" name="deadline"  value="{{ $editJob->deadline }}"/>
												@if ($errors->has('deadline'))
													<span class="help-block">
														{{ $errors->first('deadline') }}
													</span> 
												@endif
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Skill Requirments</span>
					 						<div class="pf-field">
												@php 


													$draftSkills = array();
													if($editJob){
														foreach ($editJob->jobSkill as $draftSkill) {
															$draftSkills[] = $draftSkill->skill;
														}
													}
													
													
												@endphp
												<select multiple="multiple" class="req-skill"  name="skill[]">
													<option value="">Skill Requirments</option>
													@foreach($skills as $skill)
													<option value="{{ $skill->id }}"  @if(old("skill") && (in_array($skill->id, old("skill")))){{ "selected" }}@elseif( $editJob && in_array($skill->id, $draftSkills )){{ 'selected' }}@endif>{{ $skill->name }}</option>
													@endforeach
												</select>
												
												@if ($errors->has('skill'))
													<span class="help-block">
														{{ $errors->first('skill') }}
													</span> 
												@endif
											</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Location</span>
					 						<div class="pf-field">
												<textarea name="location">@if (old("location")){{ old('location') }}@elseif ( $editJob ){{ $editJob->location }}@endif</textarea>
												@if ($errors->has('location'))
													<span class="help-block">
														{{ $errors->first('location') }}
													</span> 
												@endif
					 						</div>
					 					</div>
										 <div class="col-lg-12">
											{{-- <button type="submit" name="draft" value="draft" class="draft">Draft</button> --}}
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