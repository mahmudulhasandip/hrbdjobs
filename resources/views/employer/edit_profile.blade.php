@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Profile')

@section('content')
<div id="nav_height"></div>
<section class="overlape">
		<div class="block no-padding">
			<img src="{{ asset('images/top_add.jpg') }}" alt="Advertisement banner">
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column border-right">
						 {{-- Sidebar --}}
				 		<div class="widget">
							@include('employer.layout.sidebar')
				 		</div>

				 	</aside>
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="profile-title">
					 			<h3>Employee Profile</h3>
							 </div>

					 		<div class="profile-form-edit">
								{{-- top border line --}}
								<div class="border-line"></div>

					 			<form method="post" action="{{ route('employer.update.employer.profile') }}" enctype="multipart/form-data">
									@csrf
					 				<div class="row">
										<div id="file-upload-form" class="uploader">
											<input id="file-upload" type="file" name="logo" accept="image/*" />

											<label for="file-upload" id="file-drag">
												<img id="file-image" src="{{ asset('storage/uploads/'.(($employer_info->logo) ? $employer_info->logo : 'default_user.png'))}}" alt="Preview" class="">
												<div id="start">
												<i class="fa fa-download" aria-hidden="true"></i>
												<div>Select a logo or drag here</div>
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
					 							<input type="text" placeholder="First Name" name="fname"  value="{{ old('fname') ? old('fname') : $employer_info->fname }}"/>
					 						</div>
										 </div>

					 					<div class="col-lg-6">
					 						<span class="pf-title">Last Name</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Last Name" name="lname"  value="{{ 	old('lname') ? old('lname') : $employer_info->lname }}"/>
					 						</div>
										 </div>

					 					<div class="col-lg-6">
					 						<span class="pf-title">Designation</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Designation" name="designation"  value="{{ 	old('designation') ? old('designation') : $employer_info->designation }}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Website</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Website" name="website" value="{{ 	old('website') ? old('website') : $employer_info->website }}" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Country</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Country" name="country" value="{{ 	old('country') ? old('country') : $employer_info->country }}" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="City" name="city" value="{{ 	old('city') ? old('city') : $employer_info->city }}" />
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Address</span>
					 						<div class="pf-field">
					 							<textarea placeholder="Address" name="address">{{ 	old('address') ? old('address') : $employer_info->address }}</textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<button type="submit">Update</button>
					 					</div>
					 				</div>
					 			</form>
					 		</div>

					 		<div class="contact-edit">
					 			<h3>Change Password</h3>
								 <form method="POST" action="{{ route('employer.update.employer.password') }}">
									@csrf
					 				<div class="row">
					 					<div class="col-lg-4">
					 						<span class="pf-title">Old Password</span>
					 						<div class="pf-field">
											 <input type="password" placeholder="Old Password" name="old_password" value="{{ old('old_password') }}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">New Password</span>
					 						<div class="pf-field">
					 							<input type="password" placeholder="New Password" name="password" value="{{ old('password') }}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Retype Password</span>
					 						<div class="pf-field">
					 							<input type="password" placeholder="Retype Password" name="password_confirmation"  value="{{ old('password_confirmation') }}"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<button type="submit">Update</button>
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

<script>
	// File Upload
function ekUpload(){
  function Init() {

    // console.log("Upload Initialised");

    var fileSelect    = document.getElementById('file-upload'),
        fileDrag      = document.getElementById('file-drag'),
        submitButton  = document.getElementById('submit-button');

    fileSelect.addEventListener('change', fileSelectHandler, false);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
      // File Drop
      fileDrag.addEventListener('dragover', fileDragHover, false);
      fileDrag.addEventListener('dragleave', fileDragHover, false);
      fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
  }

  function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag');

    e.stopPropagation();
    e.preventDefault();

    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
  }

  function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
      parseFile(f);
      uploadFile(f);
    }
  }

  // Output
  function output(msg) {
    // Response
    var m = document.getElementById('messages');
    m.innerHTML = msg;
  }

  function parseFile(file) {

    console.log(file.name);
    output(
      '<strong>' + encodeURI(file.name) + '</strong>'
    );

    // var fileType = file.type;
    // console.log(fileType);
    var imageName = file.name;

    var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
    if (isGood) {
      document.getElementById('start').classList.add("hidden");
      document.getElementById('response').classList.remove("hidden");
      document.getElementById('notimage').classList.add("hidden");
      // Thumbnail Preview
      document.getElementById('file-image').classList.remove("hidden");
      document.getElementById('file-image').src = URL.createObjectURL(file);
    }
    else {
      document.getElementById('file-image').classList.add("hidden");
      document.getElementById('notimage').classList.remove("hidden");
      document.getElementById('start').classList.remove("hidden");
      document.getElementById('response').classList.add("hidden");
      document.getElementById("file-upload-form").reset();
    }
  }

  function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.max = e.total;
    }
  }

  function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.value = e.loaded;
    }
  }



  // Check for the various File API support.
  if (window.File && window.FileList && window.FileReader) {
    Init();
  } else {
    document.getElementById('file-drag').style.display = 'none';
  }
}
ekUpload();

</script>

@endpush