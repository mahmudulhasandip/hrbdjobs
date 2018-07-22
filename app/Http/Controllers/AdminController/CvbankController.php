<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Candidate;
use App\Job_experience;
use App\Job_level;
use App\Job_designation;
use App\Job_category;
use App\Institute_name;
use App\Skill;
use App\Country;

class CvbankController extends Controller
{
    // get all candidate list
    public function index() {
        $data['menu_active'] = 'cvbank';

        $data['cvs'] = Candidate::all();

        $data['skills'] = Skill::all();
        $data['experiences'] = Job_experience::all();
        $data['job_levels'] = Job_level::all();
        $data['designations'] = Job_designation::all();
        $data['categories'] = Job_category::all();
        $data['institutes'] = Institute_name::all();

        $data['status_selected'] = '321';
        $data['skill_selected'] = '';
        $data['experience_selected'] = '';
        $data['job_level_selected'] = '';
        $data['designation_selected'] = '';
        $data['category_selected'] = '';
        $data['institute_selected'] = '';

        return view('admin.cv_bank', $data);
    }

    // filter candidate
    public function filterCv(Request $request){
        $data['menu_active'] = 'cvbank';
        $data['skills'] = Skill::all();
        $data['experiences'] = Job_experience::all();
        $data['job_levels'] = Job_level::all();
        $data['designations'] = Job_designation::all();
        $data['categories'] = Job_category::all();
        $data['institutes'] = Institute_name::all();

        $status = $request->input('status');
        $skill = $request->input('skill');
        $experience = $request->input('experience');
        $job_level = $request->input('job_level');
        $designation = $request->input('designation');
        $category = $request->input('category');
        $institute = $request->input('institute');

        $data['status_selected'] = $status;
        $data['skill_selected'] = $skill;
        $data['experience_selected'] = $experience;
        $data['job_level_selected'] = $job_level;
        $data['designation_selected'] = $designation;
        $data['category_selected'] = $category;
        $data['institute_selected'] = $institute;


        $data['cvs'] = Candidate::when($status != 321, function($query) use ($status){
                                    $query->where('verified', $status);
                                })
                                ->when($institute, function($query) use ($institute) {
                                    $query->whereHas('candidateEducation', function($query) use ($institute){
                                        return $query->where('institute_name_id', $institute);
                                    });
                                })
                                ->when($experience, function($query) use ($experience){
                                    $query->whereHas('candidateSkill', function($query) use ($experience) {
                                        return $query->where('experience', '>=', $experience);
                                    });
                                })
                                ->when($job_level, function($query) use ($job_level){
                                    $query->whereHas('candidateSkill', function($query) use ($job_level) {
                                        return $query->where('job_level', $job_level);
                                    });
                                })
                                ->when($designation, function($query) use ($designation){
                                    $query->whereHas('candidateSkill', function($query) use ($designation) {
                                        return $query->where('designation_id', $designation);
                                    });
                                })
                                ->when($category, function($query) use ($category){
                                    $query->whereHas('candidateSkill', function($query) use ($category) {
                                        return $query->where('category_id', $category);
                                    });
                                })
                                ->when($skill, function($query) use ($skill){
                                    $query->whereHas('candidateSkill', function($query) use ($skill) {
                                        return $query->where('expertise_area', $skill);
                                    });
                                })
                                ->get();

        return view('admin.cv_bank', $data);

    }


    // edit candidate
    public function candidateEdit($id){
        $data['menu_active'] = 'cvbank';
        $data['candidate'] = Candidate::findOrfail($id);
        $data['countries'] = Country::all();
        return view('admin.candidate_edit', $data);
    }
}
