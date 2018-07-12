<?php

namespace App\Http\Controllers\EmployerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Employer;
use App\Applied_job;
use App\Candidate;
use App\Job_experience;

class AppliedController extends Controller
{

    public function getAppliedCandidatesList(Request $request, $id) {
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['applied_jobs'] = Applied_job::where('job_id', $id)->where('is_withdraw', 0)->paginate(1);
        $data['locations'] = DB::table('candidates')
                            ->join('applied_jobs', 'applied_jobs.candidate_id', '=', 'candidates.id')
                            ->select('candidates.city')
                            ->groupBy('city')
                            ->get();

        $data['institutes'] = DB::table('candidate_educations')
                            ->join('applied_jobs', 'applied_jobs.candidate_id', '=', 'candidate_educations.candidate_id')
                            ->select('candidate_educations.institution_name')
                            ->groupBy('institution_name')
                            ->get();

        $data['experiences'] = Job_experience::all();

        $data['job_id'] = $id;

        // dd($data['institutes']);

        if ($request->ajax()) {
            return view('employer.ajaxPartials.applied_candidates', $data);
        }
        
        return view('employer.applied_candidates_list', $data);
    }

    public function filterAppliedCandidate(Request $request) {
        // $data['left_active'] = 'manage_job';
        $location =  $request->input("location");
        $institution =  $request->input("institution");
        $experience =  $request->input("experience");
        $job_id =  $request->input("job_id");
        $jobs = Applied_job::where('job_id', $job_id)->where('is_withdraw', 0)->get();
        if( $location != null){
            
            foreach($jobs as $job){
                if($job->candidate->city == $location){
                    $data['applied_jobs'] = $job->paginate(1);
                }
            }
            
        }
        // return view('employer.ajaxPartials.applied_candidates', $data);
        return $data['applied_jobs'];
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
       
        $shortlist = Applied_job::where('candidate_id', $request->input('candidate_id'))->where('job_id', $request->input('job_id'))->first();
        
        $message = "";
        if($shortlist->is_short_listed){

            $shortlist->is_short_listed = 0;
            $message = "Candidate has been removed from Shortlisted";
        }
        else{
            $shortlist->is_short_listed = 1;
            $message = "Candidate has been Shortlisted";
        }
        $shortlist->save();
        
        return $message;
    }

    public function rejectCandidate(Request $request) {
        $reject = Applied_job::where('candidate_id', $request->input('candidate_id'))->where('job_id', $request->input('job_id'))->first();
        if(!$reject->is_withdraw){

            $reject->is_withdraw = 1;
            $message = "Candidate has been Rejected";
        }

        $reject->save();
        return $message;
    }
}
