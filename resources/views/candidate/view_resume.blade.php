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
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <div class="border-title"><h3>My Resume</h3></div>
                                    <section>
                                        <div class="block">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tab-sec">
                                                            <ul class="nav nav-tabs">
                                                              <li><a href="{{ route('candidate.uploaded.resume.view') }}" target="_blank" class="current" data-tab="upcv">Uploaded CV</a></li>
                                                              <li><a data-tab="dwcv">Download CV</a></li>
                                                              <li><a data-tab="viewcv">View CV</a></li>
                                                            </ul>
                                                            <div id="upcv" class="tab-content current">
                                                                
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection

