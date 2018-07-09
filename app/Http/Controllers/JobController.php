<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Candidate;
use App\Job_category;
use App\Job;
use App\Employer_company_info;
use App\Job_level;

use DB;
use App\Employer;
use App\Job;

class JobController extends Controller
{
    public function getSingleJob($id){
        $data['job'] = Job::find($id);
        $data['employer_info'] = Employer::where('id', $data['job']->employer_id)->first();
        $data['company_info'] = DB::table('employer_company_infos')->where('employer_id', $data['employer_info']->id)->first();
        return view('users.job_detail', $data);
    }

    function recentJobs(Request $request){
        $recent_jobs = Job::where('jobs.deadline', '>=', date('Y-m-d'))
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_special', 0)
                                ->orderBy('updated_at', 'desc')
                                ->limit(5)
                                ->get();
        $data = '';
        foreach($recent_jobs as $job){
            $logo = ( $job->employer->employerCompanyInfo["logo"] ) ? asset("storage/uploads/".$job->employer->employerCompanyInfo["logo"]) : asset("storage/uploads/company-avatar.png");

            $single_job = route('single.job', $job->id);

            $data .= '<div class="job-listing wtabs">
                        <div class="job-title-sec pointer newtab" onclick="viewJob(\''.$single_job.'\')">
                            <div class="c-logo"> <img src="'.$logo.'" alt="" /> </div>
                            <h3><a href="'.$single_job.'" target="_blank" title="">'.$job->title.'</a></h3>
                            <span>'.$job->employer->employerCompanyInfo["name"].'</span>
                            <div class="job-lctn"><i class="la la-map-marker"></i>'.$job->employer->employerCompanyInfo["city"].", ". $job->employer->employerCompanyInfo["country"].'</div>
                        </div>
                        <div class="job-style-bx">
                            <span class="job-is ft fill">'.$job->jobLevel->name.'</span>
                            <i class="text-danger remove_shortlist pointer"><i class="la la-clock-o"></i> '.date("M d, Y", strtotime($job->deadline)).'</i>
                        </div>
                    </div>';
        }
        return $data;
    
    }

    function featuredJobs(Request $request){
        $featuerd_jobs = DB::table('jobs')
                        ->leftJoin('employer_packages', 'employer_packages.employer_id', '=', 'jobs.employer_id')
                        ->leftJoin('featured_packages', 'featured_packages.id', '=', 'employer_packages.job_package_id')
                        ->select('jobs.*')
                        ->where('featured_packages.featured_type', '=', 1)
                        ->where('employer_packages.expired_date', '>=', date('Y-m-d'))
                        ->where('jobs.deadline', '>=', date('Y-m-d'))
                        ->where('jobs.is_featured', '=', 1)
                        ->where('jobs.is_verified', '=', 1)
                        ->where('jobs.is_paused', '=', 0)
                        ->where('jobs.is_special', '=', 0)
                        ->orderBy('jobs.updated_at', 'desc')
                        ->limit(8)
                        ->get();
        $data = '';
        foreach($featuerd_jobs as $job){
            $companyInfo = Employer_company_info::where('employer_id', $job->employer_id)->first();
            $jobLevel = Job_level::where('id', $job->job_level_id)->first();
            $logo = ( $companyInfo && $companyInfo->logo ) ? asset("storage/uploads/".$companyInfo->logo) : asset("storage/uploads/company-avatar.png");

            $single_job = route('single.job', $job->id);

            $data .= '<div class="job-listing wtabs">
                        <div class="job-title-sec pointer newtab" onclick="viewJob(\''.$single_job.'\')">
                            <div class="c-logo"> <img src="'.$logo.'" alt="" /> </div>
                            <h3><a href="'.$single_job.'" target="_blank" title="">'.$job->title.'</a></h3>
                            <span>'.$companyInfo->name.'</span>
                            <div class="job-lctn"><i class="la la-map-marker"></i>'.$companyInfo->city.", ". $companyInfo->country.'</div>
                        </div>
                        <div class="job-style-bx">
                            <span class="job-is ft fill">'.$jobLevel->name.'</span>
                            <i class="text-danger remove_shortlist pointer"><i class="la la-clock-o"></i> '.date("M d, Y", strtotime($job->deadline)).'</i>
                        </div>
                    </div>';
        }
        return $data;
    }

    function specialJobs(Request $request){

        $special_jobs = Job::where('jobs.deadline', '>=', date('Y-m-d'))
                                ->where('is_verified', '=', 1)
                                ->where('is_paused', '=', 0)
                                ->where('is_special', 1)
                                ->orderBy('updated_at', 'desc')
                                ->limit(6)
                                ->get();
        $data = '';
        foreach($special_jobs as $job){
            $logo = ( $job->employer->employerCompanyInfo["logo"] ) ? asset("storage/uploads/".$job->employer->employerCompanyInfo["logo"]) : asset("storage/uploads/company-avatar.png");

            $single_job = route('single.job', $job->id);

            $data .= '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="job-grid">
                        <div class="job-title-sec">
                            <div class="c-logo"> <img src="'.$logo.'" alt="" /> </div>
                            <h3><a href="'.$single_job.'" target="_blank" title="">'.$job->title.'</a></h3>
                            <span>'.$job->employer->employerCompanyInfo["name"].'</span>
                            <span class="fav-job" title="Deadline"><i class="la la-clock-o"></i> <i>'.date("M d, Y", strtotime($job->deadline)).'</i></span>
                        </div>
                        <span class="job-lctn">'.$job->employer->employerCompanyInfo["city"].", ". $job->employer->employerCompanyInfo["country"].'</span>
                        <a href="javascript:void(0)" title="">'.$job->jobLevel->name.'</a>
                    </div>
                    <!-- JOB Grid -->
                </div>';
        }
        return $data;

    }

    public function browseJobs(){
        
    }
}
