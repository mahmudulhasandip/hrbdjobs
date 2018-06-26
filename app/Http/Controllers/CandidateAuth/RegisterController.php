<?php

namespace App\Http\Controllers\CandidateAuth;

use App\Candidate;
use Validator;
use App\VerifyCandidate;
use App\Mail\VerifyCandidateMail;
use Mail;
use Illuminate\Mail\Mailer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/candidate/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('candidate.guest');
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
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'username' => 'required|max:255|unique:candidates',
            'email' => 'required|email|max:255|unique:candidates',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Candidate
     */
    protected function create(array $data)
    {
        $candidate = new Candidate();
        $candidate->fname = $data['fname'];
        $candidate->lname = $data['lname'];
        $candidate->username = $data['username'];
        $candidate->gender = $data['gender'];
        $candidate->email = $data['email'];
        $candidate->password = bcrypt($data['password']);
        $candidate->save();

        // verify email
        $verifyUser = VerifyCandidate::create([
            'user_id' => $candidate->id,
            'token' => str_random(40)
        ]);

        Mail::to($candidate->email)->send(new VerifyCandidateMail($candidate));
        
        return $candidate;
    }


    # verify candidate from mail link
    public function verifyCandidate($token)
    {
        $verifyCandidate = VerifyCandidate::where('token', $token)->first();
        if(isset($verifyCandidate) ){
            $candidate = $verifyCandidate->candidate;
            if(!$candidate->verified) {
                $verifyCandidate->candidate->verified = 1;
                $verifyCandidate->candidate->save();
                VerifyCandidate::where('token', $token)->delete();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/candidate/login')->with('warning', "Sorry your email cannot be identified.");
        }
 
        return redirect('/candidate/login')->with('status', $status);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('candidate.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */

    public function checkUsername(Request $request){
        $username = $request->input('username');
        $username = Candidate::where('username', $username)->first();
        return ($username) ? 1 : 0;
    }

    public function checkEmail(Request $request){
        $email = $request->input('email');
        $email = Candidate::where('email', $email)->first();
        return ($email) ? 1 : 0;
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/candidate/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }

    protected function guard()
    {
        return Auth::guard('candidate');
    }
}
