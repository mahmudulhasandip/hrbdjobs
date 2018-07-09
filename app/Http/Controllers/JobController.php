<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Employer;
use App\Job;

class JobController extends Controller
{
    public function getSingleJob($id){
        $data['job'] = Job::find($id);
        $data['employer_info'] = Employer::where('id', $data['job']->employer_id)->first();
        $data['company_info'] = DB::table('employer_company_infos')->where('employer_id', $data['employer_info']->id)->first();
        return view('users.job_detail', $data);
    }
}
