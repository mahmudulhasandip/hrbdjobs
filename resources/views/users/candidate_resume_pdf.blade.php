<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
		/* view resume */
		body{
			color: #666;
		}

		#resume table {
		    max-width: 100%;
		    background-color: transparent;
		    margin: auto;
		}

		#resume table td {
		    margin: auto;
		    
		}

		#resume table td ul{
		    list-style-type: disc;
		    padding-left: 35px;
		    margin-bottom: 10px;
		    margin-top: 10px;
		}

		.HRBDApplicantsName {
		    background: #ffffff;
		    font-size: 18px;
		    font-family: Verdana, Geneva, sans-serif;
		    font-weight: bold;
		    color: #333399;
		    padding-left: 7px;
		    padding-top: 16px;
		    padding-bottom: 3.5px;
		    vertical-align: middle;
		}

		.HRBDApplicantsName span{
		    background: #FFFFFF;
		    font-size: 14px;
		    font-family: Verdana, Geneva, sans-serif;
		    color: #666;
		    font-weight: normal;
		    padding-left: 2px;
		    padding-top: 7px;
		    padding-bottom: 10px;
		}

		.HRBDApplicantsName table{
		    margin: 0 !important;
		}

		.HRBDNormalText04 {
		    background: #FFFFFF;
		    font-size: 14px;
		    font-family: Verdana, Geneva, sans-serif;
		    font-weight: normal;
		    padding-left: 7px;
		    padding-top: 2px;
		    padding-bottom: 2px;
		}

		.HRBDHeadline01 {
		    background: #E6E6E6;
		    font-size: 16px;
		    font-family: Verdana, Geneva, sans-serif;
		    font-weight: bold;
		    padding-left: 4px;
		    padding-top: 4px;
		    padding-bottom: 4px;
		    text-align: left
		}

		.HRBDNormalText01 {
		    background: #FFFFFF;
		    font-size: 14px;
		    font-family: Verdana, Geneva, sans-serif;
		    font-weight: normal;
		    padding-left: 2px;
		    padding-top: 7px;
		    padding-bottom: 10px;
		}

		.HRBDBoldText01 {
		    background: #FFFFFF;
		    font-size: 14px;
		    font-family: Verdana, Geneva, sans-serif;
		    font-weight: bold;
		    padding-left: 2px;
		    padding-top: 2px;
		    padding-bottom: 2px;
		}

		.HRBDNormalText02 {
		    background: #FFFFFF;
		    font-size: 14px;
		    font-family: Verdana, Geneva, sans-serif;
		    font-weight: normal;
		    padding-left: 4px;
		    padding-top: 4px;
		    padding-bottom: 4px;
		    text-align: center;
		}

		.HRBDNormalText03 {
		    background: #FFFFFF;
		    font-size: 14px;
		    font-family: Verdana, Geneva, sans-serif;
		    font-weight: normal;
		    padding-left: 7px;
		    padding-top: 4px;
		    padding-bottom: 4px;
		    text-align: center;
		}
		.HRBDNormalText03 > .skill{
		    text-align: left;
		    margin-top: 10px;
		}
		.HRBDNormalText03 > .skill >span{
		    display: inline-block;
		    padding: 5px 10px;
		    border: 1px solid #666;
		    border-radius: 20px;
		    font-size: 14px;
		    margin-right: 10px;
		    margin-bottom: 10px;
		    color: #666;
		}


		.border-right-ash{
		    border-right: 1px solid #666;
		}
		.border-top-ash{
		    border-top: 1px solid #666;
		}

		.border-left-ash{
		    border-left: 1px solid #666;
		}
		.border-bottom-ash{
		    border-bottom: 1px solid #666;
		}
	</style>
	<style>
	#resume{
	    page-break-after: always;
	}
	</style>
</head>
<body>
	<div id="resume">	
        	
        <table border="0" cellpadding="0" cellspacing="0" align="center" width="500">
        
    
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
                    
                    
                    </tr>
                </tbody></table>
                </td>
                </tr>
            </tbody></table>
            
        <!---------------
        CAREER OBJECTIVE:
        ----------------->
        @if($candidate->about_me)
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="500">	
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
            <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="450">
                   <!--
                   Employment History:
                   -->
                  <tbody>
                  	<tr>
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
                                 <td width="500" colspan="5" align="left" class="HRBDBoldText01">
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
             <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="500">
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
                                    {{ $education->candidateInstitute->name }}
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
        <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="500">
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
        <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="500">
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
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="500" style="margin-top:3px;">
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
                                    {{ $candidate->candidateSkill->first()->jobLevel->name }}
                                </td>
                            </tr>
                        @endif
                    @if(sizeof($candidate->candidateSkill))
                        <!--Preferred Job Category:-->
                        <tr class="HRBDNormalText03">
                            <td width="35%" align="left" style="padding-left:5px;">Preferred  Job Category</td>
                            <td width="2%" align="center">:</td>
                            <td width="63%" align="left">
                                {{ $candidate->candidateSkill->first()->jobCategory->name }}
                            </td>
                        </tr>

                        <!--Preferred Job Category:-->
                        <tr class="HRBDNormalText03">
                            <td width="35%" align="left" style="padding-left:5px;">Preferred  Job Designation</td>
                            <td width="2%" align="center">:</td>
                            <td width="63%" align="left">
                                {{ $candidate->candidateSkill->first()->jobDesignation->name }}
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
        
        
             <table border="0" cellpadding="0" cellspacing="0" align="center" width="500" style="margin-top:3px;">
                 <tbody><tr>
                <td colspan="6" class="HRBDHeadline01"><u>Specialization:</u></td>
                </tr>
                         
                       <tr>
                     <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="500" style="border:1px solid #666666">
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
        
             <table border="0" cellpadding="0" cellspacing="0" align="center" width="500" style="margin-top:3px;">
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
</body>
</html>