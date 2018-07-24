<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job_category;
use App\Job_designation;
use App\Skill;
use App\Job_skill;
use App\Candidate;
use App\Candidate_education;
use App\Institute_name;
use App\Candidate_experience;
use App\Candidate_skill;
use App\Job_level;
use App\Industry;
use App\Candidate_resume;
use App\Employer;
use App\Employer_company_info;
use App\Company_industry;
use App\Job;


class DataRetrieveController extends Controller
{
    public function getAllCandidate($per_page, $page = NULL){
    	$url = 'https://hrbdjobs.com/api/job_seekers/all/'.$per_page.'/'.$page;
    	$seekers = json_decode(file_get_contents($url), 1);
    	// dd($seekers);
    	foreach ($seekers as $seeker) {
    		$candidate = Candidate::where('id', $seeker['ID'])->first();
    		$check_duplicate = Candidate::where('username', explode("@", $seeker['email'])[0])->first();
    		if(!$check_duplicate){
	    		if(!$candidate){
	    			$candidate = new Candidate();
		    		if($seeker['last_name']){
		    			$candidate->fname = $seeker['first_name'];
		    			$candidate->lname = $seeker['last_name'];
		    		}else{
		    			$name = explode(" ", $seeker['first_name']);
		    			$candidate->lname = $name[sizeof($name)-1];
		    			$fname = "";
		    			for($i = 0; $i < sizeof($name)-1; $i++){
		    				$fname .= $name[$i]." ";
		    			}
		    			$candidate->fname = trim($fname);
		    		}
		    		$candidate->id = $seeker['ID'];
		    		$candidate->email = $seeker['email'];
		    		$candidate->username = explode("@", $seeker['email'])[0];
		    		$candidate->password = bcrypt($seeker['password']);
		    		$candidate->current_address = $seeker['present_address'];
		    		$candidate->permanent_address = $seeker['permanent_address'];
		    		$candidate->country = $seeker['country'];
		    		$candidate->city = $seeker['city'];
		    		$candidate->gender = ucfirst($seeker['gender']);
		    		$candidate->date_of_birth = $seeker['dob'];
		    		$candidate->phone = $seeker['phone'] ? $seeker['phone'] : $seeker['mobile'];
		    		$candidate->dp = $seeker['photo'];
		    		$candidate->nationality = $seeker['nationality'];
		    		$candidate->about_me = $seeker['career_objective'];
		    		$candidate->save();

		    		// add education
		    		$url2 = 'https://hrbdjobs.com/api/job_seekers/academic/'.$candidate->id;
		    		$academics = json_decode(file_get_contents($url2), 1);
		    		if($academics){
		    			foreach($academics as $academic){
		    				$education = Candidate_education::where('candidate_id', $candidate->id)->first();
		    				if(!$education){
		    					$education = new Candidate_education();
				    			$education->candidate_id = $candidate->id;
				    			$education->level_of_education = $academic['degree_level'];
				    			$education->degree_title = $academic['degree_title'];
				    			$education->group_majar = $academic['major'];
				    			$institute = Institute_name::where('name', $academic['institude'])->first();
				    			if($institute == null){
				    				$institute = new Institute_name();
				    				$institute->name = $academic['institude'];
				    				$institute->save();
				    				$education->institute_name_id = $institute->id;
				    			}else{
				    				$education->institute_name_id = $institute->id;
				    			}
				    			$education->passing_year = $academic['completion_year'];

				    			$education->save();
		    				}
			    			
			    		}
		    		}
	    		}

	    		// add seeker skills
	    		$url3 = 'https://hrbdjobs.com/api/job_seekers/skills/'.$candidate->id;
	    		$skills = json_decode(file_get_contents($url3), 1);
	    		if($skills){
	    			foreach($skills as $skill){
		    			$skill_name = $skill['skill_name'];
		    			$expertise_area = Skill::where('name', $skill_name)->first();
		    			if($expertise_area == null){
		    				continue;
			    		}else if($skill['job_category_id'] == NULL || $skill['job_designation_id'] == NULL){
			    			continue;
			    		}else{
			    			$level_name = ucwords(str_replace("-", " ", $skill['job_label']));
			    			$job_lavel = Job_level::where('name', $level_name)->first();
			    			$can_skill = Candidate_skill::where('candidate_id', $candidate->id)->first();
			    			if(!$can_skill){
			    				$can_skill = new Candidate_skill();
				    			$can_skill->candidate_id = $candidate->id;
				    			$can_skill->experience = $skill['total_experience'];
				    			$can_skill->job_level = $job_lavel->id;
				    			$can_skill->designation_id = $skill['job_designation_id'];
				    			$can_skill->category_id = $skill['job_category_id'];
				    			$can_skill->expertise_area = $expertise_area->id;
				    			$can_skill->save();
			    			}
			    			
			    		}	
		    		}
	    		}

	    	}
    		

    		// add experience
    		// $url3 = 'https://hrbdjobs.com/api/job_seekers/experience/'.$candidate->id;
    		// $experiences = json_decode(file_get_contents($url3), 1);
    		// foreach($experiences as $experience){
    		// 	$can_experience = new Candidate_experience();
    		// 	$can_experience->candidate_id = $candidate->id;
    		// 	$can_experience->company_name = $academic['degree_level'];
    		// 	$can_experience->degree_title = $academic['degree_title'];
    		// 	$can_experience->group_majar = $academic['major'];
    		// 	$can_experience->passing_year = $academic['completion_year'];
    		// 	$can_experience->save();
    		// }


    	}
    }

