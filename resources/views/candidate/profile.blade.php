@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(/images/slider-3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <div class="container">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overlape">
        <div class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cand-single-user">
                            <div class="share-bar circle">
                                <a href="{{ ($candidate->linkedin) ? (substr( $candidate->website, 0, 4 ) === "http" ? $candidate->linkedin : 'http://'.$candidate->linkedin) : 'javascript:void(0)' }}" target="_blank" class="share-linkedin"><i class="la la-linkedin"></i></a>
                            </div>
                            <div class="can-detail-s">
                                <div class="cst"><img src="{{ asset('storage/uploads/'.(($candidate->dp) ? $candidate->dp : 'default_user.png'))}}" height="145" width="145" /></div>
                                <h3>{{ $candidate->fname }} {{ $candidate->lname }}</h3>

                                @if(sizeof($candidate->candidateExperience))
                                    <span><i>{{ $candidate->candidateExperience()->first()->jobDesignation->name }}</i> at {{$candidate->candidateExperience()->first()->company_name}}</span>
                                @endif
                                
                                <p>{{ $candidate->email }}</p>
                                @if($candidate->phone)
                                <p>{{ $candidate->phone }}</p>
                                @endif
                                @if($candidate->website)
                                    <p><a href="{{ substr( $candidate->website, 0, 4 ) === "http" ? $candidate->website : 'http://'.$candidate->website }}" target="_blank">{{ $candidate->website }}</a></p>
                                @endif
                                 @if($candidate->country)
                                    <p><i class="la la-map-marker"></i>{{ $candidate->city }} / {{ $candidate->country }}</p>
                                @endif
                            </div>

                            @if($candidate->candidateResume()->exists())
                                <div class="download-cv">
                                    <a href="{{ asset('storage/uploads/resumes/'.$candidate->candidateResume->resume) }}" download="{{ $candidate->candidateResume->resume }}">Download CV <i class="la la-download"></i></a>
                                </div>
                            @else
                                <div class="download-cv">
                                    <a href="{{ route('candidate.resume.view') }}">Browse CV <i class="la la-share-square"></i></a>
                                </div>
                            @endif
                        </div>
                        <ul class="cand-extralink">
                            <li><a href="#about" title="">About</a></li>
                            <li><a href="#education" title="">Education</a></li>
                            <li><a href="#experience" title="">Work Experience</a></li>
                        </ul>
                        <div class="cand-details-sec">
                            <div class="row">
                                <div class="col-lg-8 column">
                                    <div class="cand-details" id="about">
                                        <h2>Candidates About</h2>
                                        <p>{{ $candidate->about_me }}</p>
                                        <div class="edu-history-sec" id="education">
                                            <h2>Education</h2>
                                            <div class="edu-history">
                                                <i class="la la-graduation-cap"></i>
                                                <div class="edu-hisinfo">
                                                    <h3>University</h3>
                                                    <i>2008 - 2012</i>
                                                    <span>Middle East Technical University <i>Computer Science</i></span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                            </div>
                                            <div class="edu-history">
                                                <i class="la la-graduation-cap"></i>
                                                <div class="edu-hisinfo">
                                                    <h3>High School</h3>
                                                    <i>2008 - 2012</i>
                                                    <span>Tomms College <i>Bachlors in Fine Arts</i></span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="edu-history-sec" id="experience">
                                            <h2>Work & Experience</h2>
                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>Web Designer <span>Inwave Studio</span></h3>
                                                    <i>2008 - 2012</i>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                            </div>
                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>CEO Founder <span>Inwave Studio</span></h3>
                                                    <i>2008 - 2012</i>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="mini-portfolio" id="portfolio">
                                            <h2>Portfolio</h2>
                                            <div class="mp-row">
                                                <div class="mp-col">
                                                    <div class="mportolio"><img src="http://placehold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
                                                </div>
                                                <div class="mp-col">
                                                    <div class="mportolio"><img src="http://placehold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
                                                </div>
                                                <div class="mp-col">
                                                    <div class="mportolio"><img src="http://placehold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
                                                </div>
                                                <div class="mp-col">
                                                    <div class="mportolio"><img src="http://placehold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-sec" id="skills">
                                            <h2>Professional Skills</h2>
                                            <div class="progress-sec">
                                                <span>Adobe Photoshop</span>
                                                <div class="progressbar"> <div class="progress" style="width: 80%;"><span>80%</span></div> </div>
                                            </div>
                                            <div class="progress-sec">
                                                <span>Production In Html</span>
                                                <div class="progressbar"> <div class="progress" style="width: 60%;"><span>60%</span></div> </div>
                                            </div>
                                            <div class="progress-sec">
                                                <span>Graphic Design</span>
                                                <div class="progressbar"> <div class="progress" style="width: 75%;"><span>75%</span></div> </div>
                                            </div>
                                        </div>
                                        <div class="edu-history-sec" id="awards">
                                            <h2>Awards</h2>
                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>Perfect Attendance Programs</h3>
                                                    <i>2008 - 2012</i>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                            </div>
                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>Top Performer Recognition</h3>
                                                    <i>2008 - 2012</i>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                            </div>
                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>King LLC</h3>
                                                    <i>2008 - 2012</i>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="companyies-fol-sec">
                                            <h2>Companies Followed By</h2>
                                            <div class="cmp-follow">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                        <a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>King LLC</span></a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                        <a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>Telimed</span></a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                        <a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>Ucesas</span></a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                        <a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>TeraPlaner</span></a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                        <a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>Cubico</span></a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                        <a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>Airbnb</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-lg-4 column">
                                    <div class="job-overview">
                                        <h3>Job Overview</h3>
                                        <ul>
                                            <!-- <li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li> -->
                                            <li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
                                            <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
                                            <li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
                                            <li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
                                            <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
                                        </ul>
                                    </div><!-- Job Overview -->
                                    <div class="job-overview">
                                        <h3>Skill's of candidates</h3>

                                        <div class="skills">
                                            <span>Html</span>
                                            <span>Css3</span>
                                            <span>javascript</span>
                                            <span>jquery</span>
                                            <span>php</span>
                                            <span>laravel</span>

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

