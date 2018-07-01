<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;
use App\Candidate_skill;
use App\Job_category;
use App\Job_designation;
use App\Job_experience;
use App\Job_level;
use App\Country;
use App\Skill;

use App\Candidate_education;

class ProfileController extends Controller
{
    public function getProfile(){
    	$data['left_active'] = 'profile';
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
    	return view('candidate.profile', $data);
    }

    public function getEditProfile(){
    	$data['left_active'] = 'profile';
        $data['countries'] = Country::get();
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        $data['skills'] = Skill::get();
        $data['candidateSkills'] = Candidate_skill::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        $data['jobCategories'] = Job_category::get();
        $data['jobDesignations'] = Job_designation::get();
        $data['jobExperiences'] = Job_experience::get();
    	$data['jobLevels'] = Job_level::get();
        
     	return view('candidate.profile_edit', $data);
    }

    public function getEducation(Request $request){
        $data['candidateEducations'] = Candidate_education::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.profile_partials.education', $data);
    }

    public function getBasicInfo(Request $request){
        $data['countries'] = Country::get();
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        $data['skills'] = Skill::get();
        $data['candidateSkills'] = Candidate_skill::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        $data['jobCategories'] = Job_category::get();
        $data['jobDesignations'] = Job_designation::get();
        $data['jobExperiences'] = Job_experience::get();
        $data['jobLevels'] = Job_level::get();
        return view('candidate.profile_partials.basic_info', $data);
    }

    public function getExperience(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.experience', $data);
    }

    public function getTraining(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.training', $data);
    }

    public function getCertificate(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.certificate', $data);
    }

    public function postEditProfile(Request $request){

    }
}
