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
							 <div class="profile-form-edit">
							 <form method="POST" role="form" id="newjob" data-toggle="validator" action="{{ route('employer.new.post.job') }}" class="needs-validation" novalidate>
								 @csrf
								 <input type="hidden" name="job_id" value="{{ ($draft) ? $draft->id : '' }}">
								<div id="smartwizard">
									<ul>
										<li><a href="#step-1">Basic </a></li>
										<li><a href="#step-2">Salary </a></li>
										<li><a href="#step-3">Educational </a></li>
										<li><a href="#step-4">Experience</a></li>
										<li><a href="#step-5">Personal </a></li>
									</ul>

									<div>


										{{-- besic info --}}
										<div id="step-1" class="" >

											{{-- title --}}
											<div id="form-step-0" data-toggle="validator">
												<div class="form-group row">
													<label for="title" class="col-sm-2 col-form-label">Title:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="@if (old("title")){{ old('title') }}@elseif ( $draft ){{ $draft->title }}@endif" required>
														<div class="help-block with-errors"></div>
														<div class="vaild-feedback"></div>
														<div class="invalid-feedback">
															Please provide a valid Title.
														</div>
													</div>
												</div>


												{{-- vacancy --}}
												<div class="form-group row">
													<div class="input-group mb-3">
														<label for="vacancy_input" class="col-sm-2 col-form-label">Vacancy:</label>

														<div class="input-group-prepend">
															<div class="input-group-text">
																<div class="custom-control custom-checkbox vacancy">
																	<input type="checkbox" class="custom-control-input" id="vacancy" value="1" >
																	<div class="invalid-feedback"></div>
																	<label class="custom-control-label pt2 " for="vacancy">N/A</label>
																</div>
															</div>
														</div>
														<input type="number" class="form-control" placeholder="" name="vacancy" id="vacancy_input" value="@if (old("vacancy")){{ old('vacancy') }}@elseif ( $draft ){{ $draft->vacancy }}@endif" required>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- special job --}}
												<div class="form-group row">
													<label for="" class="col-sm-2 col-form-label"></label>
													<div class="custom-control custom-checkbox" style="margin-left: 15px;">
														<input type="checkbox" class="custom-control-input" name="is_special" id="special_job"  value="@if (old("is_special")){{ old('is_special') }}@elseif ( $draft ){{ $draft->is_special }}@endif" @if (old("is_special")){{ 'checked' }}@elseif ( $draft['is_special']==1 ){{ 'checked' }} @endif>
														<label class="custom-control-label" for="special_job">Special Job</label>

														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- job category --}}
												<div class="form-group row">
													<label for="" class="col-sm-2 col-form-label">Job Category:</label>
													<div class="col-sm-10">
														<select data-validate="true" class="js-example-basic-single" id="job_category_id" name="job_category_id" required>
															<option value="">Select</option>
															@foreach($job_categories as $job_category)
															<option value="{{ $job_category->id }}" @if(old('job_category_id')){{ old('job_category_id') == $job_category->id ? 'selected' : '' }}@elseif( $draft && $draft->job_category_id == $job_category->id ){{ 'selected' }}@endif >{{ $job_category->name }}</option>
															@endforeach
														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- job designation --}}
												<div class="form-group row">
													<label for="" class="col-sm-2 col-form-label">Job Designation:</label>
													<div class="col-sm-10">
														<select class="js-example-basic-single" id="job_designation_id" name="job_designation_id" required>
															<option value="">Select</option>
															@foreach($job_designations as $job_designation)
															<option value="{{ $job_designation->id }}"  @if(old('job_designation_id')){{ old('job_designation_id') == $job_category->id ? 'selected' : '' }}@elseif( $draft &&  $draft->job_designation_id == $job_designation->id ){{ 'selected' }}@endif>{{ $job_designation->name }}</option>
															@endforeach
														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- job status --}}
												<div class="form-group row">
													<label for="" class="col-sm-2 col-form-label">Job status:</label>
													<div class="col-sm-10">
														<select class="js-example-basic-single" name="job_status_id" required>
															<option value="">Select</option>
															@foreach($job_statuses as $job_status)
															<option value="{{ $job_status->id }}" @if(old('job_status_id')){{ old('job_status_id') == $job_status->id ? 'selected' : '' }}@elseif( $draft &&  $draft->job_status_id == $job_status->id ){{ 'selected' }}@endif>{{ $job_status->name }}</option>
															@endforeach
														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- job level --}}
												<div class="form-group row">
													<label for="" class="col-sm-2 col-form-label">Job Level:</label>
													<div class="col-sm-10">
														<select class="js-example-basic-single" name="job_level_id" required>
															<option value="">Select</option>
															@foreach($job_levels as $job_level)
															<option value="{{ $job_level->id }}" @if(old('job_level_id')){{ old('job_level_id') == $job_level->id ? 'selected' : '' }}@elseif( $draft &&  $draft->job_level_id == $job_level->id ){{ 'selected' }}@endif>{{ $job_level->name }}</option>
															@endforeach
														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- deadline --}}
												<div class="form-group row">
													<label for="" class="col-sm-2 col-form-label">Deadline:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="datepicker" autocomplete="off" placeholder="Deadline" name="deadline"  value="@if (old("deadline")){{ old('deadline') }}@elseif ( $draft ){{ $draft->deadline }}@endif" required>
														<div class="invalid-feedback">
															Please provide a valid date.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- qualification --}}
												<div class="form-group row">
													<label for="" class="col-sm-2 col-form-label">Qualification:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" placeholder="Qualification" name="qualification" value="@if (old("qualification")){{ old('qualification') }}@elseif ( $draft ){{ $draft->qualification }}@endif">
														<div class="invalid-feedback">
															Please provide a valid qualification.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- description --}}
												<div class="form-group row">
													<label for="title" class="col-sm-2 col-form-label">Description:</label>
													<div class="col-sm-10">
														<textarea class="form-control" placeholder="Description" rows="6" id="tinymce" name="description" required>@if (old("description")){{ old('description') }}@elseif ( $draft ){{ $draft->description }}@endif</textarea>
														<div class="invalid-feedback">
															Please provide a valid description.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>


												{{-- skills --}}
												@php
													$draftSkills = array();
													if($draft){

														foreach ($draft->jobSkill as $draftSkill) {

															$draftSkills[] = $draftSkill->skill['id'];

														}

													}
												@endphp
												<div class="form-group row">
													<label for="" class="col-sm-2 col-form-label">Skills:</label>
													<div class="col-sm-10">
														<select class="js-example-basic-single" multiple="multiple" name="skill[]" required>
															<option value="">Select</option>
															@foreach($skills as $skill)
															<option value="{{ $skill->id }}" @if(old("skill") && (in_array($skill->id, old("skill")))){{ "selected" }}@elseif( $draft && in_array($skill->id, $draftSkills )){{ 'selected' }}@endif >{{ $skill->name }}</option>
															@endforeach
														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- location type --}}
												<div class="form-group row">
													<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Location Type:</label>
													<div class="col-sm-10">
														<select class="form-control" id="loc_type" name="location_type" required>
															<option value="">Select</option>
															<option value="0" @if(old('location_type')){{ old('location_type') == 0 ? 'selected' : '' }}@elseif( $draft &&  $draft->location_type == 0 ){{ 'selected' }}@endif>Inside Bangladesh</option>
															<option value="1" @if(old('location_type')){{ old('location_type') == 1 ? 'selected' : '' }}@elseif( $draft &&  $draft->location_type == 1 ){{ 'selected' }}@endif>Outside Bangladesh</option>
														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- location --}}
												<div class="form-group row">
													<label for="location" class="col-sm-2 col-form-label">Location:</label>
													<div class="col-sm-10">
														<textarea class="form-control" id="loc" placeholder="Location" name="location" required>@if (old("location")){{ old('location') }}@elseif ( $draft ){{ $draft->location }}@endif</textarea>
														<small class="form-text text-muted"><i class="la la-info-circle 2x"></i> Insert job location</small>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- photo enclosed --}}
												<div class="form-group row">
													<label for="photo" class="col-sm-2 col-form-label"></label>
													<div class="custom-control custom-checkbox photo_enclose" style="margin-left: 15px;">
														<input type="checkbox" class="custom-control-input" id="photo" name='is_photograph_enclosed' value="@if (old("is_photograph_enclosed")){{ old('is_photograph_enclosed') }}@elseif ( $draft ){{ $draft->is_photograph_enclosed }}@endif" @if (old("is_photograph_enclosed")){{ 'checked' }}@elseif ( $draft['is_photograph_enclosed']){{ 'checked' }} @endif>
														<label class="custom-control-label" for="photo">Photograph Enclosed</label>
														<div class="help-block with-errors"></div>
													</div>
												</div>

											</div>

										</div>



										{{-- salary Info --}}
										<div id="step-2" class="">

											<div id="form-step-1" data-toggle="validator">
												{{-- min salary --}}
												<div class="form-group row">
													<label for="salary_min" class="col-sm-2 col-form-label">Min Salay:</label>
													<div class="col-sm-10">
														<input  type=number step=any class="form-control salary" placeholder="Min. Salary" name="salary_min" value="@if (old("salary_min")){{ old('salary_min') }}@elseif ( $draft ){{ $draft->salary_min }}@endif" required>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- max salary --}}
												<div class="form-group row">
													<label for="salary_max" class="col-sm-2 col-form-label">Max Salay:</label>
													<div class="col-sm-10">
														<input  type=number step=any class="form-control salary" placeholder="Max. Salary" name="salary_max" value="@if (old("salary_max")){{ old('salary_max') }}@elseif ( $draft ){{ $draft->salary_max }}@endif" required>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- salary type --}}
												<div class="form-group row">
													<label for="salary_type" class="col-sm-2 col-form-label">Salary Type:</label>
													<div class="col-sm-10">
														<select class="form-control" id="salary_type" name="salary_type" required>
															<option value="Weekly"  @if(old('salary_type')){{ old('salary_type') == 'Weekly' ? 'selected' : '' }}@elseif( $draft &&  $draft->salary_type == 'Weekly' ){{ 'selected' }}@endif>Weekly</option>
															<option value="Monthly" selected  @if(old('salary_type')){{ old('salary_type') == 'Monthly' ? 'selected' : '' }}@elseif( $draft &&  $draft->salary_type == 'Monthly' ){{ 'selected' }}@endif>Monthly</option>
															<option value="Yearly" @if(old('salary_type')){{ old('salary_type') == 'Yearly' ? 'selected' : '' }}@elseif( $draft &&  $draft->salary_type == 'Yearly' ){{ 'selected' }}@endif>Yearly</option>
														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- is negotialbe --}}
												<div class="form-group row">
													<label for="negotiable" class="col-sm-2 col-form-label"></label>
													<div class="custom-control custom-checkbox" style="margin-left: 15px;">
														<input type="checkbox" class="custom-control-input" name="is_negotiable" id="negotiable" value="@if (old("is_negotiable")){{ old('is_negotiable') }}@elseif ( $draft ){{ $draft['is_negotiable'] }}@endif" @if (old("is_negotiable")){{ 'checked' }}@elseif ( $draft['is_negotiable'] ){{ 'checked' }} @endif>
														<label class="custom-control-label" for="negotiable"> Negotiable</label>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- others benefit --}}

												@php
													$benifits = array();
													if($draft){

														foreach ($draft->otherBenifits as $other_benifit) {

															$benifits[] = $other_benifit->benifit;

														}

													}
												@endphp
												<div class="form-group row">
													<label for="other_benefit" class="col-sm-2 col-form-label">Other Benefit:</label>
													<div class="col-sm-10">
														<select class="js-example-basic-single" multiple="multiple" name="other_benifits[]" >
															<optgroup label="Basic Benifits">
																<option @if(old("other_benifits") && (in_array("T/A(Transport Allowance)", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("T/A(Transport Allowance)", $benifits )){{ 'selected' }}@endif value="T/A(Transport Allowance)">T/A(Transport Allowance)</option>
																<option @if(old("other_benifits") && (in_array("Mobile Bill", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Mobile Bill", $benifits )){{ 'selected' }}@endif value="Mobile Bill">Mobile Bill</option>

																<option @if(old("other_benifits") && (in_array("Pension Policy", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Pension Policy", $benifits )){{ 'selected' }}@endif value="Pension Policy">Pension Policy</option>

																<option @if(old("other_benifits") && (in_array("Tour Allowance", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Tour Allowance", $benifits )){{ 'selected' }}@endif value="Tour Allowance">Tour Allowance</option>

																<option @if(old("other_benifits") && (in_array("Medical Allowance", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Medical Allowance", $benifits )){{ 'selected' }}@endif value="Medical Allowance">Medical Allowance</option>

																<option @if(old("other_benifits") && (in_array("Performance Bonus", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Performance Bonus", $benifits )){{ 'selected' }}@endif value="Performance Bonus">Performance Bonus</option>

																<option @if(old("other_benifits") && (in_array("Profit Share", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Profit Share", $benifits )){{ 'selected' }}@endif value="Profit Share">Profit Share</option>

																<option @if(old("other_benifits") && (in_array("Provident Fund", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Provident Fund", $benifits )){{ 'selected' }}@endif value="Provident Fund">Provident Fund</option>

																<option @if(old("other_benifits") && (in_array("Insurance", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Insurance", $benifits )){{ 'selected' }}@endif value="Insurance">Insurance</option>

																<option @if(old("other_benifits") && (in_array("Gratuity", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Gratuity", $benifits )){{ 'selected' }}@endif value="Gratuity">Gratuity</option>

																<option @if(old("other_benifits") && (in_array("Overtime Allowance", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Overtime Allowance", $benifits )){{ 'selected' }}@endif value="Overtime Allowance">Overtime Allowance</option>
															</optgroup>
															<optgroup label="Lunch Facilities">
																<option @if(old("other_benifits") && (in_array("Lunch Partially Subsidize", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Lunch Partially Subsidize", $benifits )){{ 'selected' }}@endif value="Lunch Partially Subsidize">Partially Subsidize</option>

																<option @if(old("other_benifits") && (in_array("Lunch Full Subsidize", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Lunch Full Subsidize", $benifits )){{ 'selected' }}@endif value="Lunch Full Subsidize">Full Subsidize</option>
															</optgroup>

															<optgroup label="Salary Review">
																<option @if(old("other_benifits") && (in_array("Salary Review Half Yearly", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("T/A(Transport Allowance)", $benifits )){{ 'selected' }}@endif value="Salary Review Half Yearly">Half Yearly</option>
																<option @if(old("other_benifits") && (in_array("Salary Review Yearly", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("Salary Review Yearly", $benifits )){{ 'selected' }}@endif value="Salary Review Yearly">Yearly</option>
															</optgroup>

															<optgroup label="Festival Bonus">
																<option @if(old("other_benifits") && (in_array("1 Festival Bonus", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("1 Festival Bonus", $benifits )){{ 'selected' }}@endif value="1 Festival Bonus">1</option>

																<option @if(old("other_benifits") && (in_array("2 Festival Bonus", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("2 Festival Bonus", $benifits )){{ 'selected' }}@endif value="2 Festival Bonus">2</option>

																<option @if(old("other_benifits") && (in_array("3 Festival Bonus", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("3 Festival Bonus", $benifits )){{ 'selected' }}@endif value="3 Festival Bonus">3</option>

																<option @if(old("other_benifits") && (in_array("4 Festival Bonus", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("4 Festival Bonus", $benifits )){{ 'selected' }}@endif value="4 Festival Bonus">4</option>

																<option @if(old("other_benifits") && (in_array("5 Festival Bonus", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("5 Festival Bonus", $benifits )){{ 'selected' }}@endif value="5 Festival Bonus">5</option>

																<option @if(old("other_benifits") && (in_array("6 Festival Bonus", old("other_benifits")))){{ "selected" }}@elseif( $draft && in_array("6 Festival Bonus", $benifits )){{ 'selected' }}@endif value="6 Festival Bonus">6</option>
															</optgroup>

														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- hide salary --}}
												<div class="form-group row">
													<label for="hide_salary" class="col-sm-2 col-form-label"></label>
													<div class="custom-control custom-checkbox hide_salary" style="margin-left: 15px;">
														<input type="checkbox" class="custom-control-input" id="hide_salary" name="hide_salary" value="@if (old("hide_salary")){{ old('hide_salary') }}@elseif ( $draft ){{ $draft->hide_salary }}@endif" @if (old("hide_salary")){{ 'checked' }}@elseif ( $draft['hide_salary']){{ 'checked' }} @endif>
														<label class="custom-control-label" for="hide_salary"> Hide Salary</label>
														<small class="form-text text-muted">Salary range helps to match candidate properly but you can hide form candidate.</small>
														<div class="help-block with-errors"></div>
													</div>
												</div>
											</div>
										</div>


										{{-- Educational Info --}}
										<div id="step-3" class="">

											<div id="form-step-2" data-toggle="validator">
												{{-- preferred university --}}
												<div class="form-group row">
													<label for="preferred_uni" class="col-sm-2 col-form-label">Preferred University:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" autocomplete="off" placeholder="Preferred University" value="@if (old("preferred_university")){{ old('preferred_university') }}@elseif ( $draft ){{ $draft->educationalRequirement['preferred_university'] }}@endif" name="preferred_university">
														<div class="invalid-feedback">
															Please provide a valid university.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- others --}}
												<div class="form-group row">
													<label for="other_uni" class="col-sm-2 col-form-label">Others:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control"  autocomplete="off" placeholder="Others" name="others_edu" value="@if (old("others_edu")){{ old('others_edu') }}@elseif ( $draft ){{ $draft->educationalRequirement['others'] }}@endif">
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>
											</div>

										</div>


										{{-- Experience Info --}}
										<div id="step-4" class="">

											<div id="form-step-3" data-toggle="validator">
												{{-- min experience --}}
												<div class="form-group row">
													<label for="experience_min" class="col-sm-2 col-form-label">Min Experience:</label>
													<div class="col-sm-10">
														<input  type=number step=any class="form-control" placeholder="" name="min_experience" value="@if (old("min_experience")){{ old('min_experience') }}@elseif ( $draft ){{ $draft->experiencelRequirement['min_experience'] }}@endif" required>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- max experience --}}
												<div class="form-group row">
													<label for="experience_max" class="col-sm-2 col-form-label">Max Experience:</label>
													<div class="col-sm-10">
														<input  type=number step=any class="form-control" placeholder="" name="max_experience" value="@if (old("max_experience")){{ old('max_experience') }}@elseif ( $draft ){{ $draft->experiencelRequirement['max_experience'] }}@endif" required>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- fresher apply --}}
												<div class="form-group row">
													<label for="fresher" class="col-sm-2 col-form-label"></label>
													<div class="custom-control custom-checkbox fresher_apply" style="margin-left: 15px;">
														<input type="checkbox" class="custom-control-input" id="fresher" name="is_fresher_apply" value="@if (old("is_fresher_apply")){{ old('is_fresher_apply') }}@elseif ( $draft ){{ $draft->is_fresher_apply }}@endif" @if (old("is_fresher_apply")){{ 'checked' }}@elseif ( $draft['is_fresher_apply']){{ 'checked' }} @endif>
														<label class="custom-control-label" for="fresher"> Fresher can apply</label>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- area of experience --}}
												<div class="form-group row">
													<label for="experience_area" class="col-sm-2 col-form-label">Area of Experience:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" autocomplete="off" placeholder="" name="area_of_experience" value="@if (old("area_of_experience")){{ old('area_of_experience') }}@elseif ( $draft ){{ $draft->experiencelRequirement['area_of_experience'] }}@endif">
														<div class="invalid-feedback">
															Please provide a valid university.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- area of business --}}
												<div class="form-group row">
													<label for="business_area" class="col-sm-2 col-form-label">Area of Business:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" autocomplete="off" placeholder="" name="area_of_business" value="@if (old("area_of_business")){{ old('area_of_business') }}@elseif ( $draft ){{ $draft->experiencelRequirement['area_of_business'] }}@endif">
														<div class="invalid-feedback">
															Please provide a valid university.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>
											</div>
										</div>


										{{-- Personal Info --}}
										<div id="step-5" class="">

											<div id="form-step-4" data-toggle="validator">
												{{-- gender --}}
												<div class="form-group row">
													<label for="gender" class="col-sm-2 col-form-label">Gender:</label>
													<div class="col-sm-10">
														<select class="form-control" id="" required name="gender">
															<option>Select</option>
															<option value="0" @if(old('gender')){{ old('gender') == 0 ? 'selected' : '' }}@elseif( $draft &&  $draft->gender == 0 ){{ 'selected' }}@endif>All</option>
															<option value="1" @if(old('gender')){{ old('gender') == 1 ? 'selected' : '' }}@elseif( $draft &&  $draft->gender == 1 ){{ 'selected' }}@endif>Male</option>
															<option value="2" @if(old('gender')){{ old('gender') == 2 ? 'selected' : '' }}@elseif( $draft &&  $draft->gender == 2 ){{ 'selected' }}@endif>Female</option>
															<option value="3" @if(old('gender')){{ old('gender') == 3 ? 'selected' : '' }}@elseif( $draft &&  $draft->gender == 3 ){{ 'selected' }}@endif>Others</option>
														</select>
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- min age --}}
												<div class="form-group row">
													<label for="age_min" class="col-sm-2 col-form-label">Min Age:</label>
													<div class="col-sm-10">
														<input  type=number step=any class="form-control" placeholder="Min. Age" name="age_min" value="@if (old("age_min")){{ old('age_min') }}@elseif ( $draft ){{ $draft->age_min }}@endif">
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												{{-- max age --}}
												<div class="form-group row">
													<label for="age_max" class="col-sm-2 col-form-label">Max Age:</label>
													<div class="col-sm-10">
														<input  type=number step=any class="form-control" placeholder="Max. Age" name="age_max" value="@if (old("age_max")){{ old('age_max') }}@elseif ( $draft ){{ $draft->age_max }}@endif">
														<div class="invalid-feedback">
															Please provide a valid input.
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>


												{{-- hide company --}}
												<div class="form-group row">
													<label for="hide_company_info" class="col-sm-2 col-form-label"></label>
													<div class="custom-control custom-checkbox hide_company_info" style="margin-left: 15px;">
													<input type="checkbox" class="custom-control-input" id="hide_company_info" name="hide_company_info" value="@if (old("hide_company_info")){{ old('hide_company_info') }}@elseif ( $draft ){{ $draft->hide_company_info }}@else{{ trim('0') }}@endif" @if (old("hide_company_info")){{ 'checked' }}@elseif ( $draft['hide_company_info']){{ 'checked' }} @endif>
														<label class="custom-control-label" for="hide_company_info">Hide Company Info</label>
														<small class="form-text text-muted"><i class="la la-info-circle 2x"></i> Hide your company info from candidates.</small>
														<div class="help-block with-errors"></div>
													</div>
												</div>
											</div>
										</div>

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


@push('js-version')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script type="text/javascript" src="{{ asset('js/smartwizard4/jquery.smartWizard.min.js')}}"></script>

<script>
	$(document).ready(function() {
		$('.req-skill').select2({
			// placeholder: 'Maximum 5 skills',
			// maximumSelectionLength: 5,
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
		setup: function(editor) {
            editor.on("change keyup", function(e){
                console.log('saving');
                // tinyMCE.triggerSave(); // updates all instances
                editor.save(); // updates this instance's textarea
                $(editor.getElement()).trigger('change'); // for garlic to detect change
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | forecolor backcolor emoticons',
        // toolbar2: 'forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = "{{ asset('js/tinymce/') }}";

 </script>

 <script>
	$(document).ready(function(){

		if($('input[type="checkbox"][name="is_negotiable"]').val() == 1 ){
			$('.salary').attr('disabled', true);
			$('.salary').attr('required', false);
			$('#negotiable').val(1);
			$('#negotiable').attr('checked', true);
		}else{
			$('.salary').attr('disabled', false);
			$('.salary').attr('required', true);
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



		$('#vacancy').on('click', () => {
			if($('#vacancy').val() == 1){
				$('#vacancy').attr('checked', true);
				$('#vacancy_input').attr('required', false);
				$('#vacancy_input').attr('disabled', true);
				$('#vacancy').val(0);
				$('#vacancy_input').val(null);
			}else{
				$('#vacancy').attr('checked', false);
				$('#vacancy_input').attr('required', true);
				$('#vacancy_input').attr('disabled', false);
				$('#vacancy').val(1);
			}
		});


		// photo enclosed


		$('.photo_enclose label').on('click', () => {
			if($('#photo').val() == 1){
				$('#photo').val(0);
				// $('#photo').attr('checked', false);
			}else{
				$('#photo').val(1);
				// $('#photo').attr('checked', true);
			}
		});

		// hide company info

		$('.hide_company_info label').on('click', () => {
			if($('#hide_company_info').val() == 1){
				$('#hide_company_info').val(0);
				// $('#hide_company_info').attr('checked', false);

			}else{
				// $('#hide_company_info').attr('checked', true);
				$('#hide_company_info').val(1);
			}
		});

		$('.hide_salary label').on('click', () => {
			if($('#hide_salary').val() == 1){
				$('#hide_salary').val(0);
			}else{
				$('#hide_salary').val(1);
			}
		});

		$('.fresher_apply label').on('click', () => {
			if($('#fresher').val() == 1){
				$('#fresher').val(0);
			}else{
				$('#fresher').val(1);
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

});

$(document).ready(function(){

		// Toolbar extra buttons
            var btnPublish = $('<button></button>').text('Publish')
												  .attr('type', 'submit')
												  .attr('name', 'post')
												  .attr('value', 'post')
												  .attr('id', 'submit')
                                                  .addClass('btn ')
                                                  .on('click', function(){
													if( !$(this).hasClass('disabled')){
                                                        var elmForm = $("#newjob");
                                                        if(elmForm){
                                                            elmForm.validator('validate');
                                                            var elmErr = elmForm.find('.has-error');
                                                            if(elmErr && elmErr.length > 0){
                                                                alert('Oops we still have error in the form');
                                                                return false;
                                                            }else{
                                                                // alert('Great! we are ready to submit form');
                                                                // elmForm.submit();
																// $(this).click();
                                                                return true;
                                                            }
                                                        }
                                                    }
                                                });

			var btnDraft = $('<button></button>').text('Draft')
												  .attr('type', 'submit')
												  .attr('name', 'draft')
												  .attr('value', 'draft')
												  .attr('id', 'draft')
												  .attr('formnovalidate', '')
                                                  .addClass('btn ')
                                                  .on('click', function(){
													$('input').removeAttr("required");
													$('textarea').removeAttr("required");
													$('select').removeAttr("required");
													$('input[type="text"][name="title"]').attr("required");
													// if( !$(this).hasClass('disabled')){
                                                    //     return true;
                                                    // }
													return true;
                                                });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){
                                                    $('#smartwizard').smartWizard("reset");
                                                    $('#newjob').find("input, textarea").val("");
                                                });

        // Smart Wizard
        $('#smartwizard').smartWizard({

			theme: 'arrows',
			transitionEffect:'slideleft',
			transitionEffect: 'fade',
			transitionSpeed: '400',
			// onFinish:onFinishCallback,
			// enableFinishButton:true,
			toolbarSettings: {toolbarPosition: 'bottom',
			 					toolbarButtonPosition: 'right',
                                      toolbarExtraButtons: [btnPublish, btnDraft]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
		});

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
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


		$('#submit').addClass('d-none');
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if(stepNumber == 4){
                // $('.btn-finish').removeClass('disabled');
                $('#submit').removeClass('d-none');
            }else{
                // $('.btn-finish').addClass('disabled');
				$('#submit').addClass('d-none');
            }

        });

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