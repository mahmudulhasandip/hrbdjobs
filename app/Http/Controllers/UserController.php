<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Candidate;
use App\Job_category;
use App\Job;
use App\Employer_company_info;
use App\Job_level;
use PDF;

class UserController extends Controller
{
    public function index(){
        $data['page'] = 'home';
        $data['title'] = "HrbdJobs";
        $data['categories'] = DB::table('job_categories')
                                ->leftJoin('jobs', 'jobs.job_category_id', '=', 'job_categories.id')
                                ->select('job_categories.id')
                                ->groupBy('job_categories.id')
                                ->where('job_categories.is_special', '=', 0)
                                ->where('jobs.deadline', '>=', date('Y-m-d'))
                                ->limit(8)
                                ->get();
        $data['live_jobs'] = Job::where('deadline', '>=', date('Y-m-d'))
                            ->where('is_paused', '=', 0)
                            ->where('is_verified', '=', 1)
                            ->where('is_special', '=', 0)
                            ->count();

        $data['todays_jobs'] = Job::where('jobs.deadline', '>=', date('Y-m-d'))
                            ->where('is_paused', '=', 0)
                            ->where('is_verified', '=', 1)
                            ->where('is_special', '=', 0)
                            ->where('updated_at', 'like', date('Y-m-d').'%')
                            ->count();
        
        $data['special_job_categories'] = DB::table('job_categories')
                                ->leftJoin('jobs', 'jobs.job_category_id', '=', 'job_categories.id')
                                ->select('job_categories.id')
                                ->groupBy('job_categories.id')
                                ->where('jobs.deadline', '>=', date('Y-m-d'))
                                ->where('job_categories.is_special', '=', 1)
                                ->limit(8)
                                ->get();

        $data['live_special_jobs'] = Job::where('jobs.deadline', '>=', date('Y-m-d'))
                            ->where('is_paused', '=', 0)
                            ->where('is_verified', '=', 1)
                            ->where('is_special', '=', 1)
                            ->count();

        $data['todays_special_jobs'] = Job::where('jobs.deadline', '>=', date('Y-m-d'))
                            ->where('is_paused', '=', 0)
                            ->where('is_verified', '=', 1)
                            ->where('is_special', '=', 1)
                            ->where('updated_at', 'like', date('Y-m-d').'%')
                            ->count();
        
        $data['companies'] = DB::table('employer_company_infos')
                            ->leftJoin('employer_packages', 'employer_packages.employer_id', '=', 'employer_company_infos.employer_id')
                            ->leftJoin('featured_packages', 'featured_packages.id', '=', 'employer_packages.featured_package_id')
                            ->where('featured_packages.featured_type', '=', 0)
                            ->where('employer_packages.expired_date', '>=', date('Y-m-d'))
                            ->where('employer_packages.is_verified', '=', 1)
                            ->where('employer_company_infos.is_featured', '=', 1)
                            ->select('employer_company_infos.*')
                            ->inRandomOrder()
                            ->limit(8)
                            ->get();
        $data['cities'] = DB::table('employers')
                            ->join('jobs', 'jobs.employer_id', '=', 'employers.id')
                            ->join('employer_company_infos', 'employer_company_infos.employer_id', '=', 'employers.id')
                            ->where('jobs.deadline', '>=', date('Y-m-d'))
                            ->where('jobs.is_paused', '=', 0)
                            ->where('jobs.is_verified', '=', 1)
                            ->select('employer_company_infos.city')
                            ->groupBy('employer_company_infos.city')
                            ->get();


        return view('users.home')->with($data);
    }

    public function getCandidateProfile($id){
        $data['page'] = 'candidate_profile';
    	$data['candidate'] = Candidate::find($id);
    	if(!$data['candidate'])
    		return redirect()->route('users.home')->with('error', 'Candidate not found');
    	return view('users.candidate_profile')->with($data);
    }

    public function getCandidateResumePDF($id){
        $data['page'] = 'pdf';
        $data['candidate'] = Candidate::find($id);
        $pdf = PDF::loadView('users.candidate_resume_pdf', $data);
        return $pdf->download('resume.pdf');   
    }

    public function getAboutUs(){
        $data['page'] = 'about_us';
        return view('users.about_us')->with($data);
    }

     public function getContactUs(){
        $data['page'] = 'contact_us';
        return view('users.contact_us')->with($data);
    }

}