    public function storeResume(){
    	$url = 'https://hrbdjobs.com/api/job_seekers/resumes';
    	$resumes = json_decode(file_get_contents($url), 1);

    	foreach ($resumes as $cv) {
    		if(Candidate::where('id', $cv['seeker_ID'])->first()){
    			$resume = new Candidate_resume();
	    		$resume->candidate_id = $cv['seeker_ID'];
	    		$resume->resume = $cv['file_name'];
	    		$resume->save();
    		}
    		
    	}
    	echo "Success";
    }

    public function storeAllCategories(){
    	$url = 'https://hrbdjobs.com/api/job_category/all';
    	$categories = json_decode(file_get_contents($url), 1);

    	foreach ($categories as $category) {
    		$job_category = new Job_category();
    		$job_category->id = $category['id'];
    		$job_category->name = $category['name'];
    		$job_category->save();
    	}
    	echo "Success";
    }

    public function storeAllDesignations(){
    	$url = 'https://hrbdjobs.com/api/job_designation/all';
    	$designations = json_decode(file_get_contents($url), 1);

    	foreach ($designations as $designation) {
    		$job_designation = new Job_designation();
    		$job_designation->id = $designation['id'];
    		$job_designation->name = $designation['name'];
    		$job_designation->save();
    	}
    	echo "Success";
    }

    public function storeAllSkills(){
    	$url = 'https://hrbdjobs.com/api/skills/all';
    	$skills = json_decode(file_get_contents($url), 1);

    	foreach ($skills as $skill) {
    		$s = new Skill();
    		$s->id = $skill['id'];
    		$s->name = $skill['name'];
    		$s->save();
    	}
    	echo "Success";
    }

    public function storeIndustries(){
    	$url = 'https://hrbdjobs.com/api/industries/all';
    	$industries = json_decode(file_get_contents($url), 1);

    	foreach ($industries as $industry) {
    		$ind = new Industry();
    		$ind->id = $industry['ID'];
    		$ind->name = $industry['industry_name'];
    		$ind->save();
    	}
    	echo "Success";
    }

