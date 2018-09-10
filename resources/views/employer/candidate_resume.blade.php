@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Shortlisted Candidate')

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
				 	<div class="col-lg-9 column mb-50">
				 		<div class="padding-left">
                            <div class="padding-left">
								<div class="emply-resume-sec">
                                    <h3>Resume of {{ $candidate->fname }} {{ $candidate->lname }}</h3>
                                    <section>

                                        <div class="block mt50">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tab-sec">
                                                            {{-- <ul class="nav nav-tabs">
                                                              <li><a href="{{ route('candidate.uploaded.resume.view') }}" target="_blank" class="current" data-tab="upcv">Uploaded CV</a></li>
                                                              <li><a data-tab="dwcv">Download CV</a></li>
                                                              <li><a data-tab="viewcv">View CV</a></li>
                                                            </ul>
                                                            <div id="upcv" class="tab-content current">


                                                            </div> --}}
                                                            <div class="download-cv mb-65">
                                                                @if($candidate->candidateResume)
                                                                <a class="ml-10" href="{{ route('candidate.uploaded.resume.view') }}" target="_blank" title="">Uploaded Resume <i class="la la-download"></i></a>
                                                                @endif
                                                                <a href="{{ route('candidate.download.resume', $candidate->id) }}" id="download-resume"  title="">Generate Resume <i class="la la-download"></i></a>
                                                            </div>
                                                            <div id="resume">

                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="700">


                                                                        <tbody><tr>
                                                                        <td colspan="6">
                                                                        <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody><tr>
                                                                            <td width="73%" height="" align="left"  class="HRBDApplicantsName">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                        <!--Contact Address:-->
                                                                                            <!--Applicant's Name:-->
                                                                                            {{ $candidate->fname.' '.$candidate->lname }}
                                                                                            @if($candidate->current_address)
                                                                                            <br>
                                                                                            <span>
                                                                                               <i class="la la-map-marker"></i> Address: {{ $candidate->current_address }}
                                                                                            </span>
                                                                                            @endif

                                                                                            @if($candidate->phone)
                                                                                            <!--Home Phone:-->
                                                                                            <br>
                                                                                            <span>
                                                                                                <i class="la la-phone"></i> Phone: {{ $candidate->phone }}
                                                                                                <!--Office Phone:-->
                                                                                                <!--Mobile:-->
                                                                                            </span>
                                                                                            @endif
                                                                                            <br>
                                                                                            <span>
                                                                                               <i class="la la-envelope-o"></i> e-mail: <a href="mailto:{{ $candidate->email}}">{{ $candidate->email }}</a>
                                                                                            </span>
                                                                                            @if($candidate->linkedin)
                                                                                            <!--Home Phone:-->
                                                                                            <br>
                                                                                            <span>
                                                                                                <i class="la la-linkedin"></i> Linkedin: <a href="{{ substr( $candidate->linkedin, 0, 4)  === 'http' ? $candidate->linkedin : 'http://'.$candidate->linkedin }}" target="_blank">{{ $candidate->linkedin }}</a>
                                                                                                <!--Office Phone:-->
                                                                                                <!--Mobile:-->
                                                                                            </span>
                                                                                            @endif
                                                                                        </td>
                                                                            </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            </td>

                                                                            <td width="27%" rowspan="2" align="right" valign="bottom">
                                                                            <!--Photograph:-->

                                                                                <table width="140" height="140" border="0" align="center" cellpadding="0" cellspacing="7" bgcolor="#dadce1">
                                                                                    <tbody><tr>
                                                                                    <td width="126" height="135" align="center" bgcolor="#e2e4e5" valign="middle">
                                                                                    <img src="{{ asset('storage/uploads/'.(($candidate->dp) ? $candidate->dp : 'default_user.png'))}}" width="124" height="135">
                                                                                    </td>
                                                                                    </tr>
                                                                                </tbody></table>

                                                                            </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody></table>

                                                                <!---------------
                                                                CAREER OBJECTIVE:
                                                                ----------------->
                                                                @if($candidate->about_me)
                                                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="700">
                                                                        <tbody><tr>
                                                                             <td colspan="6" style="border-bottom:1px solid #000000;">&nbsp;</td>
                                                                             </tr>

                                                                             <tr><td colspan="6">&nbsp;</td></tr>

                                                                             <tr>
                                                                             <td colspan="6" class="HRBDHeadline01"><u>Career Objective:</u></td>
                                                                             </tr>

                                                                             <tr>
                                                                             <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                             {{ $candidate->about_me }}
                                                                             </td>
                                                                             </tr>
                                                                        </tbody>
                                                                    </table>
                                                                @endif
                                                                <!--------------
                                                                CAREER SUMMARY :
                                                                ---------------->

                                                                <!---------------------
                                                                SPECIAL QUALIFICATION :
                                                                ----------------------->

                                                                <!-------------------------------------------
                                                                EMPLOYMENT HISTORY, TOTAL YEAR OF EXPERIENCE:
                                                                --------------------------------------------->
                                                                @if(sizeof($candidate->candidateExperience))
                                                                    <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="700">
                                                                           <!--
                                                                           Employment History:
                                                                           -->
                                                                          <tbody><tr>
                                                                          <td colspan="6" class="HRBDHeadline01"><u>Employment History:</u></td>
                                                                          </tr>
                                                                          <!--Total Year of Experience:-->

                                                                               <tr>
                                                                                    @if(sizeof($candidate->candidateSkill))
                                                                                        <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                                            <strong>Total Year of Experience :</strong> {{ $candidate->candidateSkill->first()->experience }} Year(s)
                                                                                        </td>
                                                                                    @else
                                                                                        @php
                                                                                            $days = 0;
                                                                                            foreach($candidate->candidateExperience as $experience){
                                                                                                if($experience->end_date){
                                                                                                    $datetime1 = new DateTime(date("Y-m-d", strtotime($experience->start_date)));
                                                                                                    $datetime2 = new DateTime(date("Y-m-d", strtotime($experience->end_date)));
                                                                                                    $interval = $datetime1->diff($datetime2);
                                                                                                    $days += $interval->format('%R%a');
                                                                                                }else{
                                                                                                    $datetime1 = new DateTime(date("Y-m-d", strtotime($experience->start_date)));
                                                                                                    $datetime2 = new DateTime(date("Y-m-d"));
                                                                                                    $interval = $datetime1->diff($datetime2);
                                                                                                    $days += $interval->format('%a');
                                                                                                }
                                                                                            }

                                                                                        @endphp
                                                                                        <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                                            @php
                                                                                                $months = round($days / 30);
                                                                                                $years = 0;
                                                                                                if($months >= 12){
                                                                                                    $years = floor($months / 12);
                                                                                                    $months = $months % 12;
                                                                                                }

                                                                                                if($years == 1){
                                                                                                    $years = $years . ' Year';
                                                                                                }else if($years == 0){
                                                                                                    $years = '';
                                                                                                }else{
                                                                                                    $years = $years.' Years';
                                                                                                }

                                                                                                if($months == 1){
                                                                                                    $months = $months . ' Month';
                                                                                                }else if($months == 0){
                                                                                                    $months = '';
                                                                                                }else{
                                                                                                    $months = $months.' Months';
                                                                                                }
                                                                                            @endphp
                                                                                            <strong>Total Year of Experience :</strong> {{ $years.' '. $months }}
                                                                                        </td>
                                                                                    @endif
                                                                               </tr>
                                                                            @if(sizeof($candidate->candidateExperience))
                                                                                @php
                                                                                    $id = 1;
                                                                                @endphp
                                                                                @foreach($candidate->candidateExperience as $experience)
                                                                                    <tr>
                                                                                         <td width="22" align="center" style="padding-left:5px;" class="HRBDNormalText01">{{ $id++ }}.</td>
                                                                                         <td width="700" colspan="5" align="left" class="HRBDBoldText01">
                                                                                         <!--Position, DateFrom, DateTo:-->
                                                                                         <u>{{ $experience->jobDesignation->name }} ( {{ date('d M, Y', strtotime($experience->start_date)) }} - {{ ($experience->end_date) ?  date('d M, Y', strtotime($experience->end_date)) : 'Continuing' }})</u></td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td align="center" class="HRBDHeadline02">&nbsp;</td>
                                                                                        <td colspan="5" align="left" class="HRBDNormalText01">
                                                                                            <!--Company Name:-->
                                                                                            <strong>{{ $experience->company_name }}</strong>
                                                                                            <br>
                                                                                            <!--Department:-->
                                                                                            Department: {{ $experience->company_designation }}
                                                                                            <br>
                                                                                            <!--Area of Experience :-->
                                                                                            <!--IMPLEMENT LATER<br />-->

                                                                                            <!--Duties/Responsibilities:-->

                                                                                            <strong><i><u>Duties/Responsibilities:</u></i></strong>
                                                                                            <br>
                                                                                            {{ $experience->responsibility }}
                                                                                         </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif
                                                                    </tbody>
                                                                </table>
                                                                @endif
                                                                <!----------------------
                                                                'ACADEMIC QUALIFICATION:
                                                                ------------------------>
                                                                @if(sizeof($candidate->candidateEducation))
                                                                     <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="700">
                                                                          <tbody><tr>
                                                                         <td colspan="6" class="HRBDHeadline01"><u>Academic Qualification:</u></td>
                                                                         </tr>

                                                                         <tr>
                                                                         <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                         <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666">
                                                                                <tbody>
                                                                                    <tr class="HRBDNormalText02">
                                                                                        <td width="25%" class="border-right-ash"><strong>Exam Title</strong></td>
                                                                                        <td width="25%" class="border-right-ash"><strong>Concentration/Major</strong></td>
                                                                                        <td width="25%" class="border-right-ash"><strong>Institute</strong></td>
                                                                                        <td width="12.5%" class="border-right-ash"><strong>Result</strong></td>
                                                                                        <td width="12.5%"><strong>Pas.Year</strong></td>
                                                                                    </tr>
                                                                                    @foreach($candidate->candidateEducation as $education)
                                                                                    <tr class="HRBDNormalText02">
                                                                                    <!--Exam Title:-->
                                                                                        <td width="25%" class="border-right-ash border-top-ash">
                                                                                            {{ $education->level_of_education }}
                                                                                        </td>
                                                                                        <!--Concentration/Major:-->
                                                                                        <td width="25%" class="border-right-ash border-top-ash">
                                                                                            {{ $education->degree_title }}
                                                                                        </td>
                                                                                        <!--Institute:-->
                                                                                        <td width="25%" class="border-right-ash border-top-ash">
                                                                                            {{ $education->institution_name }}
                                                                                        </td>
                                                                                        <!--Result:-->
                                                                                        <td width="12.5%" class="border-right-ash border-top-ash">CGPA:{{ $education->gpa }}<br>out of {{ $education->out_of }}
                                                                                        </td>
                                                                                        <!--Passing Year:-->
                                                                                        <td width="12.5%" class="border-top-ash">
                                                                                            {{ ($education->passing_year) ? $education->passing_year : '-' }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                         </td>
                                                                         </tr>
                                                                     </tbody></table>
                                                                @endif

                                                                @if(sizeof($candidate->candidateTraining))
                                                                <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="700">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="6" class="HRBDHeadline01"><u>Training:</u></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666">
                                                                                    <tbody>
                                                                                        <tr class="HRBDNormalText02">
                                                                                            <td width="25%" class="border-right-ash"><strong>Training Title</strong></td>
                                                                                            <td width="25%" class="border-right-ash"><strong>Topic</strong></td>
                                                                                            <td width="12.5%" class="border-right-ash"><strong>Institute</strong></td>
                                                                                            <td width="12.5%" class="border-right-ash"><strong>Location</strong></td>
                                                                                            <td width="12.5%" class="border-right-ash"><strong>Year</strong></td>
                                                                                            <td width="12.5%"><strong>Duration</strong></td>
                                                                                        </tr>
                                                                                        @foreach($candidate->candidateTraining as $training)
                                                                                        <tr class="HRBDNormalText02">
                                                                                        <!--Exam Title:-->
                                                                                            <td width="25%" class="border-right-ash border-top-ash">
                                                                                                {{ $training->title }}
                                                                                            </td>
                                                                                            <!--Concentration/Major:-->
                                                                                            <td width="25%" class="border-right-ash border-top-ash">
                                                                                                {{ $training->topic_cover }}
                                                                                            </td>
                                                                                            <!--Institute:-->
                                                                                            <td width="12.5%" class="border-right-ash border-top-ash">
                                                                                                {{ $training->institution_name }}
                                                                                            </td>
                                                                                            <!--Result:-->
                                                                                            <td width="12.5%" class="border-right-ash border-top-ash">
                                                                                                {{ $training->location }}, {{ $training->country }}
                                                                                            </td>
                                                                                            <!--Passing Year:-->
                                                                                            <td width="12.5%" class="border-right-ash border-top-ash">
                                                                                                {{ $training->training_year }}
                                                                                            </td>

                                                                                            <!--Duration:-->
                                                                                            <td width="12.5%" class="border-top-ash">
                                                                                                {{ $training->duration }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                @endif
                                                                <!--------------------------
                                                                PROFESSIONAL QUALIFICATION:
                                                                --------------------------->
                                                                @if(sizeof($candidate->candidateProfessionalCertificate))
                                                                <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="700">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="6" class="HRBDHeadline01"><u>Professional Certificate:</u></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666">
                                                                                    <tbody>
                                                                                        <tr class="HRBDNormalText02">
                                                                                            <td width="25%" class="border-right-ash"><strong>Certificate Title</strong></td>
                                                                                            <td width="25%" class="border-right-ash"><strong>Institute</strong></td>
                                                                                            <td width="25%" class="border-right-ash"><strong>Location</strong></td>
                                                                                            <td width="12.5%" class="border-right-ash"><strong>Start Date</strong></td>
                                                                                            <td width="12.5%"><strong>End Date</strong></td>
                                                                                        </tr>
                                                                                        @foreach($candidate->candidateProfessionalCertificate as $certificate)
                                                                                        <tr class="HRBDNormalText02">
                                                                                        <!--Exam Title:-->
                                                                                            <td width="25%" class="border-right-ash border-top-ash">
                                                                                                {{ $certificate->certification }}
                                                                                            </td>
                                                                                            <!--Institute:-->
                                                                                            <td width="25%" class="border-right-ash border-top-ash">
                                                                                                {{ $certificate->institution_name }}
                                                                                            </td>
                                                                                            <!--Result:-->
                                                                                            <td width="25%" class="border-right-ash border-top-ash">
                                                                                                {{ $certificate->location }}
                                                                                            </td>
                                                                                            <!--Passing Year:-->
                                                                                            <td width="12.5%" class="border-right-ash border-top-ash">
                                                                                                {{ date('d M, Y', strtotime($certificate->start_date)) }}
                                                                                            </td>

                                                                                            <!--Duration:-->
                                                                                            <td width="12.5%" class="border-top-ash">
                                                                                                {{ date('d M, Y', strtotime($certificate->end_date)) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                @endif

                                                                <!---------------------------------
                                                                CAREER AND APPLICATION INFORMATION:
                                                                ----------------------------------->
                                                                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="700" style="margin-top:3px;">
                                                                        <!--
                                                                        Career and Application Information:
                                                                        -->
                                                                        <tbody><tr>
                                                                        <td colspan="6" class="HRBDHeadline01"><u>Career and Application Information:</u></td>
                                                                        </tr>

                                                                        <tr>
                                                                        <td colspan="6" align="left" class="HRBDNormalText01">
                                                                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                                                            <!--Looking For:-->

                                                                                <tbody>
                                                                                    @if(sizeof($candidate->candidateSkill))
                                                                                    <tr class="HRBDNormalText03">
                                                                                        <td width="35%" align="left" style="padding-left:5px;">Looking For</td>
                                                                                        <td width="2%" align="center">:</td>
                                                                                        <td width="63%" align="left">
                                                                                            @if($candidate->candidateSkill->first()->experience >= 1 && $candidate->candidateSkill->first()->experience <= 3)
                                                                                                Mid Level Job
                                                                                            @elseif($candidate->candidateSkill->first()->experience >= 4)
                                                                                                Expert Level Job
                                                                                            @else
                                                                                                Fresher Level Job
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>

                                                                                    <!--Available For:-->
                                                                                    <tr class="HRBDNormalText03">
                                                                                        <td width="35%" align="left" style="padding-left:5px;">Available  For</td>

                                                                                        <td width="2%" align="center">:</td>
                                                                                        <td width="63%" align="left">
                                                                                            {{ sizeof($candidate->candidateSkill) ? $candidate->candidateSkill->first()->jobLevel->name : '' }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                            @if(sizeof($candidate->candidateSkill))
                                                                                <!--Preferred Job Category:-->
                                                                                <tr class="HRBDNormalText03">
                                                                                    <td width="35%" align="left" style="padding-left:5px;">Preferred  Job Category</td>
                                                                                    <td width="2%" align="center">:</td>
                                                                                    <td width="63%" align="left">
                                                                                        {{ sizeof($candidate->candidateSkill) ? $candidate->candidateSkill->first()->jobCategory->name : '' }}
                                                                                    </td>
                                                                                </tr>

                                                                                <!--Preferred Job Category:-->
                                                                                <tr class="HRBDNormalText03">
                                                                                    <td width="35%" align="left" style="padding-left:5px;">Preferred  Job Designation</td>
                                                                                    <td width="2%" align="center">:</td>
                                                                                    <td width="63%" align="left">
                                                                                        {{ sizeof($candidate->candidateSkill) ? $candidate->candidateSkill->first()->jobDesignation->name : '' }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endif

                                                                            <!--Preferred District:-->

                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="35%" align="left" style="padding-left:5px;">Preferred  District </td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="63%" align="left">
                                                                                {{ ($candidate->city) ? $candidate->city : 'Anywhere' }}
                                                                            </td>
                                                                            </tr>

                                                                            <!--Preferred Country:-->

                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="35%" align="left" style="padding-left:5px;">Preferred  Country </td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="63%" align="left">
                                                                                {{ ($candidate->country) ? $candidate->country : 'Anywhere' }}
                                                                            </td>
                                                                            </tr>

                                                                        </tbody></table>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody></table>


                                                                <!--
                                                                Specialization:
                                                                -->


                                                                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="700" style="margin-top:3px;">
                                                                         <tbody><tr>
                                                                        <td colspan="6" class="HRBDHeadline01"><u>Specialization:</u></td>
                                                                        </tr>

                                                                               <tr>
                                                                             <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                             <table border="0" cellpadding="0" cellspacing="0" align="center" width="700" style="border:1px solid #666666">
                                                                                <tbody><tr>

                                                                                     <td width="40%" class="HRBDNormalText02" style="border-right:1px solid #666666;border-bottom:1px solid #666666;">
                                                                                     <strong>Fields of Specialization</strong>
                                                                                     </td>

                                                                                  </td>
                                                                               </tr>

                                                                                <tr>

                                                                                    <td align="left" class="HRBDNormalText03" style="border-right:1px solid #666666;">

                                                                                        <div class="skill">
                                                                                            @foreach($candidate->candidateSkill as $can_skill)
                                                                                            <span>{{ $can_skill->skill->name }}</span>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </td>
                                                                                </tr>
                                                                             </tbody></table>
                                                                             </td>
                                                                             </tr>

                                                                </tbody></table>

                                                                <!--
                                                                PERSONAL DETAILS:
                                                                -->

                                                                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="700" style="margin-top:3px;">
                                                                        <!--
                                                                        Personal Details
                                                                        -->
                                                                        <tbody><tr>
                                                                        <td colspan="6" class="HRBDHeadline01"><u>Personal Details :</u></td>
                                                                        </tr>

                                                                        <tr>
                                                                        <td colspan="6" align="left" class="HRBDNormalText01">
                                                                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                                                            <!--Fathers Name:-->

                                                                                 <tbody><tr class="HRBDNormalText03">
                                                                                 <td width="22%" align="left" style="padding-left:5px;">Father's Name </td>
                                                                                 <td width="2%" align="center">:</td>
                                                                                 <td width="76%" align="left">
                                                                                    {{ $candidate->father_name }}
                                                                                 </td>
                                                                                 </tr>

                                                                            <!--Mothers Name:-->

                                                                                 <tr class="HRBDNormalText03">
                                                                                 <td width="22%" align="left" style="padding-left:5px;">Mother's Name </td>
                                                                                 <td width="2%" align="center">:</td>
                                                                                 <td width="76%" align="left">
                                                                                 {{ $candidate->mother_name }}
                                                                                 </td>
                                                                                 </tr>

                                                                            <!--Date of Birth:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Date  of Birth</td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                                {{ date('d M, Y', strtotime($candidate->date_of_birth)) }}
                                                                            </td>
                                                                            </tr>
                                                                            <!--Gender:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Gender</td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                                {{ $candidate->gender }}
                                                                            </td>
                                                                            </tr>
                                                                            <!--Marital Status:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Marital  Status </td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                            {{ $candidate->marital_status }}
                                                                            </td>
                                                                            </tr>
                                                                            <!--Nationality:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td align="left" style="padding-left:5px;">Nationality</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            {{ $candidate->nationality }}
                                                                            </td>
                                                                            </tr>

                                                                            <tr class="HRBDNormalText03">
                                                                            <td align="left" style="padding-left:5px;">National Id No.</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            {{ $candidate->nid_passport }}
                                                                            </td>
                                                                            </tr>


                                                                            <!--Permanent Address:-->

                                                                                 <tr class="HRBDNormalText03">
                                                                                 <td align="left" style="padding-left:5px;">Permanent  Address</td>
                                                                                 <td align="center">:</td>
                                                                                 <td align="left">
                                                                                    {{ $candidate->permanent_address }}
                                                                                 </td>
                                                                                 </tr>

                                                                            <!--Current Location:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td align="left" style="padding-left:5px;">Current  Location</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            {{ $candidate->current_address }}
                                                                            </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody></table>
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
