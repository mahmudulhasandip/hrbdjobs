<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Candidate;

class AppropriateJobController extends Controller
{
    public function getAppropriateJob(){
    	$data['left_active'] = 'appropriate_job';
    	$data['candidate'] = Candidate::find(Auth::guard('candidate')->user()->id);
     	return view('candidate.appropriate_job', $data);
    }
}
