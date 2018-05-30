<?php

namespace App\Http\Controllers\EmployerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Employer_company_info;
use App\Industry;
use App\Country;
use App\Company_industry;
use App\Company_social_media;
use App\Job;
use App\Job_package;
use App\Job_level;
use App\Job_experience;
use App\Job_designation;
use App\Job_category;
use App\Job_skill;
use App\Skill;
use App\Featured_package;
use App\Employer_package;
use App\Payment_history;



class HomeController extends Controller
{
    //
    public function dashboard(){
        $data['left_active'] = 'dashboard';
        return view('employer.dashboard', $data);
    }

    public function getPackages(){
        $data['left_active'] = 'packages';
        $data['packages'] = Job_package::all();
        $data['featured_packages'] = Featured_package::all();
        return view('employer.packages', $data);
    }

    public function purchasePackages($id){
        $data['left_active'] = 'packages';
        $data['package_type'] = 0;
        $data['packages'] = Job_package::findOrFail($id);
        return view('employer.package_details' , $data);
    }

    public function purchaseFeaturedPackages($id) {
        $data['left_active'] = 'packages';
        $data['package_type'] = 1;
        $data['packages'] = Featured_package::findOrFail($id);
        return view('employer.package_details' , $data);
    }

    public function confirmPackage(Request $request) {
        $data['left_active'] = 'packages';

        $job_package = "";
        $featured_package = "";
        if($request->input('package_type') == 0){
            $job_package = Job_package::where('id', $request->input('job_package_id'))->first();
        }else{
            $featured_package = Featured_package::where('id', $request->input('job_package_id'))->first();
        }
        
        // payment History
        $paymentHistory = new Payment_history();
        $paymentHistory->employer_id = Auth::guard('employer')->user()->id;
        if($job_package){
            $paymentHistory->job_package_id = $job_package->id;
            $paymentHistory->price = $job_package->price;
            $paymentHistory->discount = $job_package->discount;
        }else{
            $paymentHistory->featured_package_id = $featured_package->id;
            $paymentHistory->price = $featured_package->price;
            $paymentHistory->discount = $featured_package->discount;
        }

        $paymentHistory->transaction_type = $request->input('transaction_type');
        $paymentHistory->transaction_id = $request->input('txdID');
        $paymentHistory->transaction_date = date('Y-m-d H:i:s');

        $paymentHistory->save();


        // employer package
        $employerPackages = new Employer_package();
        $employerPackages->employer_id = Auth::guard('employer')->user()->id;
        $employerPackages->start_date = date('Y-m-d H:i:s');
        if($job_package){
            $employerPackages->job_package_id = $job_package->id;
            $employerPackages->expired_date = date("Y-m-d H:i:s", strtotime('+'.$job_package->duration.' months'));
            $employerPackages->remain_amount = $job_package->job_post;
        }else{
            $employerPackages->featured_package_id = $featured_package->id;
            $employerPackages->expired_date = date("Y-m-d H:i:s", strtotime('+'.$featured_package->duration.' months'));
            $employerPackages->remain_amount = $featured_package->featured_amount;
        }
        $employerPackages->is_verified = 0;

        $employerPackages->save();

        return view('employer.package_confirm', $data);

    }

    public function getPackagesHistory() {
        $data['left_active'] = 'packages';
        $data['packageHistories'] = Employer_package::where('employer_id', Auth::guard('employer')->user()->id)->where('is_verified', 1)->get();

        return view('employer.package_history', $data);
    }

    public function getNewJob(){
        $data['left_active'] = 'job';
        $data['job_levels'] = Job_level::all();
        $data['job_categories'] = Job_category::all();
        $data['job_designations'] = Job_designation::all();
        $data['job_experiences'] = Job_experience::all();
        $data['skills'] = Skill::all();
        return view('employer.post_new_job', $data);
    }

    public function postJob(Request $request) {
        $data['left_active'] = 'job';

        $postJOb = new Job();
        $postJOb->employer_id = Auth::guard('employer')->user()->id;
        $postJOb->title = $request->input('title');
        $postJOb->description = $request->input('description');
        $postJOb->job_category_id = $request->input('job_category_id');
        $postJOb->job_designation_id = $request->input('job_designation_id');
        $postJOb->job_level_id = $request->input('job_level_id');
        $postJOb->experience_id = $request->input('experience_id');
        if($request->input('is_negotiable')) {
            $postJOb->is_negotiable = $request->input('is_negotiable');
        }else{
            $postJOb->salary_min = $request->input('salary_min');
            $postJOb->salary_max = $request->input('salary_max');
        }
        $postJOb->gender = $request->input('gender');
        $postJOb->qualification = $request->input('qualification');
        $postJOb->deadline = $request->input('deadline');
        $postJOb->location = $request->input('location');
        $postJOb->save();


        for($i=0; $i < sizeof($request->input('skill')); $i++){
            $jobSkill = new Job_skill();
            $jobSkill->job_id = $postJOb->id;
            $jobSkill->skill = $request->input('skill')[$i];
            $jobSkill->save();
        }
        return redirect()->route('employer.manage.job');
    }

