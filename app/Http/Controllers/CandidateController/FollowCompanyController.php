<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;

class FollowCompanyController extends Controller
{
    public function getFollowCompanies(){
    	$data['left_active'] = 'follow_companies';
    	$data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
     	return view('candidate.follow_companies', $data);
    }
}
