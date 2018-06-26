<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppropriateJobController extends Controller
{
    public function getAppropriateJob(){
    	$data['left_active'] = 'appropriate_job';
     	return view('candidate.appropriate_job', $data);
    }
}
