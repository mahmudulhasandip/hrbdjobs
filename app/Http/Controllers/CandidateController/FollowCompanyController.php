<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;
use App\Follow_employer;
use App\Employer_company_info;

class FollowCompanyController extends Controller
{
    public function getFollowCompanies(){
    	$data['left_active'] = 'follow_companies';
    	$data['followCompanies'] = Follow_employer::orderBy('updated_at','desc')
    							->where('candidate_id', Auth::guard('candidate')->user()->id)
    							->where('is_followed', 1)
    							->paginate(10);
     	return view('candidate.follow_companies', $data);
    }

    public function postFollowCompanyStatus(Request $request){
    	$unfollow = Follow_employer::where('employer_id', $request->input('employer_id'))->where('candidate_id', Auth::guard('candidate')->user()->id)->first();
    	$message = 'You are now following '.$unfollow->employer->employerCompanyInfo->name;

    	if($unfollow){
    		if($unfollow->is_followed){
    			$message = "Company has been unfollowed";
    			$unfollow->is_followed = 0;
    		}else{
    			$unfollow->is_followed = 1;
    		}
    	}else{
            $unfollow = new Follow_employer();
            $unfollow->candidate_id = Auth::guard('candidate')->user()->id;
    	    $unfollow->employer_id = $request->input('employer_id');
    	}


    	$unfollow->save();
    	return $message;
    }

    public function followCompany($company_id){
        $employerCompanyInfo = Employer_company_info::find($company_id);
        $unfollow = Follow_employer::where('employer_id', $employerCompanyInfo->employer_id)->where('candidate_id', Auth::guard('candidate')->user()->id)->first();
        $message = 'You are now following '.$unfollow->employer->employerCompanyInfo->name;
        // dd($unfollow);
        if($unfollow){
            if($unfollow->is_followed){
                $message = "Company has already been followed";
            }else{
                $unfollow->is_followed = 1;
            }
        }else{
            $unfollow = new Follow_employer();
            $unfollow->candidate_id = Auth::guard('candidate')->user()->id;
            $unfollow->employer_id = $employerCompanyInfo->employer_id;
        }

        $unfollow->save();

        return redirect()->back()->with('status', $message);
    }

    public function unfollowCompany($company_id){
        $employerCompanyInfo = Employer_company_info::find($company_id);
        $unfollow = Follow_employer::where('employer_id', $employerCompanyInfo->employer_id)->where('candidate_id', Auth::guard('candidate')->user()->id)->first();
        if($unfollow){
    		if($unfollow->is_followed){
    			$message = "Company has been unfollowed";
    			$unfollow->is_followed = 0;
    		}else{
    			$unfollow->is_followed = 1;
    		}
    	}else{
    		$unfollow = new Follow_employer();
        }

        $unfollow->save();
    	return redirect()->back()->with('status', $message);
    }
}