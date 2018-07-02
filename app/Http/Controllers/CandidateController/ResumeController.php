<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;

class ResumeController extends Controller
{
    public function getResume(){
    	$data['left_active'] = 'resume';
    	$data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
     	return view('candidate.my_resume', $data);
    }
}
