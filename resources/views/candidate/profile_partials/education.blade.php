@if(sizeof($candidateEducations))
	<form method="post" action="{{ route('candidate.update.profile.education') }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					@foreach($candidateEducations as $eduction)
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<h4 class="text-center">Academic Summary</h4>
									<hr>
								</div>
								<div class="col-lg-6">
									<span class="pf-title">Level Of Education</span>
									<div class="pf-field">
										<input type="text" name="level_of_education[]" value="{{ $eduction->level_of_education }}" />
									</div>
								</div>


								<div class="col-lg-6">
									<span class="pf-title">Degree Title</span>
									<div class="pf-field">
										<input type="text" name="degree_title[]" value="{{ $eduction->degree_title }}"/>
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Group Majar</span>
									<div class="pf-field">
										<input type="text" name="group_majar[]" value="{{ $eduction->group_majar }}" />
									</div>
								</div>

								<div class="col-lg-6">
									<span class="pf-title">Institution Name</span>
									<div class="pf-field">
										<input type="text" name="institution_name[]" value="{{ $eduction->institution_name }}"/>
									</div>
								</div>

								<div class="col-lg-4">
									<span class="pf-title">GPA</span>
									<div class="pf-field">
										<input type="text" name="gpa[]" value="{{ $eduction->gpa }}" />
									</div>
								</div>

								<div class="col-lg-4">
									<span class="pf-title">Out Of</span>
									<div class="pf-field">
										<input type="text" name="out_of[]" value="{{ $eduction->out_of }}" />
									</div>
								</div>

								<div class="col-lg-4">
									<span class="pf-title">Passing Year</span>
									<div class="pf-field">
										<input type="number" name="passing_year[]" value="{{ $eduction->passing_year }}" />
									</div>
								</div>

								<div class="col-lg-12">
									<span class="pf-title">Achievement</span>
									<div class="pf-field">
										<textarea name="achievement[]" rows="5">{{ $eduction->achievement }}</textarea>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-12" id="make_clone_box_education">
				
			</div>
			<div class="col-lg-12">
				<a href="javascript:void(0)" onclick="makeBox('education')" id="add_education" class="margin_top_25 text-blue"><span class="la la-plus"></span> Add Education</a>
				<button type="submit">Update</button>
			</div>
		</div>
	</form>
@else
<form method="post" action="{{ route('candidate.update.profile.education') }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="text-center">Academic Summary</h4>
					<hr>
				</div>
				
				<div class="col-lg-6">
					<span class="pf-title">Level Of Education</span>
					<div class="pf-field">
						<input type="text" name="level_of_education[]" required/>
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Degree Title</span>
					<div class="pf-field">
						<input type="text" name="degree_title[]" required/>
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Group Majar</span>
					<div class="pf-field">
						<input type="text" name="group_majar[]"/>
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Institution Name</span>
					<div class="pf-field">
						<input type="text" name="institution_name[]" required/>
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">GPA</span>
					<div class="pf-field">
						<input type="text" name="gpa[]" required/>
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">Out Of</span>
					<div class="pf-field">
						<input type="text" name="out_of[]" required/>
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">Passing Year</span>
					<div class="pf-field">
						<input type="number" name="passing_year[]" required />
					</div>
				</div>

				<div class="col-lg-12">
					<span class="pf-title">Achievement</span>
					<div class="pf-field">
						<textarea name="achievement[]" rows="5"></textarea>
					</div>
				</div>
			</div>
			<div class="col-lg-12" id="make_clone_box_education">
				
			</div>
		</div>
		<div class="col-lg-12">
			<a href="javascript:void(0)" onclick="makeBox('education')" id="add_education" class="margin_top_25 text-blue"><span class="la la-plus"></span> Add Education</a>
			<button type="submit">Update</button>
		</div>
	</div>
</form>
@endif

<div id="make_clone_education" class="hidden">
	<div class="row">

		<div class="col-lg-12">
			<h4 class="text-center">Academic Summary</h4>
			<hr>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Level Of Education</span>
			<div class="pf-field">
				<input type="text" name="level_of_education[]" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Degree Title</span>
			<div class="pf-field">
				<input type="text" name="degree_title[]"/>
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Group Majar</span>
			<div class="pf-field">
				<input type="text" name="group_majar[]" />
			</div>
		</div>

		<div class="col-lg-6">
			<span class="pf-title">Institution Name</span>
			<div class="pf-field">
				<input type="text" name="institution_name[]"/>
			</div>
		</div>

		<div class="col-lg-4">
			<span class="pf-title">GPA</span>
			<div class="pf-field">
				<input type="text" name="gpa[]" />
			</div>
		</div>

		<div class="col-lg-4">
			<span class="pf-title">Out Of</span>
			<div class="pf-field">
				<input type="text" name="out_of[]"/>
			</div>
		</div>

		<div class="col-lg-4">
			<span class="pf-title">Passing Year</span>
			<div class="pf-field">
				<input type="number" name="passing_year[]"/>
			</div>
		</div>

		<div class="col-lg-12">
			<span class="pf-title">Achievement</span>
			<div class="pf-field">
				<textarea name="achievement[]" rows="5"></textarea>
			</div>
		</div>
	</div>
</div>
