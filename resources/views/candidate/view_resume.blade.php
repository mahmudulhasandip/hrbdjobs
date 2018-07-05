@extends('candidate.layout.app')

@section('title', 'HRHRBDobs | Candidate Dashboard')

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
                                        <div class="block p0">
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
                                                                <a href="{{ route('candidate.uploaded.resume.view') }}" target="_blank" title="">Download CV <i class="la la-download"></i></a>
                                                            </div>
                                                            <div id="resume">	
        	
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="750">
                                                                
                                                                
                                                                
                                                                        <tbody><tr>
                                                                        <td colspan="6">
                                                                        <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody><tr>
                                                                            <td width="73%" height="" align="left" valign="bottom" class="HRBDApplicantsName">
                                                                            <!--Applicant's Name:-->
                                                                            MD. MAHMUDUL HASAN
                                                                            </td>
                                                                            
                                                                            <td width="27%" rowspan="2" align="right" valign="bottom">
                                                                            <!--Photograph:-->
                                                                            
                                                                                <table width="140" height="140" border="0" align="center" cellpadding="0" cellspacing="7" bgcolor="#dadce1">
                                                                                    <tbody><tr> 
                                                                                    <td width="126" height="135" align="center" bgcolor="#e2e4e5" valign="middle"> 
                                                                                    <img src="https://my.bdjobs.com/photos/3075001-3100000/1243077638t8p0r.jpg" width="124" height="135">
                                                                                    </td>
                                                                                    </tr>
                                                                                </tbody></table>
                                                                            
                                                                            </td>
                                                                            </tr>
                                                                    
                                                                            <tr>
                                                                            <td class="HRBDNormalText04" align="left" valign="middle">
                                                                            <!--Contact Address:-->
                                                                            
                                                                                 Address: H# 104, R# 8, Shekhertek, Adabor, Dhaka 		 
                                                                            <!--Home Phone:-->
                                                                            
                                                                                 <br>
                                                                                 Mobile No 1: 01737849573	 
                                                                            <!--Office Phone:-->
                                                                            
                                                                            <!--Mobile:-->
                                                                            
                                                                                 <br>		
                                                                                 e-mail : mhdip.pro@gmail.com
                                                                            </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                    
                                                                <!---------------
                                                                CAREER OBJECTIVE:
                                                                ----------------->
                                                                
                                                                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="750">	
                                                                         <tbody><tr>
                                                                         <td colspan="6" style="border-bottom:1px solid #000000;">&nbsp;</td>
                                                                         </tr>
                                                                          
                                                                         <tr><td colspan="6">&nbsp;</td></tr>		 
                                                                         
                                                                         <tr>
                                                                         <td colspan="6" class="HRBDHeadline01"><u>Career Objective:</u></td>
                                                                         </tr>
                                                                         
                                                                         <tr>
                                                                         <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                         To work for an organization which provides me the opportunity to improve my skills and
                                                                knowledge of growth along with the organization objective.	
                                                                         </td>
                                                                         </tr>		
                                                                    </tbody></table>
                                                                
                                                                <!--------------
                                                                CAREER SUMMARY :
                                                                ---------------->
                                                                
                                                                <!---------------------
                                                                SPECIAL QUALIFICATION :
                                                                ----------------------->
                                                                         
                                                                <!-------------------------------------------
                                                                EMPLOYMENT HISTORY, TOTAL YEAR OF EXPERIENCE:
                                                                --------------------------------------------->
                                                                
                                                                     <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="750">
                                                                           <!--
                                                                           Employment History:
                                                                           -->
                                                                          <tbody><tr>
                                                                          <td colspan="6" class="HRBDHeadline01"><u>Employment History:</u></td>
                                                                          </tr>
                                                                          <!--Total Year of Experience:-->
                                                                          
                                                                               <tr>
                                                                               <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                               <strong>Total Year of Experience :</strong> 1.6 Year(s)
                                                                               </td>
                                                                               </tr>
                                                                           
                                                                                     <tr>
                                                                                     <td width="22" align="center" style="padding-left:5px;" class="HRBDNormalText01">1.</td>
                                                                                     <td width="750" colspan="5" align="left" class="HRBDBoldText01">
                                                                                     <!--Position, DateFrom, DateTo:-->					 
                                                                                     <u>Web Developer ( December 1, 2016 - Continuing)</u></td>
                                                                                     </tr>	
                                                                        
                                                                                     <tr>
                                                                                     <td align="center" class="HRBDHeadline02">&nbsp;</td>
                                                                                     <td colspan="5" align="left" class="HRBDNormalText01">
                                                                                     <!--Company Name:-->
                                                                                     <strong>Flick Max Ltd.</strong>
                                                                                     <br>
                                                                                     <!--Company Location:-->
                                                                                     
                                                                                          Company Location : Boro Moghbazar, Dhaka, Bangladesh
                                                                                          <br>
                                                                                     
                                                                                     
                                                                                     <!--Department:-->
                                                                                     
                                                                                          Department: Web Development
                                                                                           <br>
                                                                                     
                                                                                     
                                                                                     <!--Area of Experience :-->
                                                                                     <!--IMPLEMENT LATER<br />-->
                                                                                     
                                                                                     <!--Duties/Responsibilities:-->
                                                                                     
                                                                                          <strong><i><u>Duties/Responsibilities:</u></i></strong>
                                                                                           <br>
                                                                                           I am working here as a frontend developer and backend support.	  
                                                                                     </td>
                                                                                     </tr>
                                                                               
                                                                    </tbody></table>
                                                                        
                                                                <!----------------------
                                                                'ACADEMIC QUALIFICATION:
                                                                ------------------------>
                                                                
                                                                     <table border="0" cellpadding="0" style="margin-top:3px;" cellspacing="0" align="center" width="750">
                                                                          <tbody><tr>
                                                                         <td colspan="6" class="HRBDHeadline01"><u>Academic Qualification:</u></td>
                                                                         </tr>
                                                                    
                                                                         <tr>
                                                                         <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                         <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666">
                                                                               <tbody><tr class="HRBDNormalText02">
                                                                              <td width="25%" align="center" style="border-right:1px solid #666666"><strong>Exam Title</strong></td>
                                                                              <td width="25%" align="center" style="border-right:1px solid #666666"><strong>Concentration/Major</strong></td>
                                                                              <td width="25%" align="center" style="border-right:1px solid #666666"><strong>Institute</strong></td>
                                                                              <td width="12.5%" align="center" style="border-right:1px solid #666666"><strong>Result</strong></td>
                                                                              
                                                                                   <td width="12.5%" align="center"><strong>Pas.Year</strong></td>
                                                                              
                                                                              </tr>			 
                                                                              
                                                                                    <tr class="HRBDNormalText02">
                                                                                    <!--Exam Title:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    Bachelor of Science (BSc)
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Concentration/Major:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    Computer Science &amp; Engineering
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Institute:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    United International University	
                                                                                    &nbsp;				
                                                                                    </td>
                                                                                    <!--Result:-->
                                                                                    <td width="12.5%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    CGPA:2.94<br>out of 4
                                                                                    &nbsp;					
                                                                                    </td>
                                                                                    <!--Passing Year:-->
                                                                                    
                                                                                         <td width="12.5%" style="border-top:1px solid #666666" align="center">
                                                                                         2018
                                                                                         &nbsp;
                                                                                         </td>
                                                                                    
                                                                                    </tr><tr class="HRBDNormalText02">
                                                                                    <!--Exam Title:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    HSC
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Concentration/Major:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    Science
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Institute:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    Rangpur Govt. College	
                                                                                    &nbsp;				
                                                                                    </td>
                                                                                    <!--Result:-->
                                                                                    <td width="12.5%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    CGPA:4.2<br>out of 5
                                                                                    &nbsp;					
                                                                                    </td>
                                                                                    <!--Passing Year:-->
                                                                                    
                                                                                         <td width="12.5%" style="border-top:1px solid #666666" align="center">
                                                                                         2011
                                                                                         &nbsp;
                                                                                         </td>
                                                                                    
                                                                                    </tr><tr class="HRBDNormalText02">
                                                                                    <!--Exam Title:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    SSC
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Concentration/Major:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    Science
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Institute:-->
                                                                                    <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    Rangpur Zilla School	
                                                                                    &nbsp;				
                                                                                    </td>
                                                                                    <!--Result:-->
                                                                                    <td width="12.5%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                                    CGPA:5<br>out of 5
                                                                                    &nbsp;					
                                                                                    </td>
                                                                                    <!--Passing Year:-->
                                                                                    
                                                                                         <td width="12.5%" style="border-top:1px solid #666666" align="center">
                                                                                         2009
                                                                                         &nbsp;
                                                                                         </td>
                                                                                             
                                                                         </tr></tbody></table> 
                                                                         </td>
                                                                         </tr>
                                                                     </tbody></table>
                                                                
                                                                
                                                                
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="margin-top:3px;">
                                                                     <tbody><tr>
                                                                     <td colspan="6" class="HRBDHeadline01"><u>Training Summary:</u></td>
                                                                     </tr>
                                                                
                                                                     <tr>
                                                                     <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:1px solid #666666">
                                                                          <tbody><tr class="HRBDNormalText02">
                                                                         <td width="19%" align="center" style="border-right:1px solid #666666"><strong>Training Title</strong></td>
                                                                         <td width="19%" align="center" style="border-right:1px solid #666666"><strong>Topic</strong></td>
                                                                         <td width="15%" align="center" style="border-right:1px solid #666666"><strong>Institute</strong></td>
                                                                         <td width="15%" align="center" style="border-right:1px solid #666666"><strong>Country</strong></td>
                                                                         <td width="15%" align="center" style="border-right:1px solid #666666"><strong>Location</strong></td>
                                                                         <td width="2%" align="center" style="border-right:1px solid #666666"><strong>Year</strong></td>
                                                                         <td width="15%" align="center"><strong>Duration</strong></td>
                                                                         </tr>
                                                                         
                                                                               <tr class="HRBDNormalText02">
                                                                               <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                               Full stack Web Development
                                                                               &nbsp;
                                                                               </td>
                                                                               <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666; padding-left:1px;">
                                                                               HTML, css, Bootstrap, JavaScript, Jquery, PHP
                                                                               &nbsp;			   
                                                                               </td>
                                                                               <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                               Coderstrust Bangladesh
                                                                               &nbsp;
                                                                               </td>
                                                                               <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                               Bangladesh
                                                                               &nbsp;
                                                                               </td>
                                                                               <td width="15%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                               Dhanmondi, Dhaka
                                                                               &nbsp;
                                                                               </td>
                                                                               <td width="10%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">
                                                                               2016
                                                                               &nbsp;
                                                                               </td>
                                                                               <td width="15%" align="center" style="border-top:1px solid #666666;">
                                                                               8 months
                                                                               &nbsp;
                                                                               </td>
                                                                               </tr>
                                                                         
                                                                     </tbody></table>
                                                                     </td>
                                                                     </tr>
                                                                     </tbody></table>
                                                                
                                                                
                                                                <!--------------------------
                                                                PROFESSIONAL QUALIFICATION:
                                                                --------------------------->
                                                                    
                                                                <!---------------------------------
                                                                CAREER AND APPLICATION INFORMATION:
                                                                ----------------------------------->
                                                                
                                                                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="margin-top:3px;">
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
                                                                            
                                                                                 <tbody><tr class="HRBDNormalText03">
                                                                                 <td width="32%" align="left" style="padding-left:5px;">Looking For</td>
                                                                                 <td width="2%" align="center">:</td>
                                                                                 <td width="66%" align="left">
                                                                                 Mid Level Job
                                                                                 </td>
                                                                                 </tr>
                                                                            
                                                                            <!--Available For:-->
                                                                            
                                                                                 <tr class="HRBDNormalText03">
                                                                                 <td width="32%" align="left" style="padding-left:5px;">Available  For</td>
                                                                                 <td width="2%" align="center">:</td>
                                                                                 <td width="66%" align="left">
                                                                                 Full Time
                                                                                 </td>
                                                                                 </tr>
                                                                            
                                                                            <!--Present Salary:-->
                                                                            
                                                                                      <tr class="HRBDNormalText03">
                                                                                      <td width="32%" align="left" style="padding-left:5px;">Present Salary</td>
                                                                                      <td width="2%" align="center">:</td>
                                                                                      <td width="66%" align="left">Tk. 22000</td>
                                                                                      </tr>
                                                                                 
                                                                            <!--Expected Salary:-->
                                                                
                                                                                      <tr class="HRBDNormalText03">
                                                                                      <td width="32%" align="left" style="padding-left:5px;">Expected Salary</td>
                                                                                      <td width="2%" align="center">:</td>
                                                                                      <td width="66%" align="left">Tk. 30000</td>
                                                                                      </tr>
                                                                
                                                                            <!--Preferred Job Category:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="32%" align="left" style="padding-left:5px;">Preferred  Job Category</td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="66%" align="left">
                                                                            Engineer/Architect, IT/Telecommunication
                                                                            </td>
                                                                            </tr>
                                                                            <!--Preferred District:-->
                                                                            
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="32%" align="left" style="padding-left:5px;">Preferred  District </td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="66%" align="left">
                                                                            Dhaka			
                                                                            </td>
                                                                            </tr>
                                                                             
                                                                            <!--Preferred Country:-->
                                                                                    
                                                                            <!--Preferred Organization Types:-->
                                                                           
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="32%" align="left" style="padding-left:5px;" valign="top">Preferred  Organization Types</td>
                                                                            <td width="2%" align="center" valign="top">:</td>
                                                                            <td width="66%" align="left">
                                                                            Software Company, IT Enabled Service, Developer
                                                                            </td>
                                                                            </tr>
                                                                            
                                                                        </tbody></table>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                
                                                                
                                                                <!--
                                                                Specialization:
                                                                -->
                                                                
                                                                
                                                                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="margin-top:3px;">
                                                                         <tbody><tr>
                                                                        <td colspan="6" class="HRBDHeadline01"><u>Specialization:</u></td>
                                                                        </tr>
                                                                                 
                                                                               <tr>
                                                                             <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                             <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="border:1px solid #666666">
                                                                                <tbody><tr>
                                                                                
                                                                                     <td width="40%" class="HRBDNormalText02" align="center" style="border-right:1px solid #666666;border-bottom:1px solid #666666;">
                                                                                     <strong>Fields of Specialization</strong>
                                                                                     </td>
                                                                                
                                                                                     <td width="60%" class="HRBDNormalText02" align="center" style="border-bottom:1px solid #666666;">
                                                                                          <strong>Description</strong>
                                                                                  </td>
                                                                               </tr>
                                                                                
                                                                                <tr>
                                                                                
                                                                                     <td width="40%" align="left" class="HRBDNormalText03" style="border-right:1px solid #666666;">
                                                                                          <ul><li> Bootstrap</li><li> JavaScript</li><li> jQuery</li><li> AngularJS</li><li> PHP</li><li> Laravel Framework</li><li> HTML5 &amp; CSS3</li><li> MySQL</li><li> Adobe Photoshop/ Illustrator</li><li> MS Word/ Excel/ PowerPoint/ OneNote</li></ul><br> 
                                                                                          &nbsp;
                                                                                  </td>
                                                                                
                                                                                     <td width="60%" align="left" class="HRBDNormalText03">
                                                                                          I am an expert front-end developer. Advanced knowledge on html5, CSS, bootstrap, jquery libraries, javascript, PHP. Currently working on angular javascript framework and laravel.
                                                                                          &nbsp;
                                                                                  </td>
                                                                                          
                                                                                </tr>		
                                                                             </tbody></table>	
                                                                             </td>
                                                                             </tr>
                                                                        
                                                                </tbody></table>
                                                                
                                                                <!--
                                                                EXTRA CURRICULAR ACTIVITIES, LANGUAGE PROFICIENCY:
                                                                -->
                                                                
                                                                          <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="margin-top:3px;">
                                                                              <!--
                                                                              Extra Curricular Activities:
                                                                              -->
                                                                              <tbody><tr>
                                                                              <td colspan="6" class="HRBDHeadline01"><u>Extra Curricular Activities:</u></td>
                                                                              </tr>
                                                                        
                                                                              <tr>
                                                                              <td colspan="6" align="left" style="padding-left:5px;" class="HRBDNormalText01">
                                                                              Member of UIU Computer Club.
                                                                I am a guitarist. Love to listen to music and play guitar.
                                                                              </td>
                                                                              </tr>
                                                                           </tbody></table>
                                                                     
                                                                <!--
                                                                Language Proficiency:
                                                                -->
                                                                
                                                                <!--
                                                                PERSONAL DETAILS:
                                                                -->
                                                                
                                                                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="margin-top:3px;">
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
                                                                                 (Late) Md. Abdul Mannan
                                                                                 </td>
                                                                                 </tr>
                                                                            
                                                                            <!--Mothers Name:-->
                                                                            
                                                                                 <tr class="HRBDNormalText03">
                                                                                 <td width="22%" align="left" style="padding-left:5px;">Mother's Name </td>
                                                                                 <td width="2%" align="center">:</td>
                                                                                 <td width="76%" align="left">
                                                                                 Mst. Dilruba Akter
                                                                                 </td>
                                                                                 </tr>
                                                                            
                                                                            <!--Date of Birth:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Date  of Birth</td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                             April 10, 1994	 
                                                                            </td>
                                                                            </tr>
                                                                            <!--Gender:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Gender</td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                            Male
                                                                            </td>
                                                                            </tr>
                                                                            <!--Marital Status:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Marital  Status </td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                            Unmarried
                                                                            </td>
                                                                            </tr>
                                                                            <!--Nationality:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td align="left" style="padding-left:5px;">Nationality</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            Bangladeshi
                                                                            </td>
                                                                            </tr>
                                                                            
                                                                            <tr class="HRBDNormalText03">
                                                                            <td align="left" style="padding-left:5px;">National Id No.</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            19948524910000068
                                                                            </td>
                                                                            </tr>
                                                                            
                                                                            <!--Religion:-->
                                                                            
                                                                                 <tr class="HRBDNormalText03">
                                                                                 <td align="left" style="padding-left:5px;">Religion</td>
                                                                                 <td align="center">:</td>
                                                                                 <td align="left">
                                                                                 Islam
                                                                                 </td>
                                                                                 </tr>
                                                                            
                                                                            <!--Permanent Address:-->
                                                                            
                                                                                 <tr class="HRBDNormalText03">
                                                                                 <td align="left" style="padding-left:5px;">Permanent  Address</td>
                                                                                 <td align="center">:</td>
                                                                                 <td align="left">
                                                                                 H# 206, R# 1, Shalbon, Rangpur
                                                                                 </td>
                                                                                 </tr>
                                                                            
                                                                            <!--Current Location:-->
                                                                            <tr class="HRBDNormalText03">
                                                                            <td align="left" style="padding-left:5px;">Current  Location</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">			
                                                                            Adabor			
                                                                            </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                    
                                                                <!--
                                                                REFERENCE:
                                                                -->
                                                                
                                                                     <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="margin-top:3px;">
                                                                        <!--
                                                                        Reference:
                                                                        -->
                                                                        <tbody><tr>
                                                                        <td colspan="6" class="HRBDHeadline01"><u>Reference (s):</u></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                        <td colspan="6" align="left" class="HRBDNormalText01">
                                                                        <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0">
                                                                            
                                                                                <tbody><tr class="HRBDNormalText03">
                                                                                <td width="22%" align="left">&nbsp;</td>
                                                                                <td width="2%" align="center">&nbsp;</td>			
                                                                                <td width="35%" align="left" class="HRBDBoldText01" style="border-right:1px solid #666666;"><u>Reference: 01</u></td>
                                                                                <td width="41%" align="left" class="HRBDBoldText01" style="padding-left:15px;"><u>Reference: 02</u></td>
                                                                                </tr>
                                                                            
                                                                                  <!--Name:-->
                                                                                   
                                                                                      <tr class="HRBDNormalText03">
                                                                                    
                                                                                      <td width="22%" align="left" style="padding-left:5px;">Name </td>
                                                                                      <td width="2%" align="center">:</td>
                                                                                      <td width="35%" align="left" style="border-right:1px solid #666666;">
                                                                                      Md. Mofijul Islam Akash
                                                                                      &nbsp;
                                                                                      </td>
                                                                                      
                                                                                          <td width="41%" align="left">
                                                                                          Md. Shamsul Alam
                                                                                          </td>
                                                                                        
                                                                                      </tr>
                                                                                    
                                                                                  <!--Organization:-->
                                                                                   
                                                                                  <tr class="HRBDNormalText03">
                                                                                  
                                                                                  <td width="22%" align="left" style="padding-left:5px;">Organization</td>
                                                                                  <td width="2%" align="center">:</td>
                                                                                  <td width="35%" align="left" style="border-right:1px solid #666666;">
                                                                                  University of Dhaka
                                                                                  &nbsp;
                                                                                  </td>
                                                                                  
                                                                                      <td width="41%" align="left">
                                                                                      Dshe, Dhaka				  
                                                                                      </td>
                                                                                  
                                                                                  </tr>
                                                                                   
                                                                                  <!--Designation:-->	 
                                                                                  
                                                                                      <tr class="HRBDNormalText03">
                                                                                     
                                                                                      <td width="22%" align="left" style="padding-left:5px;">Designation</td>
                                                                                      <td width="2%" align="center">:</td>
                                                                                      <td width="35%" align="left" style="border-right:1px solid #666666;">
                                                                                      Lecturer
                                                                                      &nbsp;
                                                                                      </td>
                                                                                      
                                                                                              <td width="41%" align="left">
                                                                                              Assistant director (Secondary)				  
                                                                                              </td>
                                                                                         
                                                                                      </tr>
                                                                                 
                                                                                  <!--Address:-->
                                                                                
                                                                                      <tr class="HRBDNormalText03">
                                                                                      
                                                                                      <td width="22%" align="left" style="padding-left:5px;">Address</td>
                                                                                      <td width="2%" align="center">:</td>
                                                                                      <td width="35%" align="left" style="border-right:1px solid #666666;">
                                                                                      Dept. of Computer Science and Engineering,
                                                                University of Dhaka
                                                                Dhaka-1000, Bangladesh
                                                                                      &nbsp;
                                                                                      </td>
                                                                                         
                                                                                          <td width="41%" align="left">
                                                                                          Dshe, Dhaka				  
                                                                                          </td>
                                                                                       
                                                                                      </tr>
                                                                                 
                                                                                  <!--Phone(Off):-->	
                                                                                 
                                                                                      <tr class="HRBDNormalText03">
                                                                                     
                                                                                      <td width="22%" align="left" style="padding-left:5px;">Phone (Off.) </td>
                                                                                      <td width="2%" align="center">:</td>
                                                                                      <td width="35%" align="left" style="border-right:1px solid #666666;">
                                                                                      
                                                                                      &nbsp;
                                                                                      </td>
                                                                                      
                                                                                          <td width="41%" align="left">
                                                                                                            
                                                                                          </td>
                                                                                       
                                                                                      </tr>
                                                                                   
                                                                                  <!--Phone(Res):-->
                                                                                   
                                                                                      <tr class="HRBDNormalText03">
                                                                                      
                                                                                      <td align="left" style="padding-left:5px;">Phone (Res.) </td>
                                                                                      <td align="center">:</td>
                                                                                      <td align="left" style="border-right:1px solid #666666;">
                                                                                      
                                                                                      &nbsp;
                                                                                      </td>
                                                                                      
                                                                                          <td align="left">
                                                                                          02-9560265				  
                                                                                          </td>
                                                                                      
                                                                                      </tr>
                                                                                   
                                                                                  <!--Mobile:-->
                                                                                   
                                                                                      <tr class="HRBDNormalText03">
                                                                                     
                                                                                      <td align="left" style="padding-left:5px;">Mobile</td>
                                                                                      <td align="center">:</td>
                                                                                      <td align="left" style="border-right:1px solid #666666;">
                                                                                      01672881709
                                                                                      &nbsp;
                                                                                      </td>
                                                                                       
                                                                                          <td align="left">
                                                                                          01712206004				  
                                                                                          </td>
                                                                                     
                                                                                      </tr>
                                                                                  
                                                                                  <!--E-Mail:-->
                                                                                      
                                                                                      <tr class="HRBDNormalText03">
                                                                                      
                                                                                      <td align="left" style="padding-left:5px;">E-Mail</td>
                                                                                      <td align="center">:</td>
                                                                                      <td align="left" style="border-right:1px solid #666666;">
                                                                                      akash@cse.du.ac.bd
                                                                                      &nbsp;
                                                                                      </td>
                                                                                      
                                                                                          <td align="left">
                                                                                                            
                                                                                          </td>
                                                                                      
                                                                                      </tr>
                                                                                  
                                                                                  <!--Relation:-->
                                                                                  
                                                                                      <tr class="HRBDNormalText03">
                                                                                      
                                                                                      <td align="left" style="padding-left:5px;">Relation</td>
                                                                                      <td align="center">:</td>
                                                                                      <td align="left" style="border-right:1px solid #666666;">
                                                                                      Academic
                                                                                      &nbsp;
                                                                                      </td>
                                                                                     
                                                                                          <td align="left">
                                                                                          Relative				  				  
                                                                                          </td>
                                                                                        
                                                                                      </tr>
                                                                                  
                                                                                  
                                                                                  <tr class="HRBDNormalText03">
                                                                                  <td align="left">&nbsp;</td>
                                                                                  <td align="center">&nbsp;</td>
                                                                                  <td colspan="2" align="left">
                                                                                  </td>
                                                                                  </tr>
                                                                                
                                                                        </tbody></table>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                
                                                                <center>
                                                                <div id="divCopyRight" class="HRBDCopyRight" style="border-top:1px solid #999999; width:595px;">
                                                                    
                                                                </div>
                                                                </center>
                                                                
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