    public function getDraftedJob(){
        $data['left_active'] = 'job';
        return view('employer.drafted_job', $data);
    }

    public function getManageJob(){
        $data['left_active'] = 'manage_job';
        return view('employer.manage_job', $data);
    }

    // public function getProfile(){
    //     $data['left_active'] = 'profile';
    //     return view('employer.profile', $data);
    // }

    public function getEditProfile(){
        $data['left_active'] = 'profile';
        return view('employer.edit_profile', $data);
    }

    public function getCompanyProfile(){
        
        $data['company_info'] = Employer_company_info::where('employer_id', Auth::guard('employer')->user()->id)->firstOrFail();
        try{
            $data['social_links'] = Company_social_media::where('employer_company_info_id', $data['company_info']->id)->first();
        }catch(ModelNotFoundException $ex){
            $data['social_links'] = new Company_social_media();
        }
         
        // $data['industries'] = Industry::all();
        $data['company_industries'] = Company_industry::where('employer_company_info_id', $data['company_info']->id)->get();
        $data['left_active'] = 'company';
        return view('employer.comapny_profile', $data);
    }

    public function getEditCompanyProfile(){
        $data['left_active'] = 'company';
        $data['company_info'] = Employer_company_info::where('employer_id', Auth::guard('employer')->user()->id)->firstOrFail();
        $data['industries'] = Industry::all();
        $data['countries'] = Country::all();
        $company_industries = Company_industry::where('employer_company_info_id', $data['company_info']->id)->get();
        $industries = array();
        foreach($company_industries as $industry){
            array_push($industries, $industry->industry_id);
        }
        $data['company_industry'] = $industries;
        try{
            $data['social_links'] = Company_social_media::find($data['company_info']->id);
        }catch(ModelNotFoundException $ex){
            $data['social_links'] = new Company_social_media();
        }

        return view('employer.edit_company_profile', $data);
    }


    public function updateProfile(Request $request){
        // $this->validator($request->all())->validate();
        
        $employerCompanyInfo = Employer_company_info::where('employer_id', Auth::user()->id)->firstOrFail();
        $employerCompanyInfo->name = $request->input('name');
        $employerCompanyInfo->phone = $request->input('contact_phone');
        $employerCompanyInfo->email = $request->input('contact_email');
        $employerCompanyInfo->since = $request->input('since');
        $employerCompanyInfo->team_size = $request->input('team_size');
        $employerCompanyInfo->description = $request->input('description');
        $employerCompanyInfo->address = $request->input('address');
        $employerCompanyInfo->billing_address = $request->input('billing_address');
        $employerCompanyInfo->city = $request->input('city');
        $employerCompanyInfo->country = $request->input('country');
        $employerCompanyInfo->website = $request->input('website');
        
        // delete & upload images
        if($request->hasFile('logo')){
            if($employerCompanyInfo->logo){
                Storage::delete('public/uploads/'.$employerCompanyInfo->logo);
            }
            $ext = $request->file('logo')->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $upload = $request->file('logo')->storeAs(
                'public/uploads', $filename
            );
            $employerCompanyInfo->logo = $filename;
        }
        
        $employerCompanyInfo->save();

        $companyIndustry = Company_industry::where('employer_company_info_id', $employerCompanyInfo->id)->get()->each->delete();

        // create company industry type
        for($i=0; $i < sizeof($request->input('industry_type')); $i++){
            $companyIndustry = new Company_industry();
            $companyIndustry->employer_company_info_id = $employerCompanyInfo->id;
            $companyIndustry->industry_id = $request->input('industry_type')[$i];
            $companyIndustry->save();
        }


        // social links

        $social_links = Company_social_media::where('employer_company_info_id', $employerCompanyInfo->id)->first();
        if(!$social_links){
            $social_links = new Company_social_media();
        }

        $social_links->employer_company_info_id = $employerCompanyInfo->id;
        $social_links->fb_link = $request->input('fb_link');
        $social_links->twitter_link = $request->input('twitter_link');
        $social_links->gplus_link = $request->input('gplus_link');
        $social_links->linkedin_link = $request->input('linkedin_link');
        $social_links->save();

        return redirect()->route('employer.company.profile')->with('status', 'Profile updated!');


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
