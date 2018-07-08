<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Candidate;
use PDF;

class UserController extends Controller
{
    public function index(){
        $data['title'] = "Hello";
        return view('users.home')->with($data);
    }

    public function getCandidateProfile($id){
    	$data['candidate'] = Candidate::find($id);
    	if(!$data['candidate'])
    		return redirect()->route('users.home')->with('error', 'Candidate not found');
    	return view('users.candidate_profile')->with($data);
    }

    public function getCandidateResume($id){
        $data['candidate'] = Candidate::find($id);
        $pdf = PDF::loadView('users.candidate_resume_pdf', $data);
        return $pdf->download('resume.pdf');   
    }
}