    public function storeEmployers($per_page, $page = NULL){
    	$url = 'https://hrbdjobs.com/api/employers/all/'.$per_page.'/'.$page;
    	$employers = json_decode(file_get_contents($url), 1);
    	foreach ($employers as $emp) {
    		$employer = Employer::where('email', $emp['email'])->first();
    		$check_duplicate = Employer::where('id', $emp['ID'])->first();
    		if((!$employer) && (!$check_duplicate)){
    			$employer = new Employer();
	    		$employer->id = $emp['ID'];
	    		$employer->fname = $emp['first_name'];
    			$employer->lname = $emp['last_name'];
	    		$employer->email = $emp['email'];
	    		$employer->username = $emp['email'];
	    		$employer->password = bcrypt($emp['pass_code']);
	    		$employer->country = $emp['country'];
	    		$employer->city = $emp['city'];
	    		$employer->save();

	    		// add company
	    		$url2 = 'https://hrbdjobs.com/api/employers/company/'.$emp['company_ID'];
	    		$company = json_decode(file_get_contents($url2), 1);
	    		if($company){
    				$employer_company = new Employer_company_info();
    				$employer_company->employer_id = $employer->id;
    				$employer_company->name = $company['company_name'];
    				$employer_company->phone = $company['company_phone'];
    				$employer_company->email = $company['company_email'];
    				$employer_company->address = $company['company_location'];
    				$employer_company->billing_address = $company['company_location'];
    				$employer_company->website = $company['company_website'];
    				$employer_company->team_size = $company['no_of_employees'];
    				$employer_company->logo = $company['company_logo'];
    				$employer_company->is_featured = $emp['top_employer'] == 'yes' ? 1 : 0;
    				$employer_company->save();

    				$industry_id = $company['industry_ID'];
    				if($industry_id){
    					$company_industry = new Company_industry();
    					$company_industry->employer_company_info_id = $employer_company->id;
    					$company_industry->industry_id = $industry_id;
    					$company_industry->save();
    				}
    				

	    		}
    		}

	    }
    }

    public function storeJobs($per_page, $page = NULL){
    	$url = 'https://hrbdjobs.com/api/jobs/all/'.$per_page.'/'.$page;
    	$jobs = json_decode(file_get_contents($url), 1);

    	foreach ($jobs as $posted_job) {
    		$check_employer = Employer::where('id', $posted_job['employer_ID'])->first();
    		if($check_employer){
    			$job = new Job();
	    		$job->employer_id = $posted_job['employer_ID'];
	    		$job->title = $posted_job['job_title'];
	    		$job->description = $posted_job['job_description'];

	    		if(ucfirst($posted_job['experience']) == 'Fresh' || ucfirst($posted_job['experience']) == 'Fresher'){
	    			$job->experience = 0;
	    		}else{
	    			$job->experience = $posted_job['experience'];
	    		}

	    		$job->is_negotiable = 1;
	    		$job->vacancy = $posted_job['vacancies'];
	    		$job->qualification = $posted_job['qualification'];
	    		$job->job_level_id = Job_level::where('name', ucwords(str_replace("+", " ", $posted_job['job_mode'])))->first()->id;
	    		if($posted_job['is_featured'] == 'yes'){
	    			$job->is_featured = 1;
	    		}
	    		if($posted_job['sts'] == 'active'){
	    			$job->is_verified = 1;
	    		}elseif($posted_job['sts'] == 'blocked'){
	    			$job->is_verified = 2;
	    		}
	    		$job->deadline = $posted_job['last_date'];
	    		$job->location = $posted_job['city'].', '.$posted_job['country'];
	    		$job->save();

	    		// job skill add
	    		$req_skills = explode(",", $posted_job['required_skills']);
	    		if(sizeof($req_skills)){
	    			for($i = 0; $i < sizeof($req_skills); $i++) {
		    			$skill = Skill::where('name', 'like', '%'.$req_skills[$i].'%')->first();
		    			if($skill){
		    				$job_skill = new Job_skill();
		    				$job_skill->job_id = $job->id;
		    				$job_skill->skill = $skill->id;
		    				$job_skill->save();
		    			}
		    		}
	    		}
    		}
    		
    	}
    }
}
