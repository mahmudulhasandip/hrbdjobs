@extends('users.layout.app')

@section('title', 'HRBDJobs | Candidate Profile')

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
                                <a href="{{ ($candidate->linkedin) ? (substr( $candidate->linkedin, 0, 4 ) === "http" ? $candidate->linkedin : 'http://'.$candidate->linkedin) : 'javascript:void(0)' }}" target="_blank" class="share-linkedin"><i class="la la-linkedin"></i></a>
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
                            <li><a href="#training" title="">Training</a></li>
                            <li><a href="#certificate" title="">Professional Certificate</a></li>
                        </ul>
                        <div class="cand-details-sec">
                            <div class="row">
                                <div class="col-lg-8 column">
                                    <div class="cand-details" id="about">
                                        <h2>Candidates About</h2>
                                        <p>{{ $candidate->about_me }}</p>
                                        <div class="edu-history-sec" id="education">
                                            <h2>Education</h2>
                                            @if(sizeof($candidate->candidateEducation))
                                                @foreach($candidate->candidateEducation as $education)
                                                <div class="edu-history">
                                                    <i class="la la-graduation-cap"></i>
                                                    <div class="edu-hisinfo">
                                                        <h3>{{ $education->level_of_education }} - {{ $education->passing_year }}</h3>
                                                        <i>{{ $education->degree_title }} - {{ $education->gpa.' out of '.$education->out_of }}</i> 
                                                        <span>{{ $education->candidateInstitute->name }}} <i>{{ $education->group_majar }}</i></span>
                                                        <p>{{ $education->achievement }}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="edu-history-sec" id="experience">
                                            <h2>Work & Experience</h2>
                                            @if(sizeof($candidate->candidateExperience))
                                                @foreach($candidate->candidateExperience as $experience)
                                                <div class="edu-history style2">
                                                    <i></i>
                                                    <div class="edu-hisinfo">
                                                        <h3>{{ $experience->responsibility }} <span>{{ $experience->company_name }}</span> <i>({{ $experience->company_designation }})</i></h3>
                                                        <i>{{ date("d M, Y", strtotime($experience->start_date)) }} - {{ ($experience->end_date) ? date("d M, Y", strtotime($experience->end_date)) : 'Continuing' }}</i>
                                                        <p></p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="edu-history">
                                                    <i></i>
                                                    <div class="edu-hisinfo">
                                                        <p><i>Fresher</i></p>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        
                                        @if(sizeof($candidate->candidateTraining))
                                        <div class="edu-history-sec" id="training">
                                            <h2>Training</h2>

                                            @foreach($candidate->candidateTraining as $training)
                                            @php 
                                                $years = '';
                                                if($training->duration/12) {
                                                    $years = floor($training->duration / 12).' Year';
                                                    $years = $years.($years > 1 ? 's' : '');
                                                    if($years == 0) {
                                                        $years = '';
                                                    }
                                                }
                                                $months = ' '.($training->duration % 12).' Month';
                                                if($months > 1) {
                                                    $months = $months.'s';
                                                }elseif($months  == 0){
                                                    $months = '';
                                                }

                                                $duration = $years.''.$months;
                                            @endphp
                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>{{ $training->title }}</h3>
                                                    <i>{{ $training->institution_name }}, {{ $training->country }}</i>
                                                    <i>{{ $training->location }} - {{ $training->training_year }}, {{ $duration }}</i>
                                                    <p>{{ $training->topic_cover }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif

                                        @if(sizeof($candidate->candidateProfessionalCertificate))
                                        <div class="edu-history-sec" id="certificate">
                                            <h2>Professional Certificate</h2>

                                            @foreach($candidate->candidateProfessionalCertificate as $certificate)
                                            
                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>{{ $certificate->certification }}</h3>
                                                    <i>{{ $certificate->institution_name }}</i>
                                                    <i>{{ date('d M, Y', strtotime($certificate->start_date)) }} - {{ date('d M, Y', strtotime($certificate->end_date)) }}</i>
                                                    <p></p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif

                                        @if(sizeof($candidate->followEmployer))
                                        <div class="companyies-fol-sec">
                                            <h2>Companies Followed By</h2>
                                            <div class="cmp-follow">
                                                <div class="row">
                                                    @foreach($candidate->followEmployer as $follow)
                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                        <a href="{{ route('public.employer.profile', $follow->employer_id) }}" target="_blank"><img src="{{ ( $follow->employer->employerCompanyInfo->logo ) ? asset('storage/uploads/'.$follow->employer->employerCompanyInfo->logo) : asset('storage/uploads/company-avatar.png') }}" /><span>{{ $follow->employer->employerCompanyInfo->name }}</span></a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div> 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 column">
                                    <div class="job-overview">
                                        <h3>Job Overview</h3>
                                        <ul>
                                            <!-- <li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li> -->
                                            <li><i class="la la-mars-double"></i><h3>Gender</h3><span>{{ $candidate->gender }}</span></li>
                                            @if(sizeof($candidate->candidateSkill))
                                            <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>{{ $candidate->candidateSkill->first()->jobLevel->name }}</span></li>
                                            <li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>{{ $candidate->candidateSkill->first()->jobCategory->name }}</span></li>
                                            <li><i class="la la-bomb"></i><h3>Designation</h3><span>{{ $candidate->candidateSkill->first()->jobDesignation->name }}</span></li>
                                            <li><i class="la la-shield"></i><h3>Experience</h3><span>{{ $candidate->candidateSkill->first()->experience }} Years</span></li>
                                            @endif
                                            @if(sizeof($candidate->candidateEducation))
                                            <li><i class="la la-graduation-cap "></i><h3>Qualification</h3><span>{{ $candidate->candidateEducation[sizeof($candidate->candidateEducation)-1]->degree_title }}</span></li>
                                            @endif
                                        </ul>
                                    </div><!-- Job Overview -->
                                    <div class="job-overview">
                                        <h3>Skill's of candidates</h3>

                                        <div class="skills">
                                            @if(sizeof($candidate->candidateSkill))
                                                @foreach($candidate->candidateSkill as $can_skill)
                                                    <span>{{ $can_skill->skill->name }}</span>
                                                @endforeach
                                            @endif
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

