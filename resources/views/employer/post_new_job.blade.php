@extends('employer.layout.app')

@section('title', 'HRBDJobs | Post New Job')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url({{ asset('/images/top-bg.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
					 		<div class="profile-title">
					 			<h3>Post a New Job</h3>
					 		</div>
					 		<div class="profile-form-edit">
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-12">
					 						<span class="pf-title">Job Title</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Title" name="title"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea id="tinymce">Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed severalnew methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer ollaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present</textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Email</span>
					 						<div class="pf-field">
					 							<input type="text" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Username</span>
					 						<div class="pf-field">
					 							<input type="text" />
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Job Type</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Categories</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Offerd Salary</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Career Level</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Experience</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Gender</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Industry</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Qualification</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Application Deadline Date</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="01.11.207" />
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Skill Requirments</span>
					 						<div class="pf-field">
												<select multiple="multiple" class=" req-skill"  name="skill[]">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
											</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">Country</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field">
					 							<select data-placeholder="Please Select Specialism" class="chosen">
													<option>Web Development</option>
													<option>Web Designing</option>
													<option>Art & Culture</option>
													<option>Reading & Writing</option>
												</select>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Complete Address</span>
					 						<div class="pf-field">
					 							<textarea>Collins Street West, Victoria 8007, Australia.</textarea>
					 						</div>
					 					</div>

					 				</div>
					 			</form>
					 		</div>
					 		<div class="contact-edit">
					 			<form>
					 				<div class="row">
					 					<div class="col-lg-6">
					 						<span class="pf-title">Find On Map</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="Collins Street West, Victoria 8007, Australia." />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Latitude</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="41.1589654" />
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Longitude</span>
					 						<div class="pf-field">
					 							<input type="text" placeholder="21.1589654" />
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<a href="#" title="" class="srch-lctn">Search Location</a>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Maps</span>
					 						<div class="pf-map">
					 							<div id="map_div"></div>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
											<button type="submit" class="draft">Draft</button>
					 						<button type="submit">Next</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

{{-- <script src="{{ asset('/js/jquery.tinymce.min.js') }}"></script> --}}
{{-- <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script> --}}
<script>
	$(document).ready(function() {
		$('.req-skill').select2({
			placeholder: 'Maximum 5 skills',
			maximumSelectionLength: 5,
			tags: true,
			tokenSeparators: [',', ' '],
  			allowClear: true
		});
	});
</script>

<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
	tinymce.suffix = '.min';
	tinymce.init({ selector:'textarea' });
//TinyMCE
// tinymce.init({
//         selector: "textarea",
//         theme: "modern",
//         height: 400,
//         plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//         toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//         toolbar2: 'print preview media | forecolor backcolor emoticons',
//         //image_advtab: true
//     });
//     tinymce.suffix = ".min";
//     tinyMCE.baseURL = 'plugins/tinymce';
 </script>

@endpush