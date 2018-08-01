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
use App\Short_listed_resume;
use App\Job_status;
use App\Job_educational_requirement;
use App\Job_experience_requirement;
use App\Other_benifit;



class HomeController extends Controller
{
    //
    public function dashboard(){
        $data['left_active'] = 'dashboard';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['jobCount'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->count();
        $data['shortListed'] = Short_listed_resume::groupBy('employer_id')->select(DB::raw('count(*) as shortListed'))->count();
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

        $paymentHistory->employer_package_id = $employerPackages->id;
        $paymentHistory->transaction_type = $request->input('transaction_type');
        $paymentHistory->transaction_id = $request->input('txdID');
        $paymentHistory->transaction_date = date('Y-m-d H:i:s');

        $paymentHistory->save();

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
        $data['job_statuses'] = Job_status::all();
        $data['job_categories'] = Job_category::all();
        $data['job_designations'] = Job_designation::all();
        $data['job_experiences'] = Job_experience::all();
        $data['skills'] = Skill::all();
        $data['draft'] = false;
        // $data['other_benifits'] = false;
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
                'job_status_id'         => 'required',
                // 'experience'            => 'required',
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
            // $otherBenifits = Other_benifit::where('job_id', $postJob->id)->get();
        }else{
            $postJob = new Job();
            $postJob->title = $request->input('title');

            $otherBenifits = new Other_benifit();
        }
        if($request->input('is_special')) {
            $postJob->is_special = $request->input('is_special');
        }else{
            $postJob->is_special = 0;
        }
        $postJob->employer_id = Auth::guard('employer')->user()->id;
        $postJob->vacancy = $request->input('vacancy');
        $postJob->job_category_id = $request->input('job_category_id');
        $postJob->job_designation_id = $request->input('job_designation_id');
        $postJob->job_level_id = $request->input('job_level_id');
        $postJob->job_status_id = $request->input('job_status_id');
        $postJob->deadline = date("Y-m-d", strtotime($request->input('deadline')));
        $postJob->qualification = $request->input('qualification');
        $postJob->description = $request->input('description');
        $postJob->location_type = $request->input('location_type');
        $postJob->location = $request->input('location');
        $postJob->is_photograph_enclosed = $request->input('is_photograph_enclosed');
        $postJob->hide_company_info = $request->input('hide_company_info');



        if($request->input('is_negotiable')) {
            $postJob->is_negotiable = $request->input('is_negotiable');
            $postJob->salary_min = null;
            $postJob->salary_max = null;
        }else{
            $postJob->is_negotiable = 0;
            $postJob->salary_min = $request->input('salary_min');
            $postJob->salary_max = $request->input('salary_max');
        }
        $postJob->salary_type = $request->input('salary_type');
        $postJob->hide_salary = $request->input('hide_salary');

        // $postJob->experience = $request->input('experience');
        $postJob->gender = $request->input('gender');
        $postJob->age_min = $request->input('age_min');
        $postJob->age_max = $request->input('age_max');

        if($request['draft']){
            $postJob->is_drafted = 1;
            $postJob->save();
            // dd($postJob);
        }
        if($request['post']){
            $postJob->is_drafted = 0;
            $postJob->save();
            // dd($postJob);
        }



        // experience
        if($request['job_id']){
            $experience = Job_experience_requirement::where('job_id', $request['job_id'])->first();
        }else{
            $experience = new Job_experience_requirement();
        }

        $experience->job_id = $postJob->id;
        $experience->min_experience = $request->input('min_experience');
        $experience->max_experience = $request->input('max_experience');
        $experience->is_fresher_apply = $request->input('is_fresher_apply');
        $experience->area_of_experience = $request->input('area_of_experience');
        $experience->area_of_business = $request->input('area_of_business');
        $experience->save();
        // dd($experience);

        // education
        if($request['job_id']){
            $education = Job_educational_requirement::where('job_id', $request['job_id'])->first();
        }else{
            $education = new Job_educational_requirement();
        }
        $education->job_id = $postJob->id;
        $education->preferred_university = $request->input('preferred_university');
        $education->others = $request->input('others_edu');
        $education->save();
        // dd($education);



        if($request->input('skill')){
            // if already exists job skills
            if($request['job_id']){
                Job_skill::where('job_id', $request['job_id'])->delete();
            }
            for($i=0; $i < sizeof($request->input('skill')); $i++){
                $jobSkill = new Job_skill();
                $jobSkill->job_id = $postJob->id;
                $jobSkill->skill_id = $request->input('skill')[$i];
                $jobSkill->save();

            }

        }

        if($request->input('other_benifits')){
            // if already exists job skills
            if($request['job_id']){
                Other_benifit::where('job_id', $postJob->id)->delete();
            }
            for($i=0; $i < sizeof($request->input('other_benifits')); $i++){
                $otherBenifit = new Other_benifit();
                $otherBenifit->job_id = $postJob->id;
                $otherBenifit->benifit = $request->input('other_benifits')[$i];
                $otherBenifit->save();
            }

        }
        // dd($jobSkill);

        if($request['draft']){
            return redirect()->route('employer.draft.job');
        }else{
            return redirect()->route('employer.manage.job');
        }

    }

