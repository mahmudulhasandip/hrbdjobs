<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowCompanyController extends Controller
{
    public function getFollowCompanies(){
    	$data['left_active'] = 'follow_companies';
     	return view('candidate.follow_companies', $data);
    }
}
