@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

@section('content')
    <section class="overlape">
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
                                                <a href="company_profile.html" title="">
                                                    <i class="la la-briefcase"></i>
                                                    <span>Company Details</span>
                                                    <p>Show Details</p>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="post_a_new_job.html" title="">
                                                    <i class="la la-file-text "></i>
                                                    <span>Post A Job</span>
                                                    <p>Create New Job</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="employer_manage_jobs.html" title="">
                                                    <i class="la la-check"></i>
                                                    <span>Manage Jobs</span>
                                                    <p>(05 Jobs)</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cat-sec">
                                    <div class="row no-gape">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="packages.html" title="">
                                                    <i class="la la-file-o"></i>
                                                    <span>Packages</span>
                                                    <p>View Packages</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category follow-companies-popup">
                                                <a href="candidates_shortlisted.html" title="">
                                                    <i class="la la-heart-o"></i>
                                                    <span>Shorlisted Candidates</span>
                                                    <p>56 Candidates</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category view-resume-list">
                                                <a href="resume_database.html" title="">
                                                    <i class="la la-eye"></i>
                                                    <span>Browse Resume Database</span>
                                                    <p>View</p>
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

