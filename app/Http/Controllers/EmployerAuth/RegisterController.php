<?php
namespace App\Http\Controllers\EmployerAuth;
use App\Employer;
use App\Employer_company_info;
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
            'person_contact'        => 'required|max:255',
            'person_email'          => 'required|email|max:255|unique:employers',
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
        $employer = Employer::create([
            'fname'         => $data['fname'],
            'lname'         => $data['lname'],
            'username'      => $data['username'],
            'designation'   => $data['person_designation'],
            'email'         => $data['person_email'],
            'phone'         => $data['person_contact'],
            'password'      => bcrypt($data['password']),
        ]);
        
        // create employer company info
        $employerCompanyInfo = Employer_company_info::create([
            'employer_id'       => $employer->id,
            'name'              => $data['name'],
            'phone'             => $data['contact_phone'],
            'email'             => $data['contact_email'],
            'address'           => $data['address'],
            'billing_address'   => $data['billing_address'],
            'website'           => $data['website'],
            'description'       => $data['description']
        ]);
        // create company industry type
        
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('employer.auth.register');
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