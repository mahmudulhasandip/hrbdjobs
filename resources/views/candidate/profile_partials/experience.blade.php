@if(sizeof($candidateExperiences))
	<form method="post" action="{{ route('candidate.update.profile.experience') }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					@foreach($candidateExperiences as $experience)
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="text-center">Experience Summary</h4>
									<hr>
								</div>
								<div class="col-lg-6">
									<span class="pf-title">Company Name</span>
									<div class="pf-field">
										<input type="text" name="company_name[]" value="{{ $experience->company_name }}" required />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Responsibility</span>
									<div class="pf-field">
										<input type="text" name="responsibility[]" value="{{ $experience->responsibility }}" />
									</div>
								</div>

								<div class="col-md-6">
									<span class="pf-title">Candidate Designation</span>
									<div class="pf-field">
										<select name="candidate_designation[]" data-placeholder="Please Select Specialism" class="chosen">
											@foreach($jobDesignations as $jobDesignation)
											<option value="{{ $jobDesignation->id }}" {{ ($experience->candidate_designation == $jobDesignation->id) ? 'selected':'' }}>{{ $jobDesignation->name }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Company Designation</span>
									<div class="pf-field">
										<input type="text" name="company_designation[]" value="{{ $experience->company_designation }}" />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Start Date</span>
									<div class="pf-field">
										<input type="text" name="start_date[]" class="datepicker" value="{{ $experience->start_date }}" />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">End Date</span>
									<div class="pf-field">
										<input type="text" name="end_date[]" class="datepicker" value="{{ $experience->end_date }}" />
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-12" id="make_clone_box_experience">
				
			</div>
			<div class="col-lg-12">
				<a href="javascript:void(0)" onclick="makeBox('experience')" id="add_experience" class="margin_top_25 text-blue"><span class="la la-plus"></span> Add Experience</a>
				<button type="submit">Update</button>
			</div>
		</div>
	</form>
@else
<form method="post" action="{{ route('candidate.update.profile.experience') }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="text-center">Experience Summary</h4>
					<hr>
				</div>
				<div class="col-lg-6">
					<span class="pf-title">Company Name</span>
					<div class="pf-field">
						<input type="text" name="company_name[]" required />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Responsibility</span>
					<div class="pf-field">
						<input type="text" name="responsibility[]" required />
					</div>
				</div>

				<div class="col-md-6">
					<span class="pf-title">Candidate Designation</span>
					<div class="pf-field">
						<select name="candidate_designation[]" data-placeholder="Please Select Specialism" class="chosen">
							@foreach($jobDesignations as $jobDesignation)
							<option value="{{ $jobDesignation->id }}">{{ $jobDesignation->name }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Company Designation</span>
					<div class="pf-field">
						<input type="text" name="company_designation[]" required />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Start Date</span>
					<div class="pf-field">
						<input type="text" name="start_date[]" class="datepicker" required />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">End Date</span>
					<div class="pf-field">
						<input type="text" name="end_date[]" class="datepicker" />
					</div>
				</div>
			<div class="col-lg-12" id="make_clone_box_experience">
				
			</div>
		</div>
		<div class="col-lg-12">
			<a href="javascript:void(0)" onclick="makeBox('experience')" id="add_experience" class="margin_top_25 text-blue"><span class="la la-plus"></span> Add Experience</a>
			<button type="submit">Update</button>
		</div>
	</div>
</form>
@endif

<div id="make_clone_experience" class="hidden">
	<div class="row">

		<div class="col-lg-12">
			<h4 class="text-center">Experience Summary</h4>
			<hr>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Company Name</span>
			<div class="pf-field">
				<input type="text" name="company_name[]" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Responsibility</span>
			<div class="pf-field">
				<input type="text" name="responsibility[]" />
			</div>
		</div>

		<div class="col-md-6">
			<span class="pf-title">Candidate Designation</span>
			<div class="pf-field">
				<select name="candidate_designation[]" data-placeholder="Please Select Specialism" class="chosen">
					@foreach($jobDesignations as $jobDesignation)
					<option value="{{ $jobDesignation->id }}" >{{ $jobDesignation->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Company Designation</span>
			<div class="pf-field">
				<input type="text" name="company_designation[]" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Start Date</span>
			<div class="pf-field">
				<input type="text" name="start_date[]" class="datepicker" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">End Date</span>
			<div class="pf-field">
				<input type="text" name="end_date[]" class="datepicker" />
			</div>
		</div>
	</div>
</div>
