@if(sizeof($candidateTrainings))
	<form method="post" action="{{ route('candidate.update.profile.training') }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					@foreach($candidateTrainings as $training)
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="text-center">Training Summary</h4>
									<hr>
								</div>
								<div class="col-lg-6">
									<span class="pf-title">Title</span>
									<div class="pf-field">
										<input type="text" name="title[]" value="{{ $training->title }}" required />
									</div>
								</div>


								<div class="col-lg-6">
									<span class="pf-title">Country</span>
									<div class="pf-field">
										<select name="country[]" class="chosen">
											@foreach($countries as $country)
												@if($training->country)
													<option value="{{ $country->name }}" {{ ($training->country == $country->name) ? 'selected':''}}>{{ $country->name }}</option>
												@else
													<option value="{{ $country->name }}" {{ ($country->name == 'Bangladesh') ? 'selected':''}}>{{ $country->name }}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Topic Cover</span>
									<div class="pf-field">
										<input type="text" name="topic_cover[]" value="{{ $training->topic_cover }}" />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Training Year</span>
									<div class="pf-field">
										<input type="number" name="training_year[]" value="{{ $training->training_year }}"/>
									</div>
								</div>

								<div class="col-lg-4">
									<span class="pf-title">Institution Name</span>
									<div class="pf-field">
										<input type="text" name="institution_name[]" value="{{ $training->institution_name }}" />
									</div>
								</div>

								<div class="col-lg-4">
									<span class="pf-title">Duration (Month)</span>
									<div class="pf-field">
										<input type="number" name="duration[]" value="{{ $training->duration }}" required />
									</div>
								</div>

								<div class="col-lg-4">
									<span class="pf-title">Location</span>
									<div class="pf-field">
										<input type="text" name="location[]" value="{{ $training->location }}" />
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
				<a href="javascript:void(0)" onclick="addTraining()" id="add_training" class="margin_top_25 text-blue"><span class="la la-plus"></span> Add Training</a>
				<button type="submit">Update</button>
			</div>
		</div>
	</form>
@else
<form method="post" action="{{ route('candidate.update.profile.training') }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="text-center">Training Summary</h4>
					<hr>
				</div>
				<div class="col-lg-6">
					<span class="pf-title">Title</span>
					<div class="pf-field">
						<input type="text" name="title[]" required />
					</div>
				</div>


				<div class="col-lg-6">
					<span class="pf-title">Country</span>
					<div class="pf-field">
						<select name="country[]" class="chosen">
							@foreach($countries as $country)
								<option value="{{ $country->name }}" {{ ($country->name == 'Bangladesh') ? 'selected':''}}>{{ $country->name }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Topic Cover</span>
					<div class="pf-field">
						<input type="text" name="topic_cover[]" />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Training Year</span>
					<div class="pf-field">
						<input type="number" name="training_year[]" />
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">Institution Name</span>
					<div class="pf-field">
						<input type="text" name="institution_name[]" />
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">Duration (Month)</span>
					<div class="pf-field">
						<input type="text" name="duration[]" required />
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">Location</span>
					<div class="pf-field">
						<input type="text" name="location[]" />
					</div>
				</div>
			</div>
			<div class="col-lg-12" id="make_clone_box">
				
			</div>
		</div>
		<div class="col-lg-12">
			<a href="javascript:void(0)" onclick="addTraining()" id="add_education" class="margin_top_25 text-blue"><span class="la la-plus"></span> Add Training</a>
			<button type="submit">Update</button>
		</div>
	</div>
</form>
@endif

<div id="make_clone" class="hidden">
	<div class="row">

		<div class="col-lg-12">
			<h4 class="text-center">Training Summary</h4>
			<hr>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Title</span>
			<div class="pf-field">
				<input type="text" name="title[]"/>
			</div>
		</div>


		<div class="col-lg-6">
			<span class="pf-title">Country</span>
			<div class="pf-field">
				<select name="country[]" class="chosen">
					@foreach($countries as $country)
						<option value="{{ $country->name }}" {{ ($country->name == 'Bangladesh') ? 'selected':''}}>{{ $country->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Topic Cover</span>
			<div class="pf-field">
				<input type="text" name="topic_cover[]" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Training Year</span>
			<div class="pf-field">
				<input type="number" name="training_year[]" />
			</div>
		</div>

		<div class="col-lg-4">
			<span class="pf-title">Institution Name</span>
			<div class="pf-field">
				<input type="text" name="institution_name[]" />
			</div>
		</div>

		<div class="col-lg-4">
			<span class="pf-title">Duration (Month)</span>
			<div class="pf-field">
				<input type="text" name="duration[]" />
			</div>
		</div>

		<div class="col-lg-4">
			<span class="pf-title">Location</span>
			<div class="pf-field">
				<input type="text" name="location[]" />
			</div>
		</div>
	</div>
</div>
