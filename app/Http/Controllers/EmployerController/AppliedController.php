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
use App\Job;

class AppliedController extends Controller
{

    public function getAppliedCandidatesList(Request $request, $id) {
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['applied_jobs'] = Applied_job::where('job_id', $id)->where('is_withdraw', 0)->paginate(10);
        $data['locations'] = DB::table('candidates')
                            ->join('applied_jobs', 'applied_jobs.candidate_id', '=', 'candidates.id')
                            ->select('candidates.city')
                            ->groupBy('city')
                            ->get();

        $data['institutes'] = DB::table('candidate_educations')
                            ->join('applied_jobs', 'applied_jobs.candidate_id', '=', 'candidate_educations.candidate_id')
                            ->join('institute_names', 'institute_names.id', '=', 'candidate_educations.institute_name_id')
                            ->select('institute_names.name')
                            ->groupBy('institute_names.name')
                            ->get();

        $data['experiences'] = Job_experience::all();

        $data['job_id'] = $id;
        $data['job'] = Job::findOrFail($id);
        $data['company_info'] = DB::table('employer_company_infos')->where('employer_id', Auth::guard('employer')->user()->id)->first();
        // dd($data['job']);

        // dd($data['institutes']);

        if ($request->ajax()) {
            $location =  request("location");
            $institution =  $request->input("institution");
            $experience =  $request->input("experience");
            $job_id =  $request->input("job_id");

            $data['applied_jobs'] = Applied_job::where('job_id', $job_id)->where('is_withdraw', 0)
                                                ->when($location, function ($query) use ($location){
                                                    $query->whereHas('candidate', function ($query) use ($location) {
                                                        return $query->where('city', $location);
                                                    });
                                                })
                                                ->when($institution, function($query) use ($institution){
                                                    $query->whereHas('candidate', function($query) use ($institution) {
                                                        $query->whereHas('candidateEducation', function($query) use ($institution){
                                                            return $query->where('institution_name', $institution);
                                                        });
                                                    });
                                                })
                                                ->when($experience, function($query) use ($experience){
                                                    $query->whereHas('candidate', function($query) use ($experience) {
                                                        $query->whereHas('candidateSkill', function($query) use ($experience){
                                                            return $query->where('experience', '>=', $experience);
                                                        });
                                                    });
                                                })
                                                ->paginate(10);

            return view('employer.ajaxPartials.applied_candidates', $data);
        }

        return view('employer.applied_candidates_list', $data);
    }

    public function filterAppliedCandidate(Request $request) {
        $location =  request("location");
        $institution =  $request->input("institution");
        $experience =  $request->input("experience");
        $job_id =  $request->input("job_id");

        $data['applied_jobs'] = Applied_job::where('job_id', $job_id)->where('is_withdraw', 0)
                                            ->when($location, function ($query) use ($location){
                                                $query->whereHas('candidate', function ($query) use ($location) {
                                                    return $query->where('city', $location);
                                                });
                                            })
                                            ->when($institution, function($query) use ($institution){
                                                $query->whereHas('candidate', function($query) use ($institution) {
                                                    $query->whereHas('candidateEducation', function($query) use ($institution){
                                                        return $query->where('institution_name', $institution);
                                                    });
                                                });
                                            })
                                            ->when($experience, function($query) use ($experience){
                                                $query->whereHas('candidate', function($query) use ($experience) {
                                                    $query->whereHas('candidateSkill', function($query) use ($experience){
                                                        return $query->where('experience', '>=', $experience);
                                                    });
                                                });
                                            })
                                            ->paginate(10);


        return view('employer.ajaxPartials.applied_candidates', $data);
    }

    public function getCandidateResume($job_id, $id){
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['candidate'] = Candidate::find($id);
        $applied_job = Applied_job::find($job_id);
        $applied_job->is_viewed_resume = 1;

    	if(!$data['candidate']){
            return redirect()->route('users.home')->with('error', 'Candidate not found');
        }
        $applied_job->save();
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