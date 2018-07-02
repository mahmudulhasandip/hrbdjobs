@if(sizeof($candidateCertificate))
	<form method="post" action="{{ route('candidate.update.profile.certificate') }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					@foreach($candidateCertificate as $certificate)
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="text-center">Certificate Summary</h4>
									<hr>
								</div>
								<div class="col-lg-12">
									<span class="pf-title">Certificate Name</span>
									<div class="pf-field">
										<input type="text" name="certification[]" value="{{ $certificate->certification }}" required />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Institution Name</span>
									<div class="pf-field">
										<input type="text" name="institution_name[]" value="{{ $certificate->institution_name }}" />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Location</span>
									<div class="pf-field">
										<input type="text" name="location[]" value="{{ $certificate->location }}" />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Start Date</span>
									<div class="pf-field">
										<input type="text" name="start_date[]" class="datepicker" value="{{ $certificate->start_date }}" />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">End Date</span>
									<div class="pf-field">
										<input type="text" name="end_date[]" class="datepicker" value="{{ $certificate->end_date }}" />
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-12" id="make_clone_box">
				
			</div>
			<div class="col-lg-12">
				<a href="javascript:void(0)" onclick="makeBox()" id="add_certificate" class="margin_top_25 text-blue"><span class="la la-plus"></span> Add Certificate</a>
				<button type="submit">Update</button>
			</div>
		</div>
	</form>
@else
<form method="post" action="{{ route('candidate.update.profile.certificate') }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="text-center">Certificate Summary</h4>
					<hr>
				</div>
				<div class="col-lg-12">
					<span class="pf-title">Certificate Name</span>
					<div class="pf-field">
						<input type="text" name="certification[]" required />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Institution Name</span>
					<div class="pf-field">
						<input type="text" name="institution_name[]" />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Location</span>
					<div class="pf-field">
						<input type="text" name="location[]" />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Start Date</span>
					<div class="pf-field">
						<input type="text" name="start_date[]" placeholder="01/31/2015" class="datepicker" />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">End Date</span>
					<div class="pf-field">
						<input type="text" name="end_date[]" class="datepicker" />
					</div>
				</div>
			<div class="col-lg-12" id="make_clone_box">
				
			</div>
		</div>
		<div class="col-lg-12">
			<a href="javascript:void(0)" onclick="makeBox()" id="add_certificate" class="margin_top_25 text-blue"><span class="la la-plus"></span> Add Certificate</a>
			<button type="submit">Update</button>
		</div>
	</div>
</form>
@endif

<div id="make_clone" class="hidden">
	<div class="row">

		<div class="col-lg-12">
			<h4 class="text-center">Certificate Summary</h4>
			<hr>
		</div>
		<div class="col-lg-12">
			<span class="pf-title">Certificate Name</span>
			<div class="pf-field">
				<input type="text" name="certification[]" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Institution Name</span>
			<div class="pf-field">
				<input type="text" name="institution_name[]" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Location</span>
			<div class="pf-field">
				<input type="text" name="location[]" />
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
