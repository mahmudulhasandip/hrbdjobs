<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Favourite_job;

class ShortlistedController extends Controller
{
	public function getShortlistedJob(){
		$data['left_active'] = 'shortlisted';
        $data['jobs'] = Favourite_job::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 1)->paginate(10);
    	return view('candidate.shortlisted', $data);
	}
    public function postShortlistedJob(Request $request){
    	$shortlisted = Favourite_job::where('job_id', $request->input('job_id'))->where('candidate_id', Auth::guard('candidate')->user()->id)->first();
    	$message = "Job has been shortlisted";
    	if($shortlisted){
    		if($shortlisted->status){
    			$message = "Job has been removed from Shortlisted";
    			$shortlisted->status = 0;
    		}else{
    			$shortlisted->status = 1;
    		}
    	}else{
    		$shortlisted = new Favourite_job();
    	}
    	$shortlisted->candidate_id = Auth::guard('candidate')->user()->id;
    	$shortlisted->job_id = $request->input('job_id');
    	$shortlisted->save();
    	return $message;

    }
}
