@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

@section('content')
    {{-- <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
                    <div id="wall" class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec mb50">
                                <h3>Candidate's Dashboard</h3>
                                <div class="cat-sec">
                                    <div class="row no-gape">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="{{ route('candidate.profile') }}" target="_blank" title="">
                                                    <i class="la la-user"></i>
                                                    <span>My Profile</span>
                                                    {{-- <p>Show Details</p> --}}
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="{{ route('candidate.resume.view') }}" target="_blank" title="">
                                                    <i class="la la-file-text "></i>
                                                    <span>My Resume</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="{{ route('candidate.applied.jobs') }}" target="_blank" title="">
                                                    <i class="la la-check"></i>
                                                    <span>Applied Jobs</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cat-sec">
                                    <div class="row no-gape">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="{{ url('browse/jobs') }}" target="_blank" title="">
                                                    <i class="la la-code-fork"></i>
                                                    <span>Browse Jobs</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category ">
                                                <a href="{{ route('candidate.follow.companies') }}" target="_blank" title="">
                                                    <i class="la la-building-o"></i>
                                                    <span>Followed Companies</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category ">
                                                <a href="{{ route('candidate.shortlisted.job') }}" target="_blank" title="">
                                                    <i class="la la-black-tie"></i>
                                                    <span>Shortlisted Jobs</span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection

