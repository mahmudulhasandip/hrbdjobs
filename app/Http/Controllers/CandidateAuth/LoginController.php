<?php

namespace App\Http\Controllers\CandidateAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use URL;
use Session;
use Socialite;
use App\Candidate;
use Mail;
use Illuminate\Mail\Mailer;
use App\Mail\GoogleAuthEmail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/candidate/home';
    public $loginPath = '/candidate/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('candidate.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if(Auth::guard('employer')){
            return redirect()->route('employer.home')->with(['error' => "You are already loggen in as Employer"]);
        }
        // if(Auth::guard('employer')){
        //     return redirect('/employer/home')->withErrors(['status' => "You are already loggen in as Employer"]);
        // }

        if(URL::previous() != url('/')){
            session()->put('backUrl', URL::previous());
        }

        return view('candidate.auth.login');
    }

    public function username()
    {
        $identity  = request()->get('username');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
        // return 'email';
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect('/candidate/login')->withErrors(['status' => "Username and password doesn't match"])->withInput();
    }

    public function redirectPath()
    {
        return (session()->get('backUrl') &&  session()->get('backUrl') != url('/')) ? session()->get('backUrl') : $this->redirectTo;
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */

    public function redirectToProvider()
    {
        if(URL::previous() != url('/')){
            session()->put('backUrl', URL::previous());
        }
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $email = $user->email;
        $info = $user->user;
        if($this->checkEmail($email)){
            $candidate = Candidate::where('email', $email)->first();
            $this->guard()->login($candidate);
            return redirect($this->redirectPath());
        }

        $fname = $info['name']['givenName'];
        $lname = $info['name']['familyName'];
        $username = explode("@",$email)[0];
        $password = substr(md5(microtime()),rand(0,26),5);

        $candidate = new Candidate();
        $candidate->fname = $fname;
        $candidate->lname = $lname;
        $candidate->username = $username;
        $candidate->email = $email;
        $candidate->password = bcrypt($password);
        $candidate->verified = 1;
        $candidate->save();

        $user = new Candidate();
        $user->username = $username;
        $user->password = $password;

        Mail::to($email)->send(new GoogleAuthEmail($user));
        $this->guard()->login($candidate);
        return redirect($this->redirectPath());
    }

    public function checkEmail($email){
        $email = Candidate::where('email', $email)->first();
        return ($email) ? 1 : 0;
    }

    protected function guard()
    {
        return Auth::guard('candidate');
    }


}
