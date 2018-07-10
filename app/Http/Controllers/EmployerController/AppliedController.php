<?php

namespace App\Http\Controllers\EmployerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Employer;
use App\Applied_job;
use App\Candidate;

class AppliedController extends Controller
{
    public function getAppliedCandidatesList($id) {
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['applied_jobs'] = Applied_job::where('job_id', $id)->paginate(10);
        
        return view('employer.applied_candidates_list', $data);
    }

    public function getCandidateResume($id){
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['candidate'] = Candidate::find($id);
    	if(!$data['candidate'])
    		return redirect()->route('users.home')->with('error', 'Candidate not found');
    	return view('employer.candidate_resume')->with($data);
    }

    public function shortListCandidate(Request $request) {
        $shortlist = Applied_job::where('job_id', $request->input('job_id'))->first();
        if($shortlist['is_short_listed']){

            $shortlist['is_short_listed'] = 0;
            $message = "Candidate has been removed from Shortlisted";
        }
        else{
            $shortlist['is_short_listed'] = 1;
            $message = "Candidate has been Shortlisted";
        }
        $shortlist->save();


        return $message;
    }
}
