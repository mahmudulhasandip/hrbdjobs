<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;

class ProfileController extends Controller
{
    public function getProfile(){
    	$data['left_active'] = 'profile';
    	return view('candidate.profile', $data);
    }

    public function getEditProfile(){
    	$data['left_active'] = 'profile';
    	$data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
     	return view('candidate.profile_edit', $data);
    }

    public function postEditProfile(Request $request){

    }
}
