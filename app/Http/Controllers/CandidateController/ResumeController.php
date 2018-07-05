<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;
use App\Candidate_resume;

class ResumeController extends Controller
{
    public function getResume(){
    	$data['left_active'] = 'resume';
        $data['candidate_resume'] = Candidate_resume::where('candidate_id', Auth::guard('candidate')->user()->id)->first();
        
     	return view('candidate.view_resume', $data);
    }

    function getUploadedResumeView(){
        $data['candidate_resume'] = Candidate_resume::where('candidate_id', Auth::guard('candidate')->user()->id)->first();
        
        return view('candidate.uploaded_resume_view', $data);
    }

    public function getUploadResume(){
    	$data['left_active'] = 'resume';
     	return view('candidate.upload_resume', $data);
    }

    public function postUploadResume(Request $request){
    	$candidate = Candidate_resume::where('candidate_id', Auth::guard('candidate')->user()->id)->first();
        // delete & upload images
        if($request->hasFile('resume')){
            if($candidate && $candidate->resume){
                Storage::delete('public/uploads/resumes/'.$candidate->resume);
            }else{
                $candidate = new Candidate_resume();
                $candidate->candidate_id = Auth::guard('candidate')->user()->id;
            }
            $ext = $request->file('resume')->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $upload = $request->file('resume')->storeAs(
                'public/uploads/resumes', $filename
            );
            $candidate->resume = $filename;
            $candidate->save();
        }

        return redirect()->route('candidate.resume.upload')->with('status', 'Your Resume successfully added.');
    }
}
