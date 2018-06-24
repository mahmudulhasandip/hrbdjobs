<?php

namespace App\Http\Controllers\EmployerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use DB;
use Validator;
use Hash;

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
use App\Employer;



class HomeController extends Controller
{
    //
    public function dashboard(){
        $data['left_active'] = 'dashboard';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['jobCount'] = Job::all()->count();
        return view('employer.dashboard', $data);
    }

    public function getPackages(){
        $data['left_active'] = 'packages';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['packages'] = Job_package::all();
        $data['featured_packages'] = Featured_package::all();
        return view('employer.packages', $data);
    }

    public function purchasePackages($id){
        $data['left_active'] = 'packages';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['package_type'] = 0;
        $data['packages'] = Job_package::findOrFail($id);
        return view('employer.package_details' , $data);
    }

    public function purchaseFeaturedPackages($id) {
        $data['left_active'] = 'packages';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['package_type'] = 1;
        $data['packages'] = Featured_package::findOrFail($id);
        return view('employer.package_details' , $data);
    }

    public function confirmPackage(Request $request) {
        $data['left_active'] = 'packages';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
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
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['packageHistories'] = Employer_package::where('employer_id', Auth::guard('employer')->user()->id)->where('is_verified', 1)->get();

        return view('employer.package_history', $data);
    }

    public function getNewJob(){
        $data['left_active'] = 'job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['job_levels'] = Job_level::all();
        $data['job_categories'] = Job_category::all();
        $data['job_designations'] = Job_designation::all();
        $data['job_experiences'] = Job_experience::all();
        $data['skills'] = Skill::all();
        $data['draft'] = false;
        return view('employer.post_new_job', $data);
    }


    

