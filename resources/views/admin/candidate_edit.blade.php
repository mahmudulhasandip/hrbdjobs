@extends('admin.layout.admin')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Industry List
            </h3>
        </div>

    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
						<div class="row">
							<div class="col-xl-3 col-lg-4">
								<div class="m-portlet  ">
									<div class="m-portlet__body">
										<div class="m-card-profile">
											<div class="m-card-profile__title m--hide">
												Your Profile
											</div>
											<div class="m-card-profile__pic">
												<div class="m-card-profile__pic-wrapper">
													<img src="{{ asset('storage/uploads/'.(($candidate->dp) ? $candidate->dp : 'default_user.png'))}}" alt="Photo"/>
												</div>
											</div>
											<div class="m-card-profile__details">
												<span class="m-card-profile__name">
													{{ $candidate->fname }} {{ $candidate->lname }}
												</span>
												<a href="" class="m-card-profile__email m-link">
													{{ $candidate->email }}
												</a>
											</div>
										</div>

										{{-- <div class="m-portlet__body-separator"></div> --}}

									</div>
								</div>
							</div>
							<div class="col-xl-9 col-lg-8">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
														Update Profile
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="m_user_profile_tab_1">
											<form class="m-form m-form--fit m-form--label-align-right">
												<div class="m-portlet__body">
													{{-- <div class="form-group m-form__group m--margin-top-10 m--hide">
														<div class="alert m-alert m-alert--default" role="alert">
															The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
														</div>
													</div> --}}
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																1. Personal Details
															</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															First Name
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['fname'] }}" name="fname">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Last Name
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['lname'] }}" name="lname">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															User Name
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['username'] }}" name="username" disabled>
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Email
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="email" value="{{ $candidate['email'] }}" name="email" disabled>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Gender
														</label>
														<div class="col-5">
															<select class="form-control m-bootstrap-select m_selectpicker" name="gender">
                                                                <option value="Male" {{ ($candidate['gender'] == 'Male') ? 'selected' : ''  }}>Male</option>
                                                                <option value="Female" {{ ($candidate['gender'] == 'Female') ? 'selected' : ''  }}>Female</option>
                                                                <option value="Other" {{ ($candidate['gender'] == 'Other') ? 'selected' : ''  }}>Other</option>
															</select>
														</div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Date of Birth
														</label>
														<div class="col-5">
															<input type="text" class="form-control" id="m_datepicker_1" readonly placeholder="Select date" value={{ $candidate['date_of_birth'] }} name="date_of_birth" disabled/>
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															City
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['city'] }}" name="city">
														</div>
													</div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Country
														</label>
														<div class="col-5">
															<select class="form-control m-bootstrap-select m_selectpicker" name="country">
                                                                <option value="">Country</option>
                                                                @foreach($countries as $country)
                                                                <option value="{{ $country->name }}" {{ ($candidate['country'] == $country->name)?'selected':'' }}>{{ $country->name }}</option>
                                                                @endforeach
															</select>
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Current Address
														</label>
														<div class="col-5">
															<textarea class="form-control m-input " id="exampleTextarea" rows="3" name="current_address">{{ $candidate['current_address'] }}</textarea>
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Permanent Address
														</label>
														<div class="col-5">
															<textarea class="form-control m-input " id="exampleTextarea" rows="3" name="permanent_address">{{ $candidate['permanent_address'] }}</textarea>
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Nationality
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['nationality'] }}" name="nationality">
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															NID/Passport
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['nid_passport'] }}" name="nid_passport">
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Marital Status
														</label>
														<div class="col-5">
															<select class="form-control m-bootstrap-select m_selectpicker" name="marital_status">
                                                                <option value="Unmarried" {{ ($candidate['marital_status'] == 'Unmarried') ? 'selected' : '' }}>Unmarried</option>
                                                                <option value="Married" {{ ($candidate['marital_status'] == 'Married') ? 'selected' : '' }}>Married</option>
															</select>
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Fither Name
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['father_name'] }}" name="father_name">
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Mother Name
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['mother_name'] }}" name="mother_name">
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Spouse Name
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['spouse_name'] }}" name="spouse_name">
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Website
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['website'] }}" name="website">
														</div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Linkedin
														</label>
														<div class="col-5">
															<input class="form-control m-input" type="text" value="{{ $candidate['linkedin'] }}" name="linkedin">
														</div>
                                                    </div>

                                                    {{--  --}}
                                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-3x"></div>
                                                    {{--  --}}

													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																2. Address
															</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Address
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="L-12-20 Vertex, Cybersquare">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															City
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="San Francisco">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															State
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="California">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Postcode
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="45000">
														</div>
													</div>
													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																3. Social Links
															</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Linkedin
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="www.linkedin.com/Mark.Andre">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Facebook
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="www.facebook.com/Mark.Andre">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Twitter
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="www.twitter.com/Mark.Andre">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Instagram
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="www.instagram.com/Mark.Andre">
														</div>
													</div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Save changes
																</button>
																&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
																	Cancel
																</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
@endsection

@push('js')

{{-- <script src="{{ asset('/admin//demo/default/custom/components/forms/widgets/bootstrap-datepicker.js') }}"></script> --}}

<script>
    var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
</script>

@endpush