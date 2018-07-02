<form method="post" action="{{ route('candidate.update.profile.basic') }}" enctype="multipart/form-data">
	@csrf
		<div class="row">
		<div id="file-upload-form" class="uploader">
			<input id="file-upload" type="file" name="dp" accept="image/*" />

			<label for="file-upload" id="file-drag">
				<img id="file-image" src="{{ asset('storage/uploads/'.(($candidate->dp) ? $candidate->dp : 'default_user.png'))}}" alt="Preview" class="">
				<div id="start">
				<i class="fa fa-download" aria-hidden="true"></i>
				<div>Select a profile image or drag here</div>
				<div id="notimage" class="hidden">Please select an image</div>
				<span id="file-upload-btn" class="btn btn-primary">Select a file</span>
				</div>
				<div id="response" class="hidden">
				<div id="messages"></div>
				</div>
			</label>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">First Name</span>
			<div class="pf-field">
				<input type="text" name="fname" value="{{ $candidate->fname }}" />
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Last Name</span>
			<div class="pf-field">
				<input type="text" name="lname" value="{{ $candidate->lname }}" />
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Username</span>
			<div class="pf-field">
				<input type="text" name="username" value="{{ $candidate->username }}" readonly />
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Email</span>
			<div class="pf-field">
				<input type="text" name="email" value="{{ $candidate->email }}" readonly />
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Gender</span>
			<div class="pf-field">
				<select name="gender" data-placeholder="Allow In Search" class="chosen">
					<option value="Male" {{ $candidate->gender == 'Male' ? 'selected':'' }}>Male</option>
					<option value="Female" {{ $candidate->gender == 'Female' ? 'selected':'' }}>Female</option>
					<option value="Other" {{ $candidate->gender == 'Other' ? 'selected':'' }}>Other</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Birthday</span>
			<div class="pf-field">
				<input type="text" name="date_of_birth" id="datepicker" value="{{ date('m/d/Y', strtotime(($candidate->date_of_birth) ? $candidate->date_of_birth : '01-01-1990')) }}">
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Country</span>
			<div class="pf-field">
				<select name="country" class="chosen">
					@foreach($countries as $country)
					@if($candidate->country)
						<option value="{{ $country->name }}" {{ ($candidate->country == $country->name) ? 'selected':''}}>{{ $country->name }}</option>
					@else
						<option value="{{ $country->name }}" {{ ($country->name == 'Bangladesh') ? 'selected':''}}>{{ $country->name }}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">City</span>
			<div class="pf-field">
				<input type="text" name="city" value="{{ $candidate->city }}" placeholder="Your City" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Current Address</span>
			<div class="pf-field">
				<textarea name="current_address" rows="2">{{ $candidate->current_address }}</textarea>
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Permanent Address</span>
			<div class="pf-field">
				<textarea name="permanent_address" rows="2">{{ $candidate->permanent_address }}</textarea>
			</div>
		</div>

		<div class="col-lg-3">
			<span class="pf-title">Nationality</span>
			<div class="pf-field">
				<input type="text" name="nationality" value="{{ $candidate->nationality }}" placeholder="Your Nationality" />
			</div>
		</div>

		<div class="col-lg-3">
			<span class="pf-title">NID/Passport</span>
			<div class="pf-field">
				<input type="text" name="nid_passport" value="{{ $candidate->nid_passport }}" placeholder="Your NID or Passport" />
			</div>
		</div>

		<div class="col-lg-3">
			<span class="pf-title">Contact No</span>
			<div class="pf-field">
				<input type="text" name="phone" value="{{ $candidate->phone }}" placeholder="Your Contact Number" />
			</div>
		</div>

		<div class="col-lg-3">
			<span class="pf-title">Marital Status</span>
			<div class="pf-field">
				<select name="marital_status" data-placeholder="Please Select Specialism" class="chosen">
					<option value="Unmarried" {{ $candidate->marital_status == 'Unmarried' ? 'selected':'' }}>Unmarried</option>
					<option value="Married" {{ $candidate->marital_status == 'Married' ? 'selected':'' }}>Married</option>
					<option value="Divorced" {{ $candidate->marital_status == 'Divorced' ? 'selected':'' }}>Divorced</option>
				</select>
			</div>
		</div>

		<div class="col-lg-3">
			<span class="pf-title">Father's Name</span>
			<div class="pf-field">
				<input type="text" name="father_name" value="{{ $candidate->father_name }}" placeholder="Your Father Name" />
			</div>
		</div>

		<div class="col-lg-3">
			<span class="pf-title">Mother's Name</span>
			<div class="pf-field">
				<input type="text" name="mother_name" value="{{ $candidate->mother_name }}" placeholder="Your Mother Name" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Spouse Name</span>
			<div class="pf-field">
				<input type="text" name="spouse_name" value="{{ $candidate->spouse_name }}" placeholder="Your Mother Name" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Website</span>
			<div class="pf-field">
				<input type="text" name="website" value="{{ $candidate->website }}" placeholder="www.example.com" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Linkedin</span>
			<div class="pf-field">
				<input type="text" name="linkedin" value="{{ $candidate->linkedin }}" placeholder="www.linkedin.com/in/exapmle123/" />
			</div>
		</div>

		<div class="col-lg-12">
			<span class="pf-title">Summary</span>
			<div class="pf-field">
				<textarea name="about_me" rows="5">{{ $candidate->about_me }}</textarea>
			</div>
		</div>

		<div class="col-lg-12">
			<h3 class="text-center">Skill Info</h3>
		</div>

		<div class="col-md-6">
			<span class="pf-title">Experience (Years)</span>
			<div class="pf-field">
				<select name="experience" data-placeholder="Please Select Specialism" class="chosen">
					@foreach($jobExperiences as $jobExperience)
					<option value="{{ $jobExperience->id }}" {{ (sizeof($candidateSkills) && ($candidateSkills[0]->experience == $jobExperience->id)) ? 'selected':'' }}>{{ $jobExperience->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<span class="pf-title">Job Level</span>
			<div class="pf-field">
				<select name="job_level" data-placeholder="Please Select Specialism" class="chosen">
					@foreach($jobLevels as $jobLevel)
					<option value="{{ $jobLevel->name }}" {{ (sizeof($candidateSkills) && ($candidateSkills[0]->job_level == $jobLevel->name)) ? 'selected':'' }}>{{ $jobLevel->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<span class="pf-title">Job Category</span>
			<div class="pf-field">
				<select name="job_category" data-placeholder="Please Select Specialism" class="chosen">
					@foreach($jobCategories as $jobCategory)
					<option value="{{ $jobCategory->id }}" {{ (sizeof($candidateSkills) && ($candidateSkills[0]->category_id == $jobCategory->id)) ? 'selected':'' }}>{{ $jobCategory->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<span class="pf-title">Job Designation</span>
			<div class="pf-field">
				<select name="job_designation" data-placeholder="Please Select Specialism" class="chosen">
					@foreach($jobDesignations as $jobDesignation)
					<option value="{{ $jobDesignation->id }}" {{ (sizeof($candidateSkills) && ($candidateSkills[0]->designation_id == $jobDesignation->id)) ? 'selected':'' }}>{{ $jobDesignation->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-12">
			<span class="pf-title">Expertise Area</span>
			<div class="pf-field no-margin">
				@php 
					$canSkills = array();
					if(sizeof($candidateSkills)){
						foreach ($candidateSkills as $skill) {
							$canSkills[] = $skill->expertise_area;
						}
					}
					
				@endphp

				<select multiple="multiple" class="req-skill"  name="expertise_area[]">
					@foreach($skills as $skill)
					<option value="{{ $skill->id }}"  {{ (in_array($skill->id, $canSkills)) ? 'selected':'' }}>{{ $skill->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-12">
			<button type="submit">Update</button>
		</div>
	</div>
</form>