    public function postJob(Request $request) {
        $data['left_active'] = 'job';

        

        // validation
        if($request['post']){
            $validator = Validator::make($request->all(),[
                'title'                 => 'required|max:255',
                'description'           => 'required',
                'job_category_id'       => 'required',
                'job_designation_id'    => 'required',
                'job_level_id'          => 'required',
                'experience_id'         => 'required',
                'vacancy'               => 'required',
                'gender'                => 'required',
                'qualification'         => 'required',
                'deadline'              => 'required',
                'location'              => 'required'
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('employer.new.job')->withErrors($validator)->withInput();
            }
        }

        
        if($request['job_id']){
            $postJob = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('id', $request['job_id'])->first();
        }else{
            $postJob = new Job();
        }
        $postJob->employer_id = Auth::guard('employer')->user()->id;
        $postJob->title = $request->input('title');
        $postJob->description = $request->input('description');
        $postJob->job_category_id = $request->input('job_category_id');
        $postJob->job_designation_id = $request->input('job_designation_id');
        $postJob->job_level_id = $request->input('job_level_id');
        $postJob->experience_id = $request->input('experience_id');
        if($request->input('is_negotiable')) {
            $postJob->is_negotiable = $request->input('is_negotiable');
        }else{
            $postJob->salary_min = $request->input('salary_min');
            $postJob->salary_max = $request->input('salary_max');
        }
        $postJob->vacancy = $request->input('vacancy');
        $postJob->gender = $request->input('gender');
        $postJob->qualification = $request->input('qualification');
        $postJob->deadline = $request->input('deadline');
        $postJob->location = $request->input('location');
        if($request['draft']){
            $postJob->is_drafted = 1;
            $postJob->save();
        }
        if($request['post']){
            $postJob->is_drafted = 0;
            $postJob->save();
        }
        

        if($request->input('skill')){
            // if already exists job skills
            if($request['job_id']){
                Job_skill::where('job_id', $request['job_id'])->delete();
            }
            for($i=0; $i < sizeof($request->input('skill')); $i++){
                $jobSkill = new Job_skill();
                $jobSkill->job_id = $postJob->id;
                $jobSkill->skill = $request->input('skill')[$i];
                $jobSkill->save();
            }
        }
        
        if($request['draft']){
            return redirect()->route('employer.draft.job');
        }else{
            return redirect()->route('employer.manage.job');
        }
        
    }

    public function editJobForm($id) {
        $data['left_active'] = 'manage_job';
        $data['editJob'] = Job::findOrFail($id)->first();
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['job_levels'] = Job_level::all();
        $data['job_categories'] = Job_category::all();
        $data['job_designations'] = Job_designation::all();
        $data['job_experiences'] = Job_experience::all();
        $data['skills'] = Skill::all();
        return view('employer.edit_job', $data);
    }   

    public function deleteJob($id) {
        $postedJob = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('id', $id)->first();
        $postedJob->delete();
        return redirect()->route('employer.manage.job');
    }


    // Draft jobs
    public function getDraftedJob(){
        $data['left_active'] = 'job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['allJobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('is_drafted', 1)->get();
        $data['totalJobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('is_drafted', 1)->count();
        $data['activeJobs'] = Job::where('is_verified', 1)->count();
        return view('employer.draft_job', $data);
    }

    public function draftedJobForm($id){
        $data['left_active'] = 'job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['job_levels'] = Job_level::all();
        $data['job_categories'] = Job_category::all();
        $data['job_designations'] = Job_designation::all();
        $data['job_experiences'] = Job_experience::all();
        $data['skills'] = Skill::all();
        $data['draft'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('id', $id)->first();
        return view('employer.post_new_job', $data);
    }
    

    // Manage job
    public function getManageJob(){
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['allJobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('is_drafted', 0)->get();
        $data['totalJobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->count();
        $data['activeJobs'] = Job::where('is_verified', 1)->count();
        return view('employer.manage_job', $data);
    }


    public function jobDetails($id) {
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['job'] = Job::find($id);
        $data['company_info'] = DB::table('employer_company_infos')->where('employer_id', Auth::guard('employer')->user()->id)->first();
        return view('employer.job_details', $data);
    }

    // public function getProfile(){
    //     $data['left_active'] = 'profile';
    //     return view('employer.profile', $data);
    // }

    // employer Profile Edit
    public function getEditProfile(){
        $data['left_active'] = 'profile';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id)->first();
        return view('employer.edit_profile', $data);
    }

    // employer profile update
    public function updateEmployerProfile(Request $request) {
        $data['left_active'] = 'profile';
        $employerInfo = Employer::find(Auth::guard('employer')->user()->id);
        // delete & upload images
        if($request->hasFile('logo')){
            if($employerInfo->logo){
                Storage::delete('public/uploads/'.$employerInfo->logo);
            }
            $ext = $request->file('logo')->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $upload = $request->file('logo')->storeAs(
                'public/uploads', $filename
            );
            $employerInfo->logo = $filename;
        }
        $employerInfo->fname = $request->input('fname');
        $employerInfo->lname = $request->input('lname');
        $employerInfo->designation = $request->input('designation');
        $employerInfo->website = $request->input('website');
        $employerInfo->country = $request->input('country');
        $employerInfo->city = $request->input('city');
        $employerInfo->address = $request->input('address');
        $employerInfo->save();

        
        return redirect()->route('employer.home')->with('status', 'Your profile successfully updated.');
    }

    // employer change Password
    public function updateEmployerPassword(Request $request) {
        $data['left_active'] = 'profile';
        
        // $this->validate($request, [
        //     'new_password' => 'required|string|min:6|confirmed'
        //     ]);

        $validator = Validator::make($request->all(),[
            'password' => 'required|string|min:6|confirmed'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $employerPass = Employer::find(Auth::guard('employer')->user()->id);
        if(!empty($request->input('old_password')))
        {
            
            if($request->input('password') === $request->input('password_confirmation')) {
                $test = Hash::check($request->input('old_password'), $employerPass->password);
                if(Hash::check($request->input('old_password'), $employerPass->password)){
                    
                    $employerPass->password = bcrypt($request->input('password'));
                    $employerPass->save();
                    return redirect()->route('employer.home')->with('status', 'Your password successfully Changed.');
                }
                return redirect()->back()->with('errors', 'Password dose not match !!')->withInput();
            }
            return redirect()->back()->with('errors', 'Retype Password dose not match !!')->withInput();
            
        }
        return redirect()->back()->with('errors', 'Old password is empty')->withInput();
    }

    public function getCompanyProfile(){
        $data['left_active'] = 'company';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
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
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
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


    // employer profile update
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
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        return view('employer.shortlisted_job', $data);
    }

    public function getBrowseResume(){
        $data['left_active'] = 'browse_resume';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        return view('employer.browse_resume', $data);                      
    }
}