    public function editJobForm($id) {
        $data['left_active'] = 'manage_job';
        $data['editJob'] = Job::findOrFail($id);
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['job_levels'] = Job_level::all();
        if($data['editJob']['is_special']){
            $data['job_categories'] = Job_category::where('is_special', 1)->get();
            $data['job_designations'] = Job_designation::where('is_special', 1)->get();
        }
        else{
            $data['job_categories'] = Job_category::where('is_special', 0)->get();
            $data['job_designations'] = Job_designation::where('is_special', 0)->get();
        }
        $data['job_experiences'] = Job_experience::all();
        $data['skills'] = Skill::all();
        // $data['other_benifits'] = Other_benifit::where('job_id', $id)->get();
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
        $data['draft'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('id', $id)->first();
        $data['job_levels'] = Job_level::all();
        if($data['draft']['is_special'] == 1){
            $data['job_categories'] = Job_category::where('is_special', 1)->get();
            $data['job_designations'] = Job_designation::where('is_special', 1)->get();
        }
        else{
            $data['job_categories'] = Job_category::where('is_special', 0)->get();
            $data['job_designations'] = Job_designation::where('is_special', 0)->get();
        }
        $data['job_experiences'] = Job_experience::all();
        $data['skills'] = Skill::all();
        $data['job_statuses'] = Job_status::all();
        // $data['other_benifits'] = Other_benifit::where('job_id', $id)->get();
        return view('employer.post_new_job', $data);

    }

    function getCategories(Request $request){
        $id = $request->id;
        $is_special = $request->is_special;

        if($is_special){
            $job_categories = Job_category::where('is_special', $is_special)->get();
        }else{
            $job_categories = Job_category::where('is_special', $is_special)->get();
        }

        $data = '<option value="" >Job Category</option>';
        foreach($job_categories as $job_category){

            $data .= '<option value="'. $job_category->id .'" >'. $job_category->name .'</option>';
        }
        return $data;

    }

    function getDesignations(Request $request){
        $id = $request->id;
        $is_special = $request->is_special;

        if($is_special){
            $job_designations = Job_designation::where('is_special', $is_special)->get();
        }else{
            $job_designations = Job_designation::where('is_special', $is_special)->get();
        }

        $data = '<option value="">Job Designation</option>';
        foreach($job_designations as $job_designation){
            $data .= '<option value="'. $job_designation->id .'">'. $job_designation->name .'</option>';
        }
        return $data;
    }


    // Manage job
    public function getManageJob(){
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['allJobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('is_drafted', 0)->paginate(10);
        $data['totalJobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->count();
        $data['activeJobs'] = Job::where('is_verified', 1)->count();
        $data['featured_job']= DB::table('employer_packages')
                                ->join('featured_packages', 'featured_packages.id', '=', 'employer_packages.featured_package_id')
                                ->select('employer_packages.*')
                                ->where('employer_packages.featured_package_id','!=', NULL)
                                ->where('employer_packages.expired_date', '>=', date("Y-m-d"))
                                ->where('featured_packages.featured_type', 1)
                                ->where('employer_packages.remain_amount', '>=', 1)
                                ->where('employer_packages.employer_id',  Auth::guard('employer')->user()->id)
                                ->where('employer_packages.is_verified', 1)
                                ->first();

        // $data['featured_job'] = Employer_package::where('employer_id', Auth::guard('employer')->user()->id)->where('featured_package_id', '!=', NULL)->where('expired_date', '>=', date("Y-m-d"))->first();
        return view('employer.manage_job', $data);
    }


    public function jobDetails($id) {
        $data['left_active'] = 'manage_job';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['job'] = Job::find($id);
        $data['company_info'] = DB::table('employer_company_infos')->where('employer_id', Auth::guard('employer')->user()->id)->first();
        return view('employer.job_details', $data);
    }

    // feature a job post
    public function featureJob(Request $request){
        $job = Job::where('employer_id', Auth::guard('employer')->user()->id)->findOrFail($request->JobId);
        $feature_package = Employer_package::where('employer_id', Auth::guard('employer')->user()->id)->findOrFail($request->featureJobId);

        $feature_package->remain_amount = $feature_package->remain_amount - 1;
        $job->is_featured = 1;
        $feature_package->save();
        $job->save();

        return redirect()->route('employer.manage.job')->with('status', 'Your job post successfully Featured.');
    }

    // pause job
    public function pauseJob($id){
        $job = Job::where('employer_id', Auth::guard('employer')->user()->id)->findOrFail($id);
        if($job->is_paused == 1){
            $job->is_paused = 0;
            $message = "Your job is activated now.";
        }else{
            $job->is_paused = 1;
            $message = "Your job is paused now.";
        }

        $job->save();

        return redirect()->route('employer.manage.job')->with('status', $message);
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
                return redirect()->back()->with('error', 'Password dose not match !!')->withInput();
            }
            return redirect()->back()->with('error', 'Retype Password dose not match !!')->withInput();

        }
        return redirect()->back()->with('error', 'Old password is empty')->withInput();
    }

    public function getCompanyProfile(){
        $data['left_active'] = 'company';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        $data['company_info'] = Employer_company_info::where('employer_id', Auth::guard('employer')->user()->id)->firstOrFail();
        $data['featured_job'] = DB::table('employer_packages')
                                ->join('featured_packages', 'featured_packages.id', '=', 'employer_packages.featured_package_id')
                                ->select('employer_packages.*')
                                ->where('employer_packages.featured_package_id','!=', NULL)
                                ->where('employer_packages.expired_date', '>=', date("Y-m-d"))
                                ->where('featured_packages.featured_type', 0)
                                ->where('employer_packages.remain_amount', '>=', 1)
                                ->where('employer_packages.employer_id',  Auth::guard('employer')->user()->id)
                                ->where('employer_packages.is_verified', 1)
                                ->first();

        try{
            $data['social_links'] = Company_social_media::where('employer_company_info_id', $data['company_info']->id)->first();
        }catch(ModelNotFoundException $ex){
            $data['social_links'] = new Company_social_media();
        }

        $data['jobs'] = Job::where('employer_id', Auth::guard('employer')->user()->id)->where('is_paused', 0)->where('is_drafted', 0)->where('deadline', '>=', date("Y-m-d"))->get();
        $data['total_jobs'] = $data['jobs']->count();
        $data['company_industries'] = Company_industry::where('employer_company_info_id', $data['company_info']->id)->get();
        return view('employer.comapny_profile', $data);
    }

    // feature company profile
    public function featureCompany($company_id, $package_id) {
        $company = Employer_company_info::find($company_id);
        $feature_package = Employer_package::find($package_id);
        $feature_package->remain_amount -= 1;
        $company->is_featured = 1;
        $feature_package->save();
        $company->save();

        return redirect()->route('employer.company.profile')->with('status', 'Your company featured successfully');
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



    public function getBrowseResume(){
        $data['left_active'] = 'browse_resume';
        $data['employer_info'] = Employer::find(Auth::guard('employer')->user()->id);
        return view('employer.browse_resume', $data);
    }

}
