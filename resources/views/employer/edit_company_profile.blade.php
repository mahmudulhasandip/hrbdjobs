<?php header('Access-Control-Allow-Origin: *'); ?>
@extends('employer.layout.app')
@section('title', 'HRBDJobs | Employer Company Profile')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.10.0/ui/trumbowyg.min.css" />
@endpush

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
							<div class="border-line"></div>
							<form role="form" method="POST" action="{{ route('employer.update.profile') }}" enctype="multipart/form-data">
								@csrf
								<div class="row">
									@if($errors->has('logo'))
										<div class="alert alert-danger" role="alert">
										<h4 class="alert-heading">Uh oh!</h4>
										@foreach($errors->get('image') as $message)
										<p>{{ $message }}</p>
										@endforeach
										</div>
									@endif

									<div id="file-upload-form" class="uploader">
										<input id="file-upload" type="file" name="logo" accept="image/*" />

										<label for="file-upload" id="file-drag">
											<img id="file-image" src="{{ asset('storage/uploads/'.(($company_info->logo) ? $company_info->logo : 'company-avatar.png'))}}" alt="Preview" class="">
											<div id="start">
											<i class="fa fa-download" aria-hidden="true"></i>
											<div>Select a logo or drag here</div>
											<div id="notimage" class="hidden">Please select an image</div>
											<span id="file-upload-btn" class="btn btn-primary">Select a file</span>
											</div>
											<div id="response" class="hidden">
											<div id="messages"></div>
											{{-- <progress class="progress" id="file-progress" value="0">
												<span>0</span>%
											</progress> --}}
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
													<option value="{{ $industry->id }}" {{ in_array($industry->id, $company_industry) ? "selected" : "" }}  >{{ $industry->name }}</option>
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
											<input type="text" placeholder="1991" name="since" value="{{ $company_info->since }}" />
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Team Size</span>
										<div class="pf-field">
											<select data-placeholder="Please Select Specialism" class="chosen" name="team_size" value="{{ $company_info->team_size }}">
												<option value="1-10" {{ ($company_info->team_size == '1-10') ? "selected" : "" }}>1-10</option>
												<option value="10-50" {{ ($company_info->team_size == '10-50') ? "selected" : "" }}>10-50</option>
												<option value="50-100" {{ ($company_info->team_size == '50-100') ? "selected" : "" }}>50-100</option>
												<option value="100+" {{ ($company_info->team_size == '100+') ? "selected" : "" }}>100+</option>
											</select>
										</div>
									</div>

									<div class="col-lg-12">
										<span class="pf-title desc">Description</span>
										{{-- <div id="description" >{!! $company_info->description !!}</div> --}}
										<textarea id="tinymce" name="description" placeholder="Description">{{ $company_info->description }}</textarea>
									</div>

									{{-- <div class="col-lg-12">
										<span class="pf-title">Description</span>
										<div class="pf-field">
											<textarea placeholder="Description" name="description" >{{ $company_info->description }}</textarea>
										</div>
									</div> --}}

									<div class="col-lg-6">
										<span class="pf-title">Compnay Address</span>
										<div class="pf-field">
											<textarea placeholder="Compnay Address" name="address" >{{ $company_info->address }}</textarea>
										</div>
									</div>

									<div class="col-lg-6">
										<span class="pf-title">Billing Address</span>
										<div class="pf-field">
											<textarea placeholder="Billing Address" name="billing_address" >{{ $company_info->billing_address }}</textarea>
										</div>
									</div>



									{{-- social links --}}
									<div class="col-lg-6">
										<span class="pf-title">Facebook</span>
										<div class="pf-field">
											<input type="text" placeholder="www.facebook.com/TeraPlaner" name="fb_link" value="{{ ($social_links && $social_links->fb_link) ? $social_links->fb_link : '' }}" />
											<i class="fa fa-facebook"></i>
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Twitter</span>
										<div class="pf-field">
											<input type="text" placeholder="www.twitter.com/TeraPlaner" name="twitter_link" value="{{ ($social_links && $social_links->twitter_link) ? $social_links->twitter_link : '' }}"  />
											<i class="fa fa-twitter"></i>
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Google</span>
										<div class="pf-field">
											<input type="text" placeholder="www.google-plus.com/TeraPlaner" name="gplus_link" value="{{ ($social_links && $social_links->gplus_link) ? $social_links->gplus_link : '' }}"  />
											<i class="la la-google"></i>
										</div>
									</div>
									<div class="col-lg-6">
										<span class="pf-title">Linkedin</span>
										<div class="pf-field">
											<input type="text" placeholder="www.Linkedin.com/TeraPlaner" name="linkedin_link" value="{{ ($social_links && $social_links->linkedin_link) ? $social_links->linkedin_link : '' }}"  />
											<i class="la la-linkedin"></i>
										</div>
									</div>


									<div class="col-lg-4">
										<span class="pf-title">Phone Number</span>
										<div class="pf-field">
											<input type="text" placeholder="+90 538 963 58 96" name="contact_phone" value="{{ $company_info->phone }}"/>
										</div>
									</div>
									<div class="col-lg-4">
										<span class="pf-title">Email</span>
										<div class="pf-field">
											<input type="text" placeholder="demo@jobhunt.com" name="contact_email" value="{{ $company_info->email }}" />
										</div>
									</div>
									<div class="col-lg-4">
										<span class="pf-title">Website</span>
										<div class="pf-field">
											<input type="text" placeholder="www.jobhun.com" name="website" value="{{ $company_info->website }}" />
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
											<input type="text" placeholder="City" name="city" value="{{ $company_info->city }}" />
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
 <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
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




<script>

		tinymce.init({
			selector: "textarea#tinymce",
			theme: "modern",
			branding: false,
			plugins: [
				'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				'searchreplace wordcount visualblocks visualchars code fullscreen',
				'insertdatetime media nonbreaking save table contextmenu directionality',
				'emoticons template paste textcolor colorpicker textpattern imagetools'
			],
			toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			toolbar2: 'print preview media | forecolor backcolor emoticons',
			image_advtab: true
		});
		tinymce.suffix = ".min";
		tinyMCE.baseURL = "{{ asset('js/tinymce/') }}";

	 </script>

@endpush