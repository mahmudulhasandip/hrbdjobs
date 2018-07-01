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
use App\Candidate_training;

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

    public function postUpdateEducation(Request $request){
        // delete candidate skill and add skills
        Candidate_education::where('candidate_id', Auth::guard('candidate')->user()->id)->delete();

        // $expertise_areas = explode(",", $request->input('expertise_area'));
        $level_of_education = array_filter($request->input('level_of_education'));
        $degree_title = $request->input('degree_title');
        $gpa = $request->input('gpa');
        $out_of = $request->input('out_of');
        $group_majar = $request->input('group_majar');
        $institution_name = $request->input('institution_name');
        $passing_year = $request->input('passing_year');
        $achievement = $request->input('achievement');
        if(sizeof($level_of_education)){
            for($i = 0; $i < sizeof($level_of_education); $i++){
                $education = new Candidate_education();
                $education->candidate_id = Auth::guard('candidate')->user()->id;
                $education->level_of_education = $level_of_education[$i];
                $education->degree_title = $degree_title[$i];
                $education->gpa = $gpa[$i];
                $education->out_of = $out_of[$i];
                $education->group_majar = $group_majar[$i];
                $education->institution_name = $institution_name[$i];
                $education->passing_year = $passing_year[$i];
                $education->achievement = $achievement[$i];
                $education->save();
            }
        }


        return redirect()->route('candidate.profile.edit');
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

    public function postUpdateBasicInfo(Request $request){
        $candidateInfo = Candidate::find(Auth::guard('candidate')->user()->id);
        // delete & upload images
        if($request->hasFile('dp')){
            if($candidateInfo->dp){
                Storage::delete('public/uploads/'.$candidateInfo->dp);
            }
            $ext = $request->file('dp')->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $upload = $request->file('dp')->storeAs(
                'public/uploads', $filename
            );
            $candidateInfo->dp = $filename;
        }
        $candidateInfo->fname = $request->input('fname');
        $candidateInfo->lname = $request->input('lname');
        $candidateInfo->gender = $request->input('gender');
        $candidateInfo->date_of_birth = date("Y-m-d", strtotime($request->input('date_of_birth')));
        $candidateInfo->country = $request->input('country');
        $candidateInfo->city = $request->input('city');
        $candidateInfo->current_address = $request->input('current_address');
        $candidateInfo->permanent_address = $request->input('permanent_address');
        $candidateInfo->nationality = $request->input('nationality');
        $candidateInfo->nid_passport = $request->input('nid_passport');
        $candidateInfo->phone = $request->input('phone');
        $candidateInfo->marital_status = $request->input('marital_status');
        $candidateInfo->father_name = $request->input('father_name');
        $candidateInfo->mother_name = $request->input('mother_name');
        $candidateInfo->spouse_name = $request->input('spouse_name');
        $candidateInfo->website = $request->input('website');
        $candidateInfo->linkedin = $request->input('linkedin');
        $candidateInfo->about_me = $request->input('about_me');
        $candidateInfo->save();

        // delete candidate skill and add skills
        Candidate_skill::where('candidate_id', Auth::guard('candidate')->user()->id)->delete();

        
        // $expertise_areas = explode(",", $request->input('expertise_area'));
        $expertise_areas = $request->input('expertise_area');
        if(sizeof($expertise_areas)){
            for($i = 0; $i < sizeof($expertise_areas); $i++){
                $skill = new Candidate_skill();
                $skill->candidate_id = Auth::guard('candidate')->user()->id;
                $skill->experience = $request->input('experience');
                $skill->job_level = $request->input('job_level');
                $skill->designation_id = $request->input('job_designation');
                $skill->category_id = $request->input('job_category');
                $skill->expertise_area = $expertise_areas[$i];
                $skill->save();
            }
        }


        return redirect()->route('candidate.profile.edit');
    }

    public function getExperience(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.experience', $data);
    }

    public function getTraining(Request $request){
        $data['candidateTrainings'] = Candidate_training::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        $data['countries'] = Country::get();
        return view('candidate.profile_partials.training', $data);
    }

    public function postUpdateTraining(Request $request){
        // delete candidate skill and add skills
        Candidate_training::where('candidate_id', Auth::guard('candidate')->user()->id)->delete();
        // $expertise_areas = explode(",", $request->input('expertise_area'));
        $title = array_filter($request->input('title'));
        $country = $request->input('country');
        $topic_cover = $request->input('topic_cover');
        $training_year = $request->input('training_year');
        $institution_name = $request->input('institution_name');
        $duration = $request->input('duration');
        $location = $request->input('location');
        if(sizeof($title)){
            for($i = 0; $i < sizeof($title); $i++){
                $training = new Candidate_training();
                $training->candidate_id = Auth::guard('candidate')->user()->id;
                $training->title = $title[$i];
                $training->country = $country[$i];
                $training->topic_cover = $topic_cover[$i];
                $training->training_year = $training_year[$i];
                $training->institution_name = $institution_name[$i];
                $training->duration = $duration[$i];
                $training->location = $location[$i];
                $training->save();
            }
        }


        return redirect()->route('candidate.profile.edit');
    }

    public function getCertificate(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.certificate', $data);
    }
}
