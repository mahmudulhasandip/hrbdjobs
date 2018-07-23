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
use App\Applied_job;

use DataTables;
use DB;

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

        // return view('admin.cv_bank', $data);

        // return DataTables::of($data['cvs'])->make();
        return view('admin.cv_bank')->with($data);

    }


    // edit candidate
    public function candidateEdit($id){
        $data['menu_active'] = 'cvbank';
        $data['candidate'] = Candidate::findOrfail($id);
        $data['countries'] = Country::all();
        return view('admin.candidate_edit', $data);
    }

    // update candidate information
    public function candidateUpdate(Request $request){
        $input = $request->except('_token');
        $candidate = Candidate::findOrFail($input['id']);

        $candidate->fname = $input['fname'];
        $candidate->lname = $input['lname'];
        $candidate->gender = $input['gender'];
        $candidate->city = $input['city'];
        $candidate->country = $input['country'];
        $candidate->current_address = $input['current_address'];
        $candidate->permanent_address = $input['permanent_address'];
        $candidate->nationality = $input['nationality'];
        $candidate->nid_passport = $input['nid_passport'];
        $candidate->marital_status = $input['marital_status'];
        $candidate->father_name = $input['father_name'];
        $candidate->mother_name = $input['mother_name'];
        $candidate->spouse_name = $input['spouse_name'];
        $candidate->website = $input['website'];
        $candidate->linkedin = $input['linkedin'];

        $candidate->save($input);
        return redirect()->back()->with('status', 'Successfully updated.');
    }

    // block or active candidate
    public function candidateStatus($id){
        $candidate = Candidate::findOrFail($id);

        if($candidate->verified){
            $candidate->verified = 0;
            $status = 'error';
            $msg = 'Candidate Blocked.';
        }else{
            $candidate->verified = 1;
            $status = 'status';
            $msg = 'Candidate Active.';
        }

        $candidate->save();

        return redirect()->back()->with($status, $msg);
    }

    // candidate datatable
    public function candidateDatatable(){
        // $candidate = Candidate::all();
        $candidate = DB::table('candidates')
            ->leftJoin('applied_jobs', 'applied_jobs.candidate_id', '=', 'candidates.id')
            ->select(array('candidates.*', DB::raw('COUNT(applied_jobs.id) as applied')))
            ->groupBy('candidates.id')
            ->get();
        //SELECT candidates.*, COUNT(applied_jobs.id) FROM `candidates` LEFT JOIN applied_jobs ON applied_jobs.candidate_id = candidates.id GROUP BY(candidates.id)
        return DataTables::of($candidate)->make();
    }

    public function appliedJobCout($candidate_id){
        // return Applied_job::where('candidate_id', $candidate_id)->where('is_withdraw', 0)->count();
        return rand(10,100);

    }
}
