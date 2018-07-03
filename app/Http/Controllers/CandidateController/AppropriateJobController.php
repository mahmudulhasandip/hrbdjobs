<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;
use DB;
use App\Candidate_skill;
use App\Job;
use App\Job_skill;


class AppropriateJobController extends Controller
{
    public function getAppropriateJob(){
    	$data['left_active'] = 'appropriate_job';

    	$data['jobs'] = DB::table('jobs')
    					->join('candidate_skills', 'candidate_skills.category_id', '=', 'jobs.job_category_id')
    					->join('job_skills', 'job_skills.skill', '=', 'candidate_skills.expertise_area')
    					->where('candidate_skills.experience', '>=', 'jobs.experience')
    					->orWhere('candidate_skills.designation_id', '=', 'jobs.job_designation_id')
    					->orWhere('candidate_skills.job_level', '=', 'jobs.job_level_id')
    					->where('candidate_skills.candidate_id', '=', Auth::guard('candidate')->user()->id)
    					->where('jobs.is_verified', '=', '1')
    					->where('jobs.deadline', '>', date("Y-m-d"))
    					->select('jobs.id')
    					->groupBy('jobs.id')
    					->orderBy('jobs.updated_at','desc')
    					->paginate(10);

     	return view('candidate.appropriate_job', $data);
    }
}
