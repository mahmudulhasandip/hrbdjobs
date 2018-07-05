<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;
use App\Applied_job;

class AppliedJobController extends Controller
{
    public function getAppliedJobs(){
    	$data['left_active'] = 'applied_jobs';
    	$data['applied_jobs'] = Applied_job::orderBy('updated_at','desc')
    							->where('candidate_id', Auth::guard('candidate')->user()->id)
    							->where('is_withdraw', 0)
    							->paginate(10);
     	return view('candidate.applied_jobs', $data);
    }

    public function postWithdrawAppliedJob(Request $request){
    	$job = Applied_job::where('job_id', $request->input('job_id'))->where('candidate_id', Auth::guard('candidate')->user()->id)->first();
    	$message = "Job has been withdrawed";
    	$job->is_withdraw = 1;
    	$job->save();
    	return $message;
    }
}
