<?php
namespace App\Http\Controllers\EmployerAuth;
use App\Employer;
use App\Employer_company_info;
use App\Industry;
use App\Company_industry;
use Validator;
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
            // 'person_contact'        => 'required|max:255',
            'person_email'          => 'required|email|max:255',
            'industry_type'         => 'required',
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
        $employerCompanyInfo->address = $data['address'];
        $employerCompanyInfo->billing_address = $data['billing_address'];
        $employerCompanyInfo->website = $data['website'];
        $employerCompanyInfo->description = $data['description'];
        $employerCompanyInfo->save();

        // // create company industry type
        for($i=0; $i < sizeof($data['industry_type']); $i++){
            $companyIndustry = new Company_industry();
            $companyIndustry->employer_company_info_id = $employerCompanyInfo->id;
            $companyIndustry->industry_id = $data['industry_type'][$i];
            $companyIndustry->save();
        }
        
        return $employer;
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $industries = Industry::all();
        return view('employer.auth.register', ['industries'=>$industries]);
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