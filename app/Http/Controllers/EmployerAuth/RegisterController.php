<?php
namespace App\Http\Controllers\EmployerAuth;
use App\Employer;
use App\Employer_company_info;
use App\Industry;
use App\Company_industry;
use App\Country;
use App\Job_package;
use App\Employer_package;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Validator;
use Mail;
use Illuminate\Mail\Mailer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/employer/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employer.guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'username'              => 'required|max:255',
            'name'                  => 'required|max:255',
            'fname'                 => 'required|max:255',
            'lname'                 => 'required|max:255',
            'person_designation'    => 'required|max:255',
            'person_email'          => 'required|email|max:255',
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
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Employer
     */
    protected function create(array $data)
    {
        // create employer
        $employer = new Employer();
        $employer->fname = $data['fname'];
        $employer->lname = $data['lname'];
        $employer->username = $data['username'];
        $employer->designation = $data['person_designation'];
        $employer->email = $data['person_email'];
        $employer->password = bcrypt($data['password']);
        $employer->save();

        
        // create employer company info
        $employerCompanyInfo = new Employer_company_info();
        $employerCompanyInfo->employer_id = $employer->id;
        $employerCompanyInfo->name = $data['name'];
        $employerCompanyInfo->phone = $data['contact_phone'];
        $employerCompanyInfo->email = $data['contact_email'];
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

        // create employer package
        $jobPackage = Job_package::first();
        $employerPackage = new Employer_package();
        $employerPackage->employer_id = $employer->id;
        $employerPackage->job_package_id = $jobPackage->id;
        $employerPackage->start_date = date("Y-m-d H:i:s");
        $employerPackage->expired_date = date("Y-m-d H:i:s", strtotime('+'.$jobPackage->duration.' months'));
        $employerPackage->remain_amount = $jobPackage->job_post;
        $employerPackage->is_verified = 1;
        $employerPackage->save();

        $verifyUser = VerifyUser::create([
            'user_id' => $employer->id,
            'token' => str_random(40)
        ]);

        Mail::to($employer->email)->send(new VerifyMail($employer));

        return $employer;
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $employer = $verifyUser->employer;
            if(!$employer->verified) {
                $verifyUser->employer->verified = 1;
                $verifyUser->employer->save();
                $verifyUser->delete();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/employer/login')->with('warning', "Sorry your email cannot be identified.");
        }
 
        return redirect('/employer/login')->with('status', $status);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/employer/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $industries = Industry::all();
        $countries = Country::all();
        return view('employer.auth.register', ['industries'=>$industries, 'countries' => $countries]);
    }
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employer');
    }
}