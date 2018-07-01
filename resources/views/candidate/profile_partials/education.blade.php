@if(sizeof($candidateEducations))
	@foreach($candidateEducations as $eduction)
		<form method="post" action="{{ route('candidate.update.profile') }}" enctype="multipart/form-data">
			@csrf
			<div class="row">
		
				<div class="col-lg-12">
					<div id="make_clone_box" class="row">
						<div class="col-lg-6">
							<span class="pf-title">Level Of Education</span>
							<div class="pf-field">
								<input type="text" name="level_of_education" />
							</div>
						</div>


						<div class="col-lg-6">
							<span class="pf-title">Degree Title</span>
							<div class="pf-field">
								<input type="text" name="degree_title"/>
							</div>
						</div>

						<div class="col-lg-6">
							<span class="pf-title">Group Majar</span>
							<div class="pf-field">
								<input type="text" name="group_majar" />
							</div>
						</div>

						<div class="col-lg-6">
							<span class="pf-title">Institution Name</span>
							<div class="pf-field">
								<input type="text" name="institution_name"/>
							</div>
						</div>

						<div class="col-lg-4">
							<span class="pf-title">GPA</span>
							<div class="pf-field">
								<input type="text" name="gpa" />
							</div>
						</div>

						<div class="col-lg-4">
							<span class="pf-title">Out Of</span>
							<div class="pf-field">
								<input type="text" name="out_of"/>
							</div>
						</div>

						<div class="col-lg-4">
							<span class="pf-title">Passing Year</span>
							<div class="pf-field">
								<input type="number" name="passing_year"/>
							</div>
						</div>

						<div class="col-lg-12">
							<span class="pf-title">Achievement</span>
							<div class="pf-field">
								<textarea name="achievement" rows="5"></textarea>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-12">
					<a href="javascript:void(0)" onclick="addEducation()" id="add_education" class="add_education text-blue"><span class="la la-plus"></span> Add Education</a>
					<button type="submit">Update</button>
				</div>
			</div>
		</form>
	@endforeach
@else
<form method="post" action="{{ route('candidate.update.profile') }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-6">
					<span class="pf-title">Level Of Education</span>
					<div class="pf-field">
						<input type="text" name="level_of_education" />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Degree Title</span>
					<div class="pf-field">
						<input type="text" name="degree_title"/>
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Group Majar</span>
					<div class="pf-field">
						<input type="text" name="group_majar" />
					</div>
				</div>

				<div class="col-lg-6">
					<span class="pf-title">Institution Name</span>
					<div class="pf-field">
						<input type="text" name="institution_name"/>
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">GPA</span>
					<div class="pf-field">
						<input type="text" name="gpa" />
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">Out Of</span>
					<div class="pf-field">
						<input type="text" name="out_of"/>
					</div>
				</div>

				<div class="col-lg-4">
					<span class="pf-title">Passing Year</span>
					<div class="pf-field">
						<input type="number" name="passing_year"/>
					</div>
				</div>

				<div class="col-lg-12">
					<span class="pf-title">Achievement</span>
					<div class="pf-field">
						<textarea name="achievement" rows="5"></textarea>
					</div>
				</div>
			</div>
			<div id="make_clone_box" class="row">
				
			</div>
		</div>
		<div class="col-lg-12">
			<a href="javascript:void(0)" onclick="addEducation()" id="add_education" class="add_education text-blue"><span class="la la-plus"></span> Add Education</a>
			<button type="submit">Update</button>
		</div>
	</div>
</form>
@endif

<div id="make_clone" class="hidden">
	<div class="col-lg-6">
		<span class="pf-title">Level Of Education</span>
		<div class="pf-field">
			<input type="text" name="level_of_education" />
		</div>
	</div>

	<div class="col-lg-6">
		<span class="pf-title">Degree Title</span>
		<div class="pf-field">
			<input type="text" name="degree_title"/>
		</div>
	</div>

	<div class="col-lg-6">
		<span class="pf-title">Group Majar</span>
		<div class="pf-field">
			<input type="text" name="group_majar" />
		</div>
	</div>

	<div class="col-lg-6">
		<span class="pf-title">Institution Name</span>
		<div class="pf-field">
			<input type="text" name="institution_name"/>
		</div>
	</div>

	<div class="col-lg-4">
		<span class="pf-title">GPA</span>
		<div class="pf-field">
			<input type="text" name="gpa" />
		</div>
	</div>

	<div class="col-lg-4">
		<span class="pf-title">Out Of</span>
		<div class="pf-field">
			<input type="text" name="out_of"/>
		</div>
	</div>

	<div class="col-lg-4">
		<span class="pf-title">Passing Year</span>
		<div class="pf-field">
			<input type="number" name="passing_year"/>
		</div>
	</div>

	<div class="col-lg-12">
		<span class="pf-title">Achievement</span>
		<div class="pf-field">
			<textarea name="achievement" rows="5"></textarea>
		</div>
	</div>
</div>
