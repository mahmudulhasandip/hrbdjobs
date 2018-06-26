<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getProfile(){
    	$data['left_active'] = 'profile';
    	return view('candidate.profile', $data);
    }

    public function getEditProfile(){
    	$data['left_active'] = 'profile';
     	return view('candidate.profile_edit', $data);
    }
}
