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
        $data['total'] = Applied_job::where('candidate_id', Auth::guard('candidate')->user()->id)
                                ->where('is_withdraw', 0)
                                ->count();
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

    public function applyJob($id){
        $job = Applied_job::where('job_id', $id)->where('candidate_id', Auth::guard('candidate')->user()->id)->first();
        $message = "You have successfully Applied this Job";
        if($job){
            $message = "You already Applied this Job";
            return redirect()->back()->with('status', $message);
        }
        $job = new Applied_job();
        $job->candidate_id = Auth::guard('candidate')->user()->id;
        $job->job_id = $id;
        $job->save();
        return redirect()->back()->with('status', $message);
    }
}
