<?php

namespace App\Http\Controllers\EmployerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Employer_company_info;
use App\Industry;
use App\Country;
use App\Company_industry;



class HomeController extends Controller
{
    //
    public function dashboard(){
        $data['left_active'] = 'dashboard';
        return view('employer.dashboard', $data);
    }

    public function getNewJob(){
        $data['left_active'] = 'job';
        return view('employer.post_new_job', $data);
    }

    public function getDraftedJob(){
        $data['left_active'] = 'job';
        return view('employer.drafted_job', $data);
    }

    public function getManageJob(){
        $data['left_active'] = 'manage_job';
        return view('employer.manage_job', $data);
    }

    public function getProfile(){
        
        $data['left_active'] = 'profile';
        return view('employer.profile', $data);
    }

    public function getEditProfile(){
        $data['left_active'] = 'profile';
        return view('employer.edit_profile', $data);
    }

    public function getCompanyProfile(){
        $data['company_info'] = Employer_company_info::where('employer_id', Auth::guard('employer')->user()->id)->firstOrFail();
        // dd($data['company_info']);
        $data['left_active'] = 'company';
        return view('employer.comapny_profile', $data);
    }

    public function getEditCompanyProfile(){
        $data['left_active'] = 'company';
        $data['company_info'] = Employer_company_info::where('employer_id', Auth::guard('employer')->user()->id)->firstOrFail();
        $data['industries'] = Industry::all();
        $data['countries'] = Country::all();
        return view('employer.edit_company_profile', $data);
    }

    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name'                  => 'required|max:255',
            'industry_type'         => 'required',
            'city'                  => 'required',
            'country'               => 'required',
            'description'           => 'required',
            'address'               => 'required',
            'billing_address'       => 'required',
            'contact_phone'         => 'required',
            'contact_email'         => 'required',
            'website'               => 'required',
            'password'              => 'required|min:6|confirmed'
        ]);
    }
// https://webdevelopmentsolutions.net/upload-images-laravel-5-6/
    public function updateProfile(){
        $employerCompanyInfo = new Employer_company_info();
        $employerCompanyInfo->name = $data['name'];
        $employerCompanyInfo->phone = $data['contact_phone'];
        $employerCompanyInfo->email = $data['contact_email'];
        $employerCompanyInfo->since = $data['since'];
        $employerCompanyInfo->team_size = $data['team_size'];
        $employerCompanyInfo->city = $data['city'];
        $employerCompanyInfo->country = $data['country'];
        $employerCompanyInfo->address = $data['address'];
        $employerCompanyInfo->billing_address = $data['billing_address'];
        $employerCompanyInfo->website = $data['website'];
        $employerCompanyInfo->description = $data['description'];
        $employerCompanyInfo->save();

        // create company industry type
        for($i=0; $i < sizeof($data['industry_type']); $i++){
            $companyIndustry = new Company_industry();
            $companyIndustry->employer_company_info_id = $employerCompanyInfo->id;
            $companyIndustry->industry_id = $data['industry_type'][$i];
            $companyIndustry->save();
        }
    }

    public function getCandidateShortList(){
        $data['left_active'] = 'shortlisted';
        return view('employer.shortlisted_job', $data);
    }

    public function getBrowseResume(){
        $data['left_active'] = 'browse_resume';
        return view('employer.browse_resume', $data);                      
    }
}
