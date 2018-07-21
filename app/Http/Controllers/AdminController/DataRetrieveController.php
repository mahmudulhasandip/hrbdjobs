<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job_category;
use App\Job_designation;
use App\Skill;
use App\Candidate;

class DataRetrieveController extends Controller
{
    public function getAllCandidate($per_page, $page = NULL){
    	$url = 'https://hrbdjobs.com/api/job_seekers/all/'.$per_page.'/'.$page;
    	$seekers = json_decode(file_get_contents($url), 1);
    	// dd($seekers);
    	foreach ($seekers as $seeker) {
    		$candidate = new Candidate();
    		if($seeker['last_name']){
    			$candidate->fname = $seeker['first_name'];
    			$candidate->lname = $seeker['last_name'];
    		}else{
    			$name = explode(" ", $seeker['first_name']);
    			$candidate->fname = $name[0];
    			$lname = "";
    			for($i = 1; $i < sizeof($name); $i++){
    				$lname .= $name[$i]." ";
    			}
    			$candidate->lname = trim($lname);
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

    	}
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
}
