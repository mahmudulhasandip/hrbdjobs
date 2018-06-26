<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppliedJobController extends Controller
{
    public function getAppliedJobs(){
    	$data['left_active'] = 'applied_jobs';
     	return view('candidate.applied_jobs', $data);
    }
}
