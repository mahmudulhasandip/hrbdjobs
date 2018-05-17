@extends('employer.layout.app') 
@section('title', 'HRBDJobs | Employer Company Profile') 
@section('content')
<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
		<!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>Welcome {{ Auth::user()->fname.' '. Auth::user()->lname}}</h3>
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
						<div class="profile-title" id="mp">
							<h3>Company Profile</h3>

						</div>
						<div class="profile-form-edit">
							<form role="form" method="POST" action="{{ route('employer.update.profile') }}" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div id="file-upload-form" class="uploader">
										<input id="file-upload" type="file" name="logo" accept="image/*" />
		
										<label for="file-upload" id="file-drag">
											<img id="file-image" src="#" alt="Preview" class="hidden">
											<div id="start">
											<i class="fa fa-download" aria-hidden="true"></i>
											<div>Select a logo or drag here</div>
											<div id="notimage" class="hidden">Please select an image</div>
											<span id="file-upload-btn" class="btn btn-primary">Select a file</span>
											</div>
											<div id="response" class="hidden">
											<div id="messages"></div>
											<progress class="progress" id="file-progress" value="0">
												<span>0</span>%
											</progress>
											</div>
										</label>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Company Name</span>
										<div class="pf-field">
										<input type="text" placeholder="HrBD" value="{{ $company_info->name }}" name="name"/>
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Company Category</span>
										<div class="pf-field">
											<select name="industry_type[]" id="industry_type" autocomplete="off" data-placeholder="Company Category" multiple class="chosen">
												@foreach($industries as $industry)
													<option value="{{ $industry->id }}">{{ $industry->name }}</option>
												@endforeach
											</select>

											@if ($errors->has('industry_type'))
												<span class="help-block">
													<strong>{{ $errors->first('industry_type') }}</strong>
												</span> 
											@endif
										</div>
									</div>

									<div class="col-lg-6">
										<span class="pf-title">Since</span>
										<div class="pf-field">
											<input type="text" placeholder="1991" name="since" />
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Team Size</span>
										<div class="pf-field">
											<select data-placeholder="Please Select Specialism" class="chosen" name="team_size" >
												<option value="1-10">1-10</option>
												<option value="10-50">10-50</option>
												<option value="50-100">50-100</option>
												<option value="100+">100+</option>
											</select>
										</div>
									</div>

									<div class="col-lg-12">
										<span class="pf-title">Description</span>
										<div class="pf-field">
											<textarea placeholder="Description" name="description" ></textarea>
										</div>
									</div>

									<div class="col-lg-6">
										<span class="pf-title">Compnay Address</span>
										<div class="pf-field">
											<textarea placeholder="Compnay Address" name="address" ></textarea>
										</div>
									</div>

									<div class="col-lg-6">
										<span class="pf-title">Billing Address</span>
										<div class="pf-field">
											<textarea placeholder="Billing Address" name="billing_address" ></textarea>
										</div>
									</div>



									{{-- social links --}}
									<div class="col-lg-6">
										<span class="pf-title">Facebook</span>
										<div class="pf-field">
											<input type="text" placeholder="www.facebook.com/TeraPlaner" name="fb_link" />
											<i class="fa fa-facebook"></i>
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Twitter</span>
										<div class="pf-field">
											<input type="text" placeholder="www.twitter.com/TeraPlaner" name="twitter_link" />
											<i class="fa fa-twitter"></i>
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Google</span>
										<div class="pf-field">
											<input type="text" placeholder="www.google-plus.com/TeraPlaner" name="gplus_link" />
											<i class="la la-google"></i>
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Linkedin</span>
										<div class="pf-field">
											<input type="text" placeholder="www.Linkedin.com/TeraPlaner" name="linkedin_link" />
											<i class="la la-linkedin"></i>
										</div>
									</div>


									<div class="col-lg-4">
										<span class="pf-title">Phone Number</span>
										<div class="pf-field">
											<input type="text" placeholder="+90 538 963 58 96" name="contact_phone" />
										</div>
									</div>
									<div class="col-lg-4">
										<span class="pf-title">Email</span>
										<div class="pf-field">
											<input type="text" placeholder="demo@jobhunt.com" name="contact_email" />
										</div>
									</div>
									<div class="col-lg-4">
										<span class="pf-title">Website</span>
										<div class="pf-field">
											<input type="text" placeholder="www.jobhun.com" name="website" />
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Country</span>
										<div class="pf-field">
											<select name="country" id="country" autocomplete="off" data-placeholder="Please Select Specialism" class="chosen">
												@foreach($countries as $country)
													<option value="{{ $country->name }}">{{ $country->name }}</option>
												@endforeach
											</select>
											@if ($errors->has('country'))
											<span class="help-block">
												<strong>{{ $errors->first('country') }}</strong>
											</span> 
											@endif
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">City</span>
										<div class="pf-field">
											<input type="text" placeholder="City" name="city" />
										</div>
									</div>
								</div>
								<br>
								<div class="col-lg-12">
									<button type="submit">Update</button>
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

//   function uploadFile(file) {

//     var xhr = new XMLHttpRequest(),
//       fileInput = document.getElementById('class-roster-file'),
//       pBar = document.getElementById('file-progress'),
//       fileSizeLimit = 1024; // In MB
//     if (xhr.upload) {
//       // Check if file is less than x MB
//       if (file.size <= fileSizeLimit * 1024 * 1024) {
//         // Progress bar
//         pBar.style.display = 'inline';
//         xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
//         xhr.upload.addEventListener('progress', updateFileProgress, false);

//         // File received / failed
//         xhr.onreadystatechange = function(e) {
//           if (xhr.readyState == 4) {
//             // Everything is good!

//             // progress.className = (xhr.status == 200 ? "success" : "failure");
//             // document.location.reload(true);
//           }
//         };

//         // Start upload
//         xhr.open('POST', document.getElementById('file-upload-form').action, true);
//         xhr.setRequestHeader('X-File-Name', file.name);
//         xhr.setRequestHeader('X-File-Size', file.size);
//         xhr.setRequestHeader('Content-Type', 'multipart/form-data');
//         xhr.send(file);
//       } else {
//         output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
//       }
//     }
//   }

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