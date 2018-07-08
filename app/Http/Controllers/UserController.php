<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Candidate;
use App\Job_category;
use App\Job;
use App\Employer_company_info;

use PDF;

class UserController extends Controller
{
    public function index(){
        $data['title'] = "HrbdJobs";
        $data['categories'] = DB::table('job_categories')
                                ->leftJoin('jobs', 'jobs.job_category_id', '=', 'job_categories.id')
                                ->select('job_categories.id')
                                ->groupBy('job_categories.id')
                                ->limit(8)
                                ->where('jobs.deadline', '>=', date('Y-m-d'))
                                ->get();
        $data['featuerd_jobs'] = Job::where('jobs.deadline', '>=', date('Y-m-d'))->where('is_featured', '=', 1)->orderBy('updated_at', 'desc')->limit(5)->get();
        $data['recent_jobs'] = Job::where('jobs.deadline', '>=', date('Y-m-d'))->orderBy('updated_at', 'desc')->limit(5)->get();
        $data['special_jobs'] = Job::where('jobs.deadline', '>=', date('Y-m-d'))->where('is_special', '=', 1)->orderBy('updated_at', 'desc')->limit(5)->get();
        $data['companies'] = DB::table('employer_company_infos')
                            ->leftJoin('employer_packages', 'employer_packages.employer_id', '=', 'employer_company_infos.employer_id')
                            ->leftJoin('featured_packages', 'featured_packages.id', '=', 'employer_packages.featured_package_id')
                            ->where('featured_packages.featured_type', '=', 0)
                            ->where('employer_packages.expired_date', '>=', date('Y-m-d'))
                            ->where('employer_packages.remain_amount', '>=', 1)
                            ->where('employer_packages.is_verified', '=', 1)
                            ->where('employer_company_infos.is_featured', '=', 1)
                            ->inRandomOrder()
                            ->get();


        return view('users.home')->with($data);
    }

    public function getCandidateProfile($id){
    	$data['candidate'] = Candidate::find($id);
    	if(!$data['candidate'])
    		return redirect()->route('users.home')->with('error', 'Candidate not found');
    	return view('users.candidate_profile')->with($data);
    }

    public function getCandidateResume($id){
        $data['candidate'] = Candidate::find($id);
        $pdf = PDF::loadView('users.candidate_resume_pdf', $data);
        return $pdf->download('resume.pdf');   
    }
}
