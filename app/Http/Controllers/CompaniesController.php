<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employer_company_info;
use App\Job;
use App\Company_social_media;
use App\Company_industry;

class CompaniesController extends Controller
{
    public function getCompanyProfile($id) {
        $data['company_info'] = Employer_company_info::findOrFail($id);
        $data['jobs'] = Job::where('employer_id', $data['company_info']->employer_id)->where('is_verified', 1)->where('is_paused', 0)->where('is_drafted', 0)->orderBy('updated_at', 'desc')->get();
        $data['total_jobs'] = $data['jobs']->count();
        try{
            $data['social_links'] = Company_social_media::where('employer_company_info_id', $data['company_info']->id)->first();
        }catch(ModelNotFoundException $ex){
            $data['social_links'] = new Company_social_media();
        }
        $data['company_industries'] = Company_industry::where('employer_company_info_id', $data['company_info']->id)->get();
        
        return view('users.company_profile', $data);
    }
}
