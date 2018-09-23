@extends('candidate.layout.app')
@section('title', 'HRBDJobs | Candidate Change Password')


@section('content')
{{-- <section class="overlape">
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
</section> --}}

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
					<div class="widget" id="sidebar">
						@include('candidate.layout.sidebar')
					</div>

				</aside>
				<div class="col-lg-9 column">
					<div class="padding-left">
						<div class="profile-title">
                            <h3 >Change Password</h3>
                            {{-- Change Password Form --}}
                            <div class="contact-edit">
								<form method="POST" action="{{ route('candidate.update.password') }}">
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
	</div>
</section>
@endsection


