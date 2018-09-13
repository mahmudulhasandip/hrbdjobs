<?php

namespace App\Http\Controllers\EmployerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Job;
use App\Employer;

class ShortlistedController extends Controller
{
    public function getCandidateShortList(){
        $data['left_active'] = 'shortlisted';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        // $data['jobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->paginate(10);
        $data['jobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->has('shortListedResume')->paginate(10);
                            // ->whereHas('shortListedResume', function($query) {
                            //     $query->
                            // })
        return view('employer.shortlisted_job', $data);
    }
}