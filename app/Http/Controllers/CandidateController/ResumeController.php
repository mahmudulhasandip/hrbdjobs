<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResumeController extends Controller
{
    public function getResume(){
    	$data['left_active'] = 'resume';
     	return view('candidate.my_resume', $data);
    }
}
