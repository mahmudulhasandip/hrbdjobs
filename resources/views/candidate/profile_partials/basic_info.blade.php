<form method="post" action="{{ route('candidate.update.profile') }}" enctype="multipart/form-data">
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
				<select data-placeholder="Please Select Specialism" class="chosen">
					<option value="Married" {{ $candidate->marital_status == 'Married' ? 'selected':'' }}>Married</option>
					<option value="Unmarried" {{ $candidate->marital_status == 'Unmarried' ? 'selected':'' }}>Unmarried</option>
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
				<textarea name="about_me" rows="5">Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed severalnew methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer ollaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present</textarea>
			</div>
		</div>

		<div class="col-lg-12">
			<h3 class="text-center">Skill Info</h3>
		</div>
		
		<div class="col-lg-12">
			<span class="pf-title">Categories</span>
			<div class="pf-field no-margin">
				<ul class="tags">
					<li class="addedTag">Photoshop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]"
						 value="Photoshop"></li>
					<li class="addedTag">Digital & Creative<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden"
						 name="tags[]" value="Digital"></li>
					<li class="addedTag">Agency<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]"
						 value="Agency"></li>
					<li class="tagAdd taglist">
						<input type="text" id="search-field">
					</li>
				</ul>
			</div>
		</div>
		
		<div class="col-lg-12">
			<button type="submit">Update</button>
		</div>
	</div>
</form>
