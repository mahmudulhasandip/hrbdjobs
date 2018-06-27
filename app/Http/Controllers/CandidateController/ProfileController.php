<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;
use App\Country;

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
     	return view('candidate.profile_edit', $data);
    }

    public function getEducation(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.education', $data);
    }

    public function getBasicInfo(Request $request){
        $data['countries'] = Country::get();
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.basic_info', $data);
    }

    public function getExperience(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.experience', $data);
    }

    public function getTraining(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.training', $data);
    }

    public function getCertificate(Request $request){
        $data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('candidate.profile_partials.certificate', $data);
    }

    public function postEditProfile(Request $request){

    }
}
